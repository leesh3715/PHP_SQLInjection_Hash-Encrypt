<!DOCTYPE html>
<html>
<head>
  <meta charset ="utf-8" />
  <title>회원가입</title>
</head>
  <body>
    <form name ='join' method="POST" action="check.php">
<center>
      <h1>회원 정보를 입력 하세요.</h1>
      <table border="1">
        <label>ID : <input type="text" name="userid" /></label>
        <br />
        <label>PW : <input type="text" name="userpw" /></label>
        <br />
        <label>PW again: <input type="text" name="userpw_a" /></label><br>
        <br />
        <input type="submit" value="제출" onclick = "location.href='http://localhost/login.php'"; /><br>
      </table>

    </form>
    <input type="reset" value="다시 쓰기" />
    </center>
  </body>
</html>
