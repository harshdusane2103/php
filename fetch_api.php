<?php
  header("Access-Controller-Allow-Method:GET");
  header("Content-Type:application/json");

  include("Config.php");
  $c1 = new Config();
  if($_SERVER['REQUEST_METHOD'] =='GET')
  {
       
         $res = $c1->fetch() ;
         $emplyoee=[];
        
         if($res){
            while( $data =mysqli_fetch_assoc($res) )
            {
                array_push($emplyoee,$data);
                $arr['data']=$emplyoee;
            }

          
         }
         else{
            $arr["err"]= "Data not found !";

         }
  }
  else
  {
    $arr['error'] ="Only POST type is allowed";
  }


  echo json_encode($arr);


  ?>