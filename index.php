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
                <h3> Insert Form Data Into Database </h3>
                            <form action="insert_data.php" method="POST">
                            <div class="form-group">
                                  <label for="First name">First name:</label>
                                  <input type="text" class="form-control" name ="first_name">
                              </div>

                              <div class="form-group">
                                  <label for="Last name">Last name:</label>
                                  <input type="text" class="form-control" name="last_name">
                              </div>

                              <div class="form-group">
                                  <label for="email">Email address:</label>
                                  <input type="email" class="form-control" name = "email" >
                              </div>

                              <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="password">
                             </div>
                      
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form> 

                        
          </div><!--col-sm-4 end div-->

             







        <div class="col-sm-8">
                 <h3>Show Table Data from Database</h3>

              <table class="table table-dark table-hover">
          
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Password</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>

              <?php
              include_once 'db_connection.php';
              $conn=connection();
              
              $sql= "SELECT * FROM users_details";
              $result = $conn->query($sql);

              foreach ($result as $value){
              
              ?>


                  <tbody>

                    <tr>
                      <td><?php echo $value['FIRST_NAME'];?></td>
                      <td><?php echo $value['LAST_NAME'];?></td>
                      <td><?php echo $value['PASSWORD'];?></td>
                      <td><?php echo $value['EMAIL'];?></td>
                      <td><a href="update_form.php?id=<?php echo $value['ID'];?>"> <span class="btn btn-warning"> Edit </span> </a></td>
                      <td><a href="action.php?action=remove&id=<?php echo  $value['ID']; ?>"> <span class="btn btn-danger"> Remove </span> </a></td>
                    </tr>
                   
                  </tbody>


              <?php
             }?>


                </table>


        </div><!--col-sm-8 end div-->



          <?php
           if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            
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