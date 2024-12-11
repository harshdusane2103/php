<?php
  header("Access-Controller-Allow-Method:POST");
  header("Content-Type:application/json");
  include("Config.php");
  $c1 = new Config();

  if($_SERVER['REQUEST_METHOD'] =='POST')
  {
         $name = $_POST['name'];
         $salary =$_POST['salary'];
         $role =$_POST['role'];
         $age =$_POST['age'];
         $address =$_POST['address'];
         $phone =$_POST['phone'];
         $res = $c1->insert($name,$salary,$role,$age,$address,$phone);
         if($res){

            $arr['msg']="Data inserted successfully !";
         }
         else{
            $arr["msg"]= "Data not inserted !";

         }
  }
  else
  {
    $arr['error'] ="Only POST type is allowed";
  }


  echo json_encode($arr);

?>

