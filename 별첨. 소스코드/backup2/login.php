<?php
$id=$_POST['id'];
$password=$_POST['pw'];
if ( ($id=='') || ($password=='') ) {
  echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');history.back();</script>";
  exit;
}
if($id != '' && $password != '')
{
	$db=mysqli_connect('localhost','root','autoset');
    mysqli_query($db,"set names utf8");
	if(!$db){
		die('MySQL connect ERROR:' . mysqli_error());
   }

    $ret = mysqli_select_db( $db,'member');
    if ( !$ret ){
        die('MySQL select ERROR : '. mysqli_error());
	}
  //$sql = "SELECT * FROM board WHERE id='{$id}' AND pw=md5('{$pw}')";
  //$sql = "SELECT * FROM board WHERE id='{$id}' AND pw='{$pw}'";
 $sql = "SELECT * FROM test WHERE id=''or'1=1' AND pw=''or'1=1'";

	$resource=mysqli_query($db,$sql);
	$num=mysqli_num_rows($resource);
	$row=mysqli_fetch_array($resource);

	if($num>0)
		{
		echo "<script> alert('로그인 되었습니다.');</script>";
		session_start();
        $_SESSION['login_user']=$id;
		header("location: member_in.html");
	}
		else
	{
		echo "<script> alert('로그인 정보가 없습니다.');</script>";
		echo "<script>window.history.back();</script>";
        exit(0);
	}
}
?>
