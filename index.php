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

include('function/config.php');

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
        
        <div class="login_container">
            
        <h2><img src="images/pin.png" alt="pin" width="<?php echo $BigIconSize; ?>" height="<?php echo $BigIconSize; ?>" style="border-style:none" /> Personal Reminder</h2>
        
        <div class="login_div">
        
        <form name="login" action="" method="post">
        
        <table class="login_table">
            <tr>
                <td>Name</td>
                <td><input type="text" name="user" class="login_inputfield" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="login_inputfield" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login_submit" value="Login" class="submit" /></td>
            </tr>
        </table>
        
        </form>
        
        <div class="login_error_div">
        
        <?php
        
        include('function/functions.php');
        
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
                
        if (isset($_POST["login_submit"]))
            {

                login($connect);
                    
                if ($_SESSION["login"]===true)
                    {
                        header("Location: main.php");
                    }
                else
                    {
                        $status="Acces denied!";
                        $color=$ErrorColor;
                    }
                    
            }
            
        echo 'Status: <font color="'.$color.'">'.$status.'</font>';
        
        ?>
        
        </div>
        
        </div>
        
        <p class="login_footer">&#169; 2013 Balázs Panghy</p>
        
        </div>
        
    </body>
    
</html>
