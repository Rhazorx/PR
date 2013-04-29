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

if (!isset($_SESSION))
    {
        session_start();
    }

if (isset($_SESSION["login"]) && $_SESSION["login"]===true)
    {
        include('function/functions.php');
        include('function/config.php');
        
        $path=1;
        
        $connect=connect($path);
        
        if ($connect===false)
            {
                $status="OFFLINE";
                $color=$ErrorColor;
            }
        else
            {
                $status="ONLINE";
                $color=$OkColor;
            }
        
        $cur_date=time();
        $echo_date=date($dateFormat, $cur_date);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <meta name="description" content="Personal Reminder - 2013 Balázs Panghy" />
        <meta name="keywords" content="personal,reminder,panghy,balázs,2013" />
        
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        
        <link rel="stylesheet/less" type="text/css" href="style/main.less" />
        <script src="style/less.js" type="text/javascript"></script>
        
        <title>Personal Reminder</title>
        
    </head>
    
    <body>

        <div class="main_container">
            
            <h2><img src="images/pin.png" alt="pin" width="<?php echo $BigIconSize; ?>" height="<?php echo $BigIconSize; ?>" style="border-style:none" /> Personal Reminder</h2>
            
        <div class="note_container">
            
            <h2>Notes</h2>
        
            <form name="notes" action="" method="post">
                <input type="text" name="item" class="inputfield" value=" Note" />
                <select name="prior" class="select"><option value="3">High</option><option value="2">Normal</option><option value="1">Low</option></select>
                <input type="submit" name="note_submit" value="Add" class="submit" />
            </form>
            
            <hr class="line" />
            
            <iframe src="function/note.php" frameborder="0" scrolling="auto" width="<?php echo $iFrameWidth; ?>" height="<?php echo $iFrameHeight; ?>" marginwidth="<?php echo $iFrameMargin; ?>"></iframe>
        
        </div>
        
        <div class="date_container">
            
            <h2>Dates</h2>
            
            <form name="dates" action="" method="post">
                <select name="year" class="select"><option value="0">Year</option><?php for ($i=2013; $i<=2015; $i++) echo "<option value=\"$i\">$i</option>"; ?></select>
                <select name="month" class="select"><option value="0">Month</option><?php for ($i=1; $i<=12; $i++) echo "<option value=\"$i\">$i</option>"; ?></select>
                <select name="day" class="select"><option value="0">Day</option><?php for ($i=1; $i<=31; $i++) echo "<option value=\"$i\">$i</option>"; ?></select>
                <input type="text" name="occ" class="select" value=" Occasion" />
                <input type="submit" name="date_submit" value="Add" class="submit" />
            </form>
            
            <hr class="line" />
            
            <iframe src="function/occ.php" frameborder="0" scrolling="auto" width="<?php echo $iFrameWidth; ?>" height="<?php echo $iFrameHeight; ?>" marginwidth="<?php echo $iFrameMargin; ?>"></iframe>
            
        </div>
        
        <div class="upload_container">
            
            <h2>Uploader</h2>
            
            <form name="upload" action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file" class="inputfield" />
                <input type="submit" name="upload_submit" value="Upload" class="submit" />
            </form>
            
            <hr class="line" />
                        
            <iframe src="function/file.php" frameborder="0" scrolling="auto" width="<?php echo $iFrameWidth; ?>" height="<?php echo $iFrameHeight; ?>" marginwidth="<?php echo $iFrameMargin; ?>"></iframe>
        
        </div>
        
        <?php
        
        if (isset($_POST["note_submit"]))
           {
            $note=$_POST["item"];
            $prior=$_POST["prior"];
            $code=note_add($note, $prior, $connect);
            
                if ($code===false)
                    {
                        $color=$ErrorColor;
                        $status="Adding note failed!";
                    }
                            
           }
                    
        if (isset($_POST["date_submit"]))
            {
                $occ=$_POST["occ"];
                $year=$_POST["year"];
                $month=$_POST["month"];
                $day=$_POST["day"];
                $code=occ_add($occ,$connect,$year,$month,$day);
                
                    if ($code===false)
                        {
                            $color=$ErrorColor;
                            $status="Adding date failed!";
                        }
            }
                    
        if (isset($_POST["upload_submit"]))
            {
                $tmp_name=$_FILES["file"]["tmp_name"];
                $name=$_FILES["file"]["name"];
                $error=$_FILES["file"]["error"];
                $code=upload($tmp_name,$name,$error);
                
                    if ($code===false)
                        {
                            $color=$ErrorColor;
                            $status="Upload failed!";
                        }
            }
        
        ?>
        
        <div class="main_footer">
            
            <table border="0" width="100%">
                
            <tr>
                
            <td class="footer_table_mod">
            <div class="footer_div_left">
            Status: <?php echo '<font color="'.$color.'">'.$status.'</font>'; ?>
            </div>
            </td>
            
            <td>
            <div class="footer_div_mid">
            Welcome! | <a href="main.php" target="_self" class="link"><img src="images/refresh.png" alt="refresh" width="<?php echo $SmallIconSize; ?>" height="<?php echo $SmallIconSize; ?>" style="border-style:none" /></a> <a href="main.php" target="_self" class="link">Refresh</a> | <a href="function/logout.php" target="_self" class="link"><img src="images/logout.png" alt="logout" width="<?php echo $SmallIconSize; ?>" height="<?php echo $SmallIconSize; ?>" style="border-style:none" /></a> <a href="function/logout.php" target="_self" class="link">Logout</a> | <?php echo $echo_date; ?>
            </div>
            </td>
            
            <td>
            <div class="footer_div_right">
            <a href="mailto:panghyba@gmail.com" class="link">&#169; 2013 Balázs Panghy</a>
            </div>
            </td>
            
            </tr>
            
            </table>
            
        </div>
        
        </div>
        
    </body>
    
</html>

<?php

} // login if

else
    {
        header("Location: index.php");
    }

?>
