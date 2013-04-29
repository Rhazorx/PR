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

error_reporting(0);

function connect ($path) {

if ($path===1) include('function/config.php');
    elseif ($path===2) include('config.php');

if ($_SERVER["HTTP_HOST"]=='localhost' || $_SERVER["HTTP_HOST"]=='127.0.0.1' || ereg('^192\.168\.0\.[0-9]+$', $_SERVER["HTTP_HOST"]))
    {
        $hostname=$local_hostname;
        $username=$local_username;
        $password=$local_password;
        $database=$local_database;
    }
else
    {
        $hostname=$online_hostname;
        $username=$online_username;
        $password=$online_password;
        $database=$online_database;
    }

$connect=mysql_pconnect($hostname, $username, $password);

mysql_select_db($database,$connect);

return $connect;

}

function login ($connect) {

$user=mysql_real_escape_string($_POST["user"]);
$passwd=mysql_real_escape_string($_POST["password"]);

$sql="SELECT loginName, loginPasswd FROM login WHERE loginName='".$user."' AND loginPasswd='".hash('sha1', $passwd)."'";
$query=mysql_query($sql,$connect) or die("MySQL error!");

if(mysql_num_rows($query)===1)
    {
        $_SESSION["login"]=true;
    }
else
    {
        $_SESSION["login"]=false;
    }

}

if (isset($_SESSION["login"]) && $_SESSION["login"]===true)

{

function note_add ($item, $prior, $connect) {

$note=mysql_real_escape_string($item);

if ($note!=" Note" && $note!="")
    {
        $sql="INSERT INTO notes VALUES ('','$note','$prior')";
        mysql_query($sql,$connect) or die("MySQL error!");
        $code=true;
        return $code;
    }
    
else
    {
        $code=false;
        return $code;
    }

}

function occ_add ($occ, $connect, $year, $month, $day) {

$occ_in=mysql_real_escape_string($occ);

if (checkdate($month,$day,$year)===true && ($occ_in!="" && $occ_in!=" Occasion"))
    {
        $date=$year."-".$month."-".$day;
        $sql="INSERT INTO dates VALUES ('','$occ_in','$date')";
        mysql_query($sql,$connect) or die("MySQL error!");
        $code=true;
        return $code;
    }
else
    {
        $code=false;
        return $code;
    }
}

function note_del ($connect, $id) {

$sql="DELETE FROM notes WHERE noteId='$id'";
mysql_query($sql,$connect) or die("MySQL error!");

}

function occ_del ($connect, $id) {

$sql="DELETE FROM dates WHERE dateId='$id'";
mysql_query($sql,$connect) or die("MySQL error!");

}

function upload ($tmp_name, $name, $error) {

if ($error>0) return $code=false;
else
    {
        if (file_exists("upload/".$name))
            {
            	$FileCounter=1;
                $FinalFilename=$name;
                
                while (file_exists('upload/'.$FinalFilename))
                    $FinalFilename=$FileCounter++.'_'.$name;
                
                move_uploaded_file($tmp_name, "upload/".$FinalFilename);
                return $code=true;
            }
        else
        {
            move_uploaded_file($tmp_name, "upload/".$name);
            return $code=true;
        }
    }
}

}

?>
