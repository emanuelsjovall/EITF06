<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
  </head>
  <body>
    <form action="/controllers/homeController.php" method="post">
      <h2>LOGIN</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class = "error"><?php echo $_GET['error']?></p>
      <?php } ?>
      <?php if (isset($_GET['message'])) { ?>
        <p class = "message"><?php echo $_GET['message']?></p>
      <?php } ?>
      <label>User Name</label>
      <input type="text" name="uname" placeholder="User Name">
      <label>User Password</label>
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Login</button>
    </form>

    <br>
    <a href="views/register.php">Register</a>
  </body>
</html>