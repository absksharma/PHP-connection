<?php
// $response=array();

$name=$_POST["name"];
$id=$_POST["id"];

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
$sql = "UPDATE `record` SET `name`='$name' WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script>alert('Your Name: $name updated at ID: $id');</script>";

//     $response["success"]=1;
//     $response["message"]="Data deleted";
//     echo json_encode($response);
}
else
{
    echo "<script>alert('Could not Update data: ');</script>";
//     $response["success"]=0;
//     $response["message"]="Could not delete data: ";
//     echo json_encode($response);
}

mysqli_close($conn);
?>