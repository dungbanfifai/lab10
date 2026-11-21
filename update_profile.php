<?php
session_start();
require_once("settings.php");

// Check whether the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['email'])) {

  $username = $_SESSION['username'];
  $email = trim($_POST['email']);

  // Update the user's email
  $sql = "UPDATE `user` SET email = ? WHERE username = ?";

  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ss", $email, $username);

  if (mysqli_stmt_execute($stmt)) {

    header("Location: profile.php");
    exit();
  } else {

    echo "Error updating profile: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($conn);
