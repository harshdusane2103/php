<?php
  header("Access-Controller-Allow-Method: PUT");
  header("Content-Type:application/json");

  include("Config.php");
  $c1 = new Config();
  if($_SERVER['REQUEST_METHOD'] =='PUT')
  {
        $data =file_get_contents("php://input");
        parse_str($data, $result);
        $id =$result['id'];
        $name =$result['name'];
        $salary =$result['salary'];
        $role =$result['role'];
        $aga =$result['age'];
        $address =$result['address'];
        $phone =$result['phone'];
       
         $res = $c1->update($id,$name,$salary,$role,$aga,$address,$phone) ;

      

          if($res){
            $arr["err"]= "Data Update successfully !";
         }
         else{
            $arr["err"]= "Data not found !";

         }
  }
  else
  {
    $arr['error'] ="Only update type is allowed";
  }


  echo json_encode($arr);


  ?>