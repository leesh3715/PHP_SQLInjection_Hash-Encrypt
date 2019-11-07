<?php
$id=$_POST['id'];
$password=$_POST['pw'];
//$name=$_POST['name'];
//$email=$_POST['email'];
if($id!='' && $password!=''){
	$db=mysqli_connect('localhost','root','autoset');
	if(!$db){
		die('MySQL connect ERROR: '.mysqli_error());
	}
	mysqli_query($db,"set names utf8");
	$ret=mysqli_select_db($db,'member');
	if(!$ret){
		die('MySQL select ERROR:'.mysqli_error());
	}
	$sql="SELECT * FROM test WHERE id='{$id}'";
	$resource=mysqli_query($db, $sql);
	$num=mysqli_num_rows($resource);
	if($num>0){
		  echo "<script> alert('이미 존재하는 아이디입니다.');</script>";
        echo "<script>window.history.back();</script>";
        exit(0);
	}
	$sql="INSERT INTO board(id,password) VALUE ('{$id}','{$password}')";
	$ret=mysqli_query($db,$sql);
	    if ( $ret ){
        echo "<script> alert('회원가입이 완료되었습니다');</script>";
		echo ("<script> location.href='index.html';</script>");
        exit(0);
    }else{
        die('MySQL Query ERROR : '. mysqli_error($db));
    }
}
?>
