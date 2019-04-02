<?PHP
$host='localhost';
$user='root';
$pass='';


//to connect server............
$con = new mysqli($host,$user,$pass);

//To create Database name Shop.....................
$sql = 'CREATE DATABASE SHOP';
if($con->query($sql)){
    echo "database create succesfully";
}
else {
    echo "database does not create succesfully";
}

//To include db_connection.php file..............................
include_once 'db_connection.php';
$conn = connection();//to called function name connection.........


//to create Table USERS_DETAILS into shop database................
$sql = 'CREATE TABLE USERS_DETAILS(
    ID INT(50) PRIMARY KEY AUTO_INCREMENT,
    FIRST_NAME VARCHAR(15),
    LAST_NAME VARCHAR(15),
    PASSWORD VARCHAR(30),
    EMAIL VARCHAR(30)
)';
if ($conn->query($sql)){
    echo "Table create succesfully";
}else{
    echo "Table does not create succesfully";
}




?>