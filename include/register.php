<?php
  if(isset($_POST['submit'])) {

    include 'database.php';

    $username = mysqli_escape_string($conn, $_POST['username']);
    $lowerusername = strtolower($username);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $passwordconfirm = mysqli_escape_string($conn, $_POST['passwordconfirm']);

    if(empty($username) || empty($password) || empty($passwordconfirm)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
    } else {
      if($password != $passwordconfirm) {
        header("Location: ../register.php?error=passwordconfirm");
        exit();
      } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../register.php?error=sql");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $lowerusername);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $result = mysqli_stmt_num_rows($stmt);
          if($result > 0) { //User already registered
            header("Location: ../register.php?error=usertaken");
            exit();
          } else {
            $sql = "INSERT INTO users (username, password) VALUES (?,?)";
            $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../register.php?error=sql");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "ss", $username, $hashedpassword);
              mysqli_stmt_execute($stmt);
              header("Location: ../index.php?register=success");
              exit();
            }
          }
        }
      }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  } else {
    header("Location: ../register.php?");
    exit();
  }
 ?>
