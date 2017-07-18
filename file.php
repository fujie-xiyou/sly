<?php
include('config.php');
if($_COOKIE['pwd']===md5($pwd))
{
include("db/file.admin");
} else{
header('Location:admin.php');
}
?>