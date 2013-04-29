<?php

/*
+--------------------------------------------------------------------------------------------------------+
| This code is part of the Personal Reminder software, copyright by Balázs Panghy (panghyba@gmail.com)   |
| Obtain permission before selling this code, hosting it on a commercial website or redistributing       |
| it over the Internet or in any other medium. In all cases copyright must remain intact!                |
+--------------------------------------------------------------------------------------------------------+
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <meta name="description" content="Personal Reminder - 2013 Balázs Panghy" />
        <meta name="keywords" content="personal,reminder,panghy,balázs,2013" />
        
        <link rel="stylesheet/less" type="text/css" href="../style/main.less" />
        <script src="../style/less.js" type="text/javascript"></script>
        
        <title>Personal Reminder</title>
        
    </head>
    
    <body>

<?php

include('functions.php');
include('config.php');

$path=2;

$connect=connect($path);

$sql="SELECT * FROM notes ORDER BY notePrior DESC";
$query=mysql_query($sql,$connect) or die("MySQL error!");

$row=mysql_fetch_assoc($query);

if (mysql_num_rows($query)!=0)
    {
        echo '<table border="0" width="100%">';
        echo '<tr><td class="table_header">Note</td><td class="table_header">Priority</td></tr>';
	do
            {
                $id=$row["noteId"];
                if ($row["notePrior"]==1) $prior="Low";
                    elseif ($row["notePrior"]==2) $prior="Normal";
                        else $prior="High";
                echo '<tr><td class="table_left"><a href="delete.php?selector=note&id='.$id.'" target="_self" class="link"><img src="../images/red.png" alt="delete" width="'.$SmallIconSize.'" height="'.$SmallIconSize.'" style="border-style:none" /></a> &#187;&#32; '.$row['noteText'].'</td><td class="table_right">'.$prior.'</td></tr>';
            }
	while ($row=mysql_fetch_assoc($query));
        echo '</table>';
    }
else echo '<p class="p_center">0 notes added</p>';

mysql_free_result($query);

?>

</body>
    
</html>