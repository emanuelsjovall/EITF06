<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
  </head>
  <body>
    <form action="/controllers/registController.php" method="post">
      <h2>REGISTER</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class = "error"><?php echo $_GET['error']?></p>
      <?php } ?>
      <label>User Name</label>
      <input type="text" name="uname" placeholder="User Name">
      <label>User Password</label>
      <input type="password" name="password" placeholder="Password">
      <label>User Adress</label>
      <input type="text" name="userAdress" placeholder="Address">
      <button type="submit">Register</button>
    </form>

    <br>
    <a href="../index.php">Log in</a>
  </body>
</html>