<?php
session_start();
require_once("settings.php");

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {

    $_SESSION['username'] = $username;

    header("Location: profile.php");
    exit();
  } else {
    echo "Invalid username or password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>

  <h2>Login</h2>

  <form method="POST" action="login.php">

    <label>Username:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" name="login" value="Login">

  </form>

</body>

</html>