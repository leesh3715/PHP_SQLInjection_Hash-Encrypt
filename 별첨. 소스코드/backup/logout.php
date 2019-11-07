<?php

if(!session_id()) session_start(); // 세션

if($_SESSION['id']!=null){
   session_destroy();
}

echo "<script>window.alert('정상적으로 로그아웃 되었습니다.');</script>";
echo "<script>location.href='login.php';</script>";


?>
