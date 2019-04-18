<?php
  if(isset($_POST['submit'])) {

    include 'database.php';

    $username = strtolower(mysqli_real_escape_string($conn, $_POST['username']));
    $password = mysqli_escape_string($conn, $_POST['password']);
    if(empty($username) || empty($password)) {
      header("Location: ../login.php?error=emptyfields");
      exit();
    } else {
      $sql = "SELECT * FROM users WHERE lower(username)=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../login.php?error=sql");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)) { //is user registered?
        $passwordcheck = password_verify($password, $row['password']);
        if($passwordcheck == false) {
          header("Location: ../login.php?error=invalidpass&user=".$username);
          exit();
        } else if ($passwordcheck == true) {
          $_SESSION['username'] = $row['username'];
          header("Location: ../index.php?login=success");
          exit();
        } else { //incase anything weird happens, redirect
          header("Location: ../login.php");
          exit();
        }
      } else { //user not registered
        header("Location: ../login.php?error=invaliduser&user=".$username);
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  } else { //incase anything weird happens, redirect
    header("Location: ../login.php?");
    exit();
  }
 ?>
