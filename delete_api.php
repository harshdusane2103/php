<?php
  header("Access-Controller-Allow-Method: DELETE");
  header("Content-Type:application/json");

  include("Config.php");
  $c1 = new Config();
  if($_SERVER['REQUEST_METHOD'] =='DELETE')
  {
        $data =file_get_contents("php://input");
        parse_str($data, $result);
        $id =$result['id'];
       
         $res = $c1->delete($id) ;
      

          if($res){
            $arr["err"]= "Data delete successfully !";
         }
         else{
            $arr["err"]= "Data not found !";

         }
  }
  else
  {
    $arr['error'] ="Only DELETE type is allowed";
  }


  echo json_encode($arr);


  ?>