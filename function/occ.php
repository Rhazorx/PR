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

$cur_date=time();
$mysql_date=date($dateFormat, $cur_date);

$sql="SELECT * FROM dates WHERE dateDate >= '".$mysql_date."' ORDER BY dateDate ASC";
$query=mysql_query($sql,$connect) or die("MySQL error!");

$row=mysql_fetch_assoc($query);

if (mysql_num_rows($query)!=0)
    {
        echo '<table width="100%" border="0">';
        echo '<tr><td class="table_header"></td><td class="table_header">Occasion</td><td class="table_header">Days left</td></tr>';
	do
            {
                $id=$row["dateId"];
                $occ_date=strtotime($row['dateDate']);
                $diff=abs($occ_date-strtotime($mysql_date));
                $diff_days=floor($diff/(60*60*24));
                echo '<tr><td class="date">'.date('Y', $occ_date).'<br />'.strtoupper(date('M', $occ_date)).'<br />'.date('d', $occ_date).'</td><td class="date_occ"><a href="delete.php?selector=date&id='.$id.'" target="_self" class="link"><img src="../images/red.png" alt="delete" width="'.$SmallIconSize.'" height="'.$SmallIconSize.'" style="border-style:none" /></a> &#187;&#32; '.$row['dateOcc'].'</td><td class="date_right">'.$diff_days.' day(s)</td></tr>';
            }
	while ($row=mysql_fetch_assoc($query));
        echo '</table>';
    }
else echo '<p class="p_center">0 dates added</p>';

mysql_free_result($query);

?>

</body>
    
</html>