<?php 



       include("config.php");
        $c1=new Config();
        
      
        $is_btn_set =isset($_POST['button']);
        if($is_btn_set){
                $name=$_POST['name'];
                $salary=$_POST['salary'];
                $role=$_POST['role'];
                $age=$_POST['age'];
                $address=$_POST['address'];
                $phone=$_POST['phone'];
                $c1->insert($name,$salary,$role,$age,$address,$phone);
                
        }
        $res = $c1->fetch();
    
         $is_set=isset($_POST['delete']);

            if($is_set)
            {
                $id=$_POST['deleteId'];
                $c1->delete($id);
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

        <h1>Employee Registration Form</h1>
        <div class="p-3 mb-2 bg-body-tertiary">
        <form method="post">

        
      
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                       
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary">
                       
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role" name="role">
                       
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                       
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                       
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
    <?php while($data = mysqli_fetch_assoc($res)){ ?>
    <tr>
      <th scope="row"><?php echo $data['id'] ?></th>
      <td><?php echo $data['name'] ?></td>
      <td><?php echo $data['salary'] ?></td>
      <td><?php echo $data['role'] ?></td>
      <td><?php echo $data['age'] ?></td>
      <td><?php echo $data['address'] ?></td>
      <td><?php echo $data['phone'] ?></td>
      <td>
        <form method="post">
            <input type="hidden" value="<?php echo $data['id'] ?>" name="deleteId">
                    <button type="button" class="btn btn-warning">UPDATE</button>
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
