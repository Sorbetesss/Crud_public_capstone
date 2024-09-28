<?php
include "db_conn.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM `student` WHERE `student_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST["submit"])) {
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $student_email = $_POST["student_email"];
    $password = $_POST["password"];

    $sql = "UPDATE `student` SET `first_name` = '$first_name', `last_name` = '$last_name', `student_email` = '$student_email', `password` = '$password' WHERE `student_id` = '$student_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Student updated successfully");
        exit;
    } else {
        header("Location: index.php?msg=Failed to update student");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>eGrades Portal - Edit Student</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    eGrades Portal - Edit Student
  </nav>

  <div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <input type="hidden" name="student_id" value="<?php echo $row["student_id"]; ?>">
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row["first_name"]; ?>" required>
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row["last_name"]; ?>" required>
      </div>
      <div class="mb-3">
        <label for="student_email" class="form-label">Email</label>
        <input type="email" class="form-control" id="student_email" name="student_email" value="<?php echo $row["student_email"]; ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>" required>
      </div>
      <button type="submit" class="btn btn-dark" name="submit">Update Student</button>
    </form>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>