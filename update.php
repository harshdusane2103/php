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

</head>

<body>

    <div class="mx-auto p-2" style="width: 500px;">
        <span class="border border-light-subtle">

            <h1>Update Form</h1>
            <div class="p-3 mb-2 bg-body-tertiary">
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