<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Template for signup emails
 *
 * $Source: /cvs_backup/e107_0.8/e107_themes/templates/email_template.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

if (!defined('e107_INIT')) { exit; }

global $pref;
$SIGNUPEMAIL_SUBJECT = LAN_SIGNUP_96.' {SITENAME}';
$SIGNUPEMAIL_USETHEME = 1; 			// Use CSS STYLE from THEME: 0 = Off, 1 = external, 2 = embedded
$SIGNUPEMAIL_LINKSTYLE = ''; 		// css to use on links eg. color:red;
//$SIGNUPEMAIL_IMAGES =  e_IMAGE.$pref['sitebutton']; // comma separated paths to image to embed. referenced below with {IMAGE1} (IMAGE2} etc.  Not required
$SIGNUPEMAIL_CC = "";  				// comma separated email addresses to put in CC of the signup email.
$SIGNUPEMAIL_BCC = "";   			// comma separated email addresses to put in BCC of the signup email.
$SIGNUPEMAIL_ATTACHMENTS = ""; 		// files-path array of attachments. eg. array(e_FILE."myfile.zip",e_FILE."myotherfile.zip");
$SIGNUPEMAIL_BACKGROUNDIMAGE = "";	// absolute path to a background image eg. e_IMAGE."mybackground.jpg";


/*
Optional mailer admin preferences Override. The following mailer parameters can be overridden:
'mailer', 'smtp_server', 'smtp_username', 'smtp_password', 'sendmail', 'siteadminemail', 'siteadmin', 'smtp_pop3auth',
'SMTPDebug', 'subject', 'from', 'fromname', 'replyto', 'send_html', 'add_html_header', 'attachments', 'cc', 'bcc', 
'bouncepath', 'returnreceipt', 'priority', 'extra_header', 'wordwrap', 'split'

See e_HANDLER.mail.php for more information
If required, uncomment the following block and add array elements for options to be overridden - array key is the option name
DON'T put in empty fields unless you wish to set the value to an empty value! 	*/
/*
global $EMAIL_OVERRIDES;
$EMAIL_OVERRIDES = array(
	'bouncepath' => 'some email address',
	'returnreceipt' => 1
);
*/

/**
 * Default HEADER for all emails 
 */ 
$EMAIL_HEADER = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns='http://www.w3.org/1999/xhtml' >
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
</head>
<body>
<div style='padding:10px'>
";


/**
 * Default FOOTER for all emails 
 */ 
$EMAIL_FOOTER = "
<br /><br />
{SITENAME=link}
</div>
</body>
</html>";


/**
 * Mass-Mailing HEADER (admin->mailout)
 */ 

$MAILOUT_HEADER = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns='http://www.w3.org/1999/xhtml' >
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
</head>
<body>
<div style='padding:10px'>
";

/**
 * Mass-Mailing FOOTER (admin->mailout)
 */ 
$MAILOUT_FOOTER = "
<br /><br />
{SITENAME=link}
</div>
</body>
</html>";


/**
 * Notification Email HEADER (admin->notify)
 */ 
//TODO - integrate into notification routine
$NOTIFY_HEADER = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns='http://www.w3.org/1999/xhtml' >
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
</head>
<body>
<div style='padding:10px'>
";

/**
 * Notification Email FOOTER (admin->notify)
 */ 
$NOTIFY_FOOTER = "
<br /><br />
{SITENAME=link}
</div>
</body>
</html>";


/*
 *  SIGNUP EMAIL TEMPLATE - BODY. 
*/
$SIGNUPEMAIL_TEMPLATE = "
<div style='padding:10px'>
<div style='text-align:left; width:90%'>
".LAN_EMAIL_01." {USERNAME},<br />
<br />".
LAN_SIGNUP_97." {SITENAME}<br />
".LAN_SIGNUP_21."<br />
<br />
{ACTIVATION_LINK}<br />
<br />
".LAN_SIGNUP_59."<br />
<br />
".LAN_SIGNUP_18."<br />
<br />
".LAN_LOGINNAME.": <b> {LOGINNAME} </b><br />
".LAN_PASSWORD.": <b> {PASSWORD} </b><br />
<br />
".LAN_EMAIL_04."<br />
".LAN_EMAIL_05."<br />
<br />
".LAN_EMAIL_06."<br />
<br />
{SITENAME}<br />
{SITEURL}
<br /><br />".($pref['sitebutton'] ? "<a href='".SITEURL."' title=''><img src='".e_IMAGE_ABS.str_replace('{e_IMAGE}', '', $pref['sitebutton'])."' alt='' /></a>" : '')."
</div>
</div>
";


/*
 * QUICK ADD USER EMAIL TEMPLATE - BODY. 	
 * This is the email that is sent when an admin creates a user account in admin. "Quick Add User"
 	USRLAN_185 = A user account has been created for you at {SITEURL} with the following login:<br />Login Name: {LOGIN}<br />Password: {PASSWORD}<br/><br />
	USRLAN_186 = Please go to the site as soon as possible and log in, then change your password using the \'Settings\' option.<br /><br />
						You can also change other settings at the same time.<br /><br />Note that your password cannot be recovered if you lose it.
*/

$QUICKADDUSER_TEMPLATE = "<div style='padding:10px'>".USRLAN_185.USRLAN_186."</div>"; 


?>