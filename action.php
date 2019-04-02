<?php
if($_POST){
    Session_start();

    $id          = $_POST['id'];
    $first_name  = $_POST['first_name'];
    $last_name   = $_POST['last_name']; 
    $email       = $_POST['email'];

    include_once 'db_connection.php';
    $conn=connection();

    $sql = "UPDATE users_details SET FIRST_NAME='$first_name', LAST_NAME='$last_name', EMAIL='$email' WHERE ID='$id'";
    if($conn->query( $sql)){


        $_SESSION['msg'] =  "<strong class='text-success'> Updated Table Data Successfully </strong>";
        header('location:index.php');

    }else{
        $_SESSION['msg'] =  "<strong class='text-danger'> Failed to Updated Table Data </strong>";
        header('location:index.php');

    }
    
}
else if($_GET['action']){
    Session_start();

    $remove = $_GET['action'];
    $id = $_GET['id'];

    if ($remove == 'remove'){

    include_once 'db_connection.php';
    $conn=connection();

    $sql = "DELETE FROM  users_details WHERE ID='$id' ";
    if($conn->query($sql)){

        $_SESSION['msg'] =  "<strong class='text-success'> Remove Table Data Successfully </strong>";
        header('location:index.php');
    }else{

        $_SESSION['msg'] =  "<strong class='text-danger'> Invailed Data  </strong>";
        header('location:index.php');
    }
}
    

}else{
    header('location:index.php');
}



?>