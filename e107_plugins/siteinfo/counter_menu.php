<?php
/*
 * e107 website system
 *
 * Copyright (C) 2001-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/siteinfo/counter_menu.php,v $
 * $Revision: 1.2 $
 * $Date: 2009-11-17 13:48:43 $
 * $Author: marj_nl_fr $
 */

if (!defined('e107_INIT')) { exit; }

$text = "";
if (isset($pref['statActivate']) && $pref['statActivate'] == true) 
{
	$pageName = preg_replace("/(\?.*)|(\_.*)|(\.php)/", "", basename (e_SELF));
	$logfile = e_PLUGIN."log/logs/logp_".date("z.Y", time()).".php";
	if(!is_readable($logfile))
	{
		if(ADMIN && !$pref['statCountAdmin'])
		{
			$text = COUNTER_L1;
		}
		$total = 1;
		$unique = 1;
		$siteTotal = 1;
		$siteUnique = 1;
		$totalever = 1;
		$uniqueever = 1;
	} 
	else 
	{
		$text = "";
		require($logfile);
		if($sql -> db_Select("logstats", "*", "log_id='statTotal' OR log_id='statUnique' OR log_id='pageTotal'"))
		{
			while($row = $sql -> db_Fetch())
			{
				if($row['log_id'] == "statTotal")
				{
					$siteTotal += $row['log_data'];
				}
				else if($row['log_id'] == "statUnique")
				{
					$siteUnique += $row['log_data'];
				}
				else
				{
					$dbPageInfo = unserialize($row['log_data']);
					$totalPageEver = ($dbPageInfo[$pageName]['ttlv'] ? $dbPageInfo[$pageName]['ttlv'] : 0);
					$uniquePageEver = ($dbPageInfo[$pageName]['unqv'] ? $dbPageInfo[$pageName]['unqv'] : 0);
				}
			}
		}
		$total = ($pageInfo[$pageName]['ttl'] ? $pageInfo[$pageName]['ttl'] : 0);
		$unique = ($pageInfo[$pageName]['unq'] ? $pageInfo[$pageName]['unq'] : 0);
		$totalever = ($pageInfo[$pageName]['ttlv'] ? $pageInfo[$pageName]['ttlv'] : 0) + $totalPageEver + $total;
		$uniqueever = ($pageInfo[$pageName]['unqv'] ? $pageInfo[$pageName]['unqv'] : 0) + $uniquePageEver + $unique;
	}
	$text .= "<b>".COUNTER_L2."</b><br />".COUNTER_L3.": $total<br />".COUNTER_L5.": $unique<br /><br />
	<b>".COUNTER_L4."</b><br />".COUNTER_L3.": $totalever<br />".COUNTER_L5.": $uniqueever<br /><br />
	<b>".COUNTER_L6."</b><br />".COUNTER_L3.": $siteTotal<br />".COUNTER_L5.": $siteUnique";
	$ns->tablerender(COUNTER_L7, $text, 'counter');
	unset($dbPageInfo);
}
else
{
	if(ADMIN)
	{
		$text .= "<span class='smalltext'>".COUNTER_L8."</span>";
		$ns->tablerender(COUNTER_L7, $text, 'counter');
	}
}

?>