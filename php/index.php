<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Flytpay Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>아이디</label>
     	<input type="text" name="uname" placeholder="아이디"><br>

     	<label>비밀번호</label>
     	<input type="password" name="password" placeholder="비밀번호"><br>

     	<button type="submit">로그인</button>
          <a href="signup.php" class="ca">회원가입</a>
     </form>
</body>
</html>