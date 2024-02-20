<!DOCTYPE html>
<html>
<head>
	<title>회원가입</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>회원가입</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>이름</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>아이디</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>비밀번호</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>비밀번호 확인</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">회원가입</button>
          <a href="index.php" class="ca">이미 계정이 존재합니까?</a>
     </form>
</body>
</html>