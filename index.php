<?php
include "db_conn.php";

if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          ' . $msg . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if (isset($_GET["search"])) {
    $search_query = $_GET["search"];
    $sql = "SELECT * FROM `student` WHERE `first_name` LIKE '%$search_query%' OR `last_name` LIKE '%$search_query%' OR `student_email` LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM `student`";
}

$result = mysqli_query($conn, $sql);


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
  <title>eGrades Portal</title>
</head>

<body>
<nav class="navbar navbar-light" style="background-color: #00ff5573;">
  <div class="container-fluid d-flex justify-content-between">
    <a href="admin_home.php" class="btn btn-secondary">Back</a>
    <h1 class="fs-3">eGrades Portal Student Identification</h1>
  </div>
</nav>

  <div class="container">
    <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>

    <form action="" method="get" class="input-group mb-3">
      <input type="search" name="search" class="form-control" placeholder="Search...">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row["student_id"] ?></td>
        <td><?php echo $row["first_name"] ?></td>
        <td><?php echo $row["last_name"] ?></td>
        <td><?php echo $row["student_email"] ?></td>
        <td><?php echo $row["password"] ?></td>
        <td>
              
              <a href="edit.php?id=<?php echo $row["student_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["student_id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>