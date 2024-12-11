<?php

include("config.php");
session_start();
$c1 = new Config();


$is_btn_set = isset($_POST['button']);
if ($is_btn_set) {
  $name = $_POST['name'];
  $salary = $_POST['salary'];
  $role = $_POST['role'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
        
          $c1->insert($name, $salary, $role, $age, $address, $phone);
            header('Location: index.php'); // Redirect to refresh the page and clear the form.
        
       

}

$is_set = isset($_POST['delete']);

if ($is_set) {
  $id = $_POST['deleteId'];
  $c1->delete($id);
  header("Location: " . $_SERVER['PHP_SELF']);
}
if (isset($_POST['update'])) {
  $updatingId = $_REQUEST['deleteId'];
  $name = $_POST['nameId'];
  $salary = $_POST['salaryId'];
  $role = $_POST['roleId'];
  $age = $_POST['ageId'];
  $address = $_POST['addressId'];
  $phone = $_POST['phoneId'];

  $_SESSION['id'] = $updatingId;
  $_SESSION['name'] = $name;
  $_SESSION['salary'] = $salary;
  $_SESSION['role'] = $role;
  $_SESSION['age'] = $age;
  $_SESSION['address'] = $address;
  $_SESSION['phone'] = $phone;
  header("Location: update.php");
}


$res = $c1->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>

</head>

<body>

  <div class="mx-auto p-2" style="width: 500px;">
    <span class="border border-light-subtle">

      <h1>Employee Registration Form</h1>
      <div class="p-3 mb-2 bg-body-tertiary">
        <form method="post">



          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces.">

          </div>
          <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary">

          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role"required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces.">

          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age"required min="18" max="100">

          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces.">

          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone">

          </div>

          <button type="submit" class="btn btn-primary" name="button">Submit</button>
        </form>
      </div>
    </span>
  </div>
  <hr>
  <div class="mx-auto p-2" style="width:1000px;">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">EMPLYOEE NAME</th>
          <th scope="col">SALARY</th>
          <th scope="col">ROLE</th>
          <th scope="col">AGE</th>
          <th scope="col">ADDRESS</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($data = mysqli_fetch_assoc($res)) { ?>
          <tr>
            <th scope="row"><?php echo $data['id'] ?></th>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['salary'] ?></td>
            <td><?php echo $data['role'] ?></td>
            <td><?php echo $data['age'] ?></td>
            <td><?php echo $data['address'] ?></td>
            <td><?php echo $data['phone'] ?></td>
            <td>
              <form method="POST">
                <input type="hidden" value="<?php echo $data['id'] ?>" name="deleteId">
                <input type="hidden" value="<?php echo $data['name'] ?>" name="nameId">
                <input type="hidden" value="<?php echo $data['salary'] ?>" name="salaryId">
                <input type="hidden" value="<?php echo $data['role'] ?>" name="roleId">
                <input type="hidden" value="<?php echo $data['age'] ?>" name="ageId">
                <input type="hidden" value="<?php echo $data['address'] ?>" name="addressId">
                <input type="hidden" value="<?php echo $data['phone'] ?>" name="phoneId">
                <button type="submit" class="btn btn-warning" name="update">UPDATE</button>
                <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>