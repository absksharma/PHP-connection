<?php
$response=array();

$id=$_GET["id"];
$name=$_GET["name"];
$marks=$_GET["marks"];

$database='record';
$server='localhost';
$user='root';
$pwd='';

// Create Connection

$conn = mysqli_connect($server,$user,$pwd,$database);

//Check Connection

if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
echo "Connected successfully";

$sql = "INSERT INTO `record`(id,name,marks) VALUES ('$id','$name','$marks')";


$result = mysqli_query($conn, $sql);

if($result)
{
    $response["success"]=1;
    $response["message"]="result saved";

    echo json_encode($response);
}
else
{
    $response["success"]=0;
    $response["message"]="An error occurred";
    
    echo json_encode($response);
}
mysqli_close($conn);
?>