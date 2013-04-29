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

include('config.php');

if ($location=opendir("../upload/"))
    {
        while (false!==($entry=readdir($location)))
            {
                if ($entry!="." && $entry!="..")
                    {
                        $files[]=$entry;
                        $size[]=filesize('../upload/'.$entry);
                    }
            }
        closedir($location);

if (isset($files) && isset($size))
    {
        $num=count($files);

        $size_sum_kb=ceil(array_sum($size)/1024);
        $size_sum_mb=number_format($size_sum_kb/1024,2);
        $free_space=$diskSpace-$size_sum_mb;

        echo '<table width="100%" border="0">';
        echo '<tr><td class="table_header">Filename</td><td class="table_header">Size</td></tr>';

for($i=0;$i<$num;$i++)
    {
        if ($size[$i]>(1024*1024)) $size_act=number_format(ceil($size[$i]/1024)/1024,2)." MB";
            elseif ($size[$i]>1024 && $size[$i]<(1024*1024)) $size_act=ceil($size[$i]/1024)." KB";
                else $size_act=$size[$i]." bytes";
        echo '<tr><td class="table_left"><a href="delete.php?selector=file&id='.$files[$i].'" target="_self" class="link"><img src="../images/red.png" alt="delete" width="'.$SmallIconSize.'" height="'.$SmallIconSize.'" style="border-style:none" /></a> <a href="../upload/'.$files[$i].'" target="_new" class="link" >&#187;&#32; '.$files[$i].'</a></td><td class="table_right"><a href="../upload/'.$files[$i].'" target="_new" class="link" >'.$size_act.'</a></td></tr>';
    }

        echo '</table>';
    
        echo '<p class="file_sum"><font style="font-weight:bold">'.$num.'</font> file(s) stored<br />Disk space used: <font style="font-weight:bold">'.$size_sum_mb.'</font> MB<br />Disk space available: <font style="font-weight:bold">'.$free_space.'</font> MB</p>';
    }

else echo '<p class="p_center">0 files uploaded</p>';

    }

?>

</body>

</html>