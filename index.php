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
        .form-container {
            background-image: url('https://img.freepik.com/free-vector/blue-fluid-background-frame_53876-99019.jpg?ga=GA1.1.1153095737.1726993841&semt=ais_hybrid');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            width: 500px;
            height: 800px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-box {
            background-color: rgba(254, 254, 254, 0.7);
            padding: 20px;
            width: 500px;
            height: 500px;
            border-radius: 8px;
            border: none;
        }

        .heading {
            color: black;
            height: 80px;
            text-align: center;
            padding: 10px;
            font-size: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.9);
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .table-box {
            border: 2px solid #f5c6cb;  
            border-radius: 8px;
            background-color: #f8d7da;
            padding: 20px;
        }

    </style>


</head>

<body>
<div class="form-container">
  <div class="mx-auto p-2" style="width: 500px;">
    <span class="border border-light-subtle">

      <h1>Employee Registration Form</h1>
     
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