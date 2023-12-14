<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
  </head>
  <body>
    <?php
        include "./db_conn.php";
        if(isset($_COOKIE['secure_session_id'])) {
          $secure = $_COOKIE['secure_session_id'];
          $stmt = mysqli_prepare($conn, "SELECT * FROM Secure WHERE id=(?)");
          mysqli_stmt_bind_param($stmt, "s", $secure);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          // if there is a session id in the database that matches the secure id
          if (mysqli_num_rows($result) === 1){
            $data = mysqli_fetch_assoc($result);
            session_start();
            session_id($data['session']);
            setcookie('PHPSESSID', $data['session'], 0, "/", "localhost", true, true);
            header('location:controllers/getProducts.php');
            exit(0);
          }
        }
    ?>
    <form action="controllers/logInController.php" method="post">
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
      <input type="checkbox" id="keepLoggedIn" name="keepLoggedIn">
      <label for="keepLoggedIn">Keep me logged in</label>
      <button type="submit">Login</button>
    </form>
    <br>
    <a href="views/register.php">Register</a>
  </body>
</html>