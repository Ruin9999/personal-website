<?php
  if(isset($_POST['submitproject'])) {

    include 'database.php';

    $title = mysqli_escape_string($_POST['title']);
    $date = mysqli_escape_string($_POST['date']);
    $remarks = mysqli_escape_string($_POST['remarks']);

    $sql = "INSERT INTO projects (title, date, remarks) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sql");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "sss", $title, $date, $remarks);
      mysqli_stmt_execute($stmt);
      
      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      header("Location: ../index.php?projectupload=success");
      exit();
    }
  } else if (isset($_POST['deleteproject'])) {

    include 'database.php';

    $title = mysqli_escape_string($_POST['title']);

    $sql = "DELETE FROM projects WHERE title=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sql");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $title);
      mysqli_stmt_execute($stmt);

      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      header("Location: ../index.php?projectdelete=success");
      exit();
    }

  } else {
    header("Location: ../index.php?");
    exit();
  }
 ?>
