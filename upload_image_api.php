<?php 
  header("Access-Control-Allow-Method:POST");
  header("Content-Type:application/json");
  include("config.php");
  $c1 =new Config();
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $img= $_FILES['name'];

    print_r($img);
    
  
   $isImageUpload = move_uploaded_file($img['tmp_name'],"images/".$img['name']);
   $res=$c1->uploadImage($img['name']);
    
   if($res)
   {
       $arr["msg"]="Image Uploaded Successfully";

   }
   else
   {
       $arr["msg"]= "Image Uploadtion failed";
   }
   
 
  }
  else
  {
    $arr['err']="ONLY POST method is allow";
  }
  echo json_encode($arr);





?>