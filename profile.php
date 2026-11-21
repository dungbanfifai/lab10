<?php
session_start();
require_once("settings.php");

// Check whether the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];

// Retrieve the user's information
$sql = "SELECT * FROM `user` WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
</head>

<body>

  <h2>My Profile</h2>

  <p>Username: <?php echo htmlspecialchars($row['username']); ?></p>

  <p>Email: <?php echo htmlspecialchars($row['email']); ?></p>

  <h3>Edit Profile</h3>

  <form action="update_profile.php" method="POST">

    <label for="email">New Email:</label>

    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

    <input type="submit" value="Update Email">

  </form>

  <br>

  <a href="logout.php">Logout</a>

</body>

</html>