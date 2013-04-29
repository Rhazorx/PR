<?php

/*
+--------------------------------------------------------------------------------------------------------+
| This code is part of the Personal Reminder software, copyright by Balázs Panghy (panghyba@gmail.com)   |
| Obtain permission before selling this code, hosting it on a commercial website or redistributing       |
| it over the Internet or in any other medium. In all cases copyright must remain intact!                |
+--------------------------------------------------------------------------------------------------------+
*/

if (!isset($_SESSION))
{
session_start();
}

session_unset();
session_destroy();

header("Location: ../index.php");

?>
