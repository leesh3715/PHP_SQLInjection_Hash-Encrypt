<?php
  include ("connect.php");

  $user_id = $_POST['userid'];
  $user_pw = $_POST['userpw'];
  $user_pwa =$_POST['userpw_a'];

$select_query ="SELECT id FROM test";
$result_set = mysqli_query($con,$select_query);
while($row = mysqli_fetch_assoc($result_set))
{
  if($user_id == $row['id'])
  {
    $num = 1;
    break;
  }
}//아이디가 중복이면 변수 num에다가 1을 저장해 중복을 구별

if(($user_pw == $user_pwa) and $num!=1)
 {
   $user_pw = password_hash ($user_pw,  PASSWORD_BCRYPT); // 해쉬 암호화
   $result = mysqli_query($con,"INSERT INTO test (id, pw) VALUES('$user_id','$user_pw')");
   header("Location: http://localhost/login.php");
 }
 else if (($user_pw != $user_pwa) and $num==1)
 {
   echo "<script>alert(\"아이디가 중복 되었습니다.비밀번호가 일치하지 않습니다.\");</script>";
   echo "<script>
   document.location.href='http://localhost/join.php';
   </script>";
 }
 else if($num == 1)
 {
   echo "<script>alert(\"아이디가 중복 되었습니다.\");</script>";
   echo "<script>
   document.location.href='http://localhost/join.php';
   </script>";
 }
 else
 {
    echo "<script>alert(\"비밀번호가 일치하지 않습니다.\");</script>";
    echo "<script>
    document.location.href='http://localhost/join.php';
    </script>";
 }
 ?>
