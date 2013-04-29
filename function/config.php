<?php

/*
 +-------------------------------------------------------------------+
 |                      PERSONAL REMINDER                            |
 |                                                                   |
 | Copyright Balázs Panghy (panghyba@gmail.com)                      |
 | Last modified: 2013-04-29                                         |
 +-------------------------------------------------------------------+
 | This program may be used and hosted free of charge by anyone for  |
 | personal purpose as long as this copyright notice remains intact. |
 +-------------------------------------------------------------------+
*/

/*
+--------------------------------------------------------------------------------------------------------+
| This code is part of the Personal Reminder software, copyright by Balázs Panghy (panghyba@gmail.com)   |
| Obtain permission before selling this code, hosting it on a commercial website or redistributing       |
| it over the Internet or in any other medium. In all cases copyright must remain intact!                |
+--------------------------------------------------------------------------------------------------------+
*/

//========================================================================================================
// Database settings (local/online)
//========================================================================================================

$local_hostname="localhost";
$local_username="yourusername";
$local_password="yourpassword";
$local_database="yourdbname";

$online_hostname="yourhost";
$online_username="yourname";
$online_password="yourpassword";
$online_database="yourdbname";

//========================================================================================================
// Other settings
//========================================================================================================

// Font color for the errors/status messages
$ErrorColor="red";
$OkColor="green";

// Size of the icons in pixels (pin, cross, refresh)
$BigIconSize="25";
$SmallIconSize="12";

// iFrame settings (visible area inside the 3 main boxes)
$iFrameHeight="550";
$iFrameWidth="570";
$iFrameMargin="20";

// Max. disk space avalaiable for the uploaded files in MB
$diskSpace="1500";

// Format of the date (http://php.net/manual/en/function.date.php)
// Changing this may cause problems with the 'days left' calculation!
$dateFormat="Y-m-d";

?>
