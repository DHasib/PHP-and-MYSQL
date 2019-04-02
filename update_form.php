<!DOCTYPE html>
<html>
<head>
<title>Gental Code</title>

<?php
Session_Start();
  ?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

<style>

.container{
  height:810px;
  width:100%;
}
.header,.footer{
   height:9%;
   width:100%;
   text-align: center;
   color: #ffff;
   background-color: SlateBlue;
}

.middle{
  height:665px;
  width:100%;
  padding: 5%;
  background-color: LightGray;
}
</style>

</head>

<body>
<div class="container"> 
<!--header............................-->
    <header class="header">
          <h1> <strong>Gental Code</strong></h1>
      </header><!--row end div-->


<!--body............................-->
<div class="middle">
    
    <div class="row">


        <div class="col-sm-4">
                <h3> Update Form Data  </h3>

       <?php

            If(isset($_GET['id'])){

               $id = $_GET['id'];

               include_once 'db_connection.php';
               $conn=connection();

               $sql = "SELECT * FROM users_details WHERE ID='$id'";
               $result = $conn->query($sql);
             
               foreach($result as $value){

          ?>
                      <form action="action.php" method="POST">
                             <div class="form-group">
                                   <label for="First name">First name:</label>
                                   <input type="text" class="form-control" name ="first_name" value="<?php echo $value['FIRST_NAME'];?>">
                               </div>
 
                               <div class="form-group">
                                   <label for="Last name">Last name:</label>
                                   <input type="text" class="form-control" name="last_name" value="<?php echo $value['LAST_NAME'];?>">
                               </div>
 
                               <div class="form-group">
                                   <label for="email">Email address:</label>
                                   <input type="email" class="form-control" name = "email" value="<?php echo $value['EMAIL'];?>">
                                   <input hidden type="text" class="form-control" name ="id" value= "<?php echo $value['ID'];?>">
                               </div>
                               <button type="submit" class="btn btn-primary" name="update">Update</button>
                           </form>

                        
                        <?php
               }
              }else{
                header('location:index.php');
              }
                        ?>

                        
          </div><!--col-sm-4 end div-->

             









        <?php
             
             if (isset($_SESSION['msg'])){
                  echo $_SESSION['msg'] ;
                  unset($_SESSION['msg']) ;

             }
             
             ?>

        



     
               
    </div><!--row end div-->

</div><!--middle end div-->











<!--footer............................-->
  <footer class="footer">
       <h1> <strong>Gental Code</strong></h1>
   </footer><!--footer end div-->





        </div><!--container end div-->
</body>
</html> 