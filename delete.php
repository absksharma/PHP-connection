<?php
// $response=array();

$name=$_POST["name"];

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
$sql = "DELETE FROM record WHERE name='$name'";
$result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script>alert(' $name Data deleted ');</script>";

//     $response["success"]=1;
//     $response["message"]="Data deleted";
//     echo json_encode($response);
}
else
{
    echo "<script>alert('Could not delete data: ');</script>";
//     $response["success"]=0;
//     $response["message"]="Could not delete data: ";
//     echo json_encode($response);
}

mysqli_close($conn);
?>