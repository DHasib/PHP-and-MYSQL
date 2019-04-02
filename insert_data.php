<?php
if ($_POST){ 

   Session_Start();
  $firstnamr  = $_POST['first_name'];
  $lastname   = $_POST['last_name'];
  $email      = $_POST['email'];
  $password   = $_POST['password'];

      if ($firstnamr == '' or $lastname == '' or $email  == '' or $password == ''){
         $_SESSION['msg'] = '<strong class="text-danger"> <h2>Fields must not be empty</h2> </strong>';
         header('location:index.php');
      }
      else if(!filter_var($email  , FILTER_VALIDATE_EMAIL)) {
         $_SESSION['msg'] = '<strong class="text-danger"> <h2>INvailed E-mail</h2> </strong>';
         header('location:index.php');
      }else if((strlen($password)) < 8 or (strlen($password)) > 16)   {
         $_SESSION['msg'] = '<strong class="text-danger"> Password must be in 8 to 16 charecter </strong>';
         header('location:index.php');
      }else{

        //for connection database........................
          include_once 'db_connection.php';
          $conn=connection();

                $sql = "INSERT INTO users_details (FIRST_NAME,LAST_NAME,PASSWORD,EMAIL)
                VALUES('$firstnamr','$lastname','$password','$email ')";
                if($conn->query($sql)){
                  $_SESSION['msg'] = '<strong class="text-success"> Inserted table data sucessfully </strong>';
                  header('location:index.php');
                }else{
                  $_SESSION['msg'] = '<strong class="text-danger"> Table data inserte failed </strong>';
                  header('location:index.php');
                }
 
 
}


}

?>