<?php
 class Config{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="demo";
    private $connection;

    public function connect()
    {
       $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
      //  if($res)
      //  {
      //   echo"Database connected Successflly !";
      //  }
      //  else
      //  {
      //   echo"Database connected failed !";
      //  }

    }
   
    public function __construct()
    {
      $this->connect();
    }
    public function insert($name,$salary,$role,$age,$address,$phone)
    {
      $query = "INSERT INTO note(name,salary,role,age,address,phone) VALUES('$name','$salary','$role','$age','$address','$phone')";
      $res=mysqli_query($this->connection,$query);
      return $res;
   }

      public function fetch()
      {
         $query ="SELECT * FROM note";
         $res = mysqli_query($this->connection,$query);
         return $res;
      }
      public function delete($id)
      {
         $query ="DELETE FROM note WHERE id = $id";
         $res = mysqli_query($this->connection,$query);
         return $res;

      }
      public function update($id,$name,$salary,$role,$age,$address,$phone)
      {
         $query = "UPDATE note SET name='$name',salary=$salary,role='$role',age='$age',address='$address',phone='$phone' WHERE id=$id";
         $res = mysqli_query($this->connection,$query);
         return $res; 
      }
      public function uploadImage($name)
      {
         $query = "INSERT INTO gallary(name) VALUES('$name')";
         $res = mysqli_query($this->connection,$query);
         return $res;
      }



 }


?>