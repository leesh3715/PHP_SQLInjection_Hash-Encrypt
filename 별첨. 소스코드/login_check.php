<?php

if(!session_id()) session_start(); // 세션
include ("connect.php"); // DB접속

$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

$query = "select * from test where id='$id'";
//$query = "select * from test where id='$id' and pw='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$hash_password = $row['pw'];

//if($id==$row['id'] && $pw==$row['pw']){ // id와 pw가 맞다면 login (인젝션 X)
//if($id==$_POST['id'] && $pw==$_POST['pw']){ // id와 pw가 맞다면 login (인젝션 O)
if($id==$row['id']) {
  
if(password_verify($pw, $hash_password)){ // 인젝션 하려면 이거 주석처리 해야함

 $_SESSION['id']=$row['id'];
 $_SESSION['pw']=$row['pw'];
 //$_SESSION['name']=$row['name'];

   echo "<script>location.href='login.php';</script>";

}else{ // id 또는 pw가 다르다면 login 폼으로

   echo "<script>window.alert('잘못된 아이디 또는 비밀번호 입니다.');</script>";
   echo "<script>location.href='login.php';</script>";

}
}

?>
