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

if (isset($_SESSION["login"]) && $_SESSION["login"]===true)
    {
        include('functions.php');
        
        $path=2;
        $connect=connect($path);

$selector=$_GET["selector"];
$id=$_GET["id"];

if ($selector=="note")
    {
        note_del($connect, $id);
    }

elseif ($selector=="date")
    {
        occ_del($connect, $id);
    }
    
elseif ($selector=="file")
    {
        $filename=$id;
        unlink('../upload/'.$filename);
    }

}

?>

<script type="text/javascript">
parent.location="../main.php";
</script>
