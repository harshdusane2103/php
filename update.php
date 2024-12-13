<?php
include "config.php";
$c1 = new Config();

session_start();

$id  = $_SESSION['id'];
$name = $_SESSION['name'];
$salary = $_SESSION['salary'];
$role = $_SESSION['role'];
$age = $_SESSION['age'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];



if (isset($_POST['button'])) {

    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Update the record
    echo $id;
    $c1->update($id, $name, $salary, $role, $age, $address, $phone);
    header("Location: index.php");
}


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

            <h1>Update Form</h1>
        
                <form method="post">



                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">

                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $salary ?>">

                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="<?php echo $role ?>">

                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $age ?>">

                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">

                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">

                    </div>

                    <button type="submit" class="btn btn-primary" name="button">Update</button>
                </form>
            </div>
        </span>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>