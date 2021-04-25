<?php
// $response=array();

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

$sql = "INSERT INTO `record`(id,name,marks) VALUES ('$id','$name','$marks')";
$result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script>alert('New Record Added');</script>";
//     $response["success"]=1;
//     $response["message"]="result saved";
//     echo json_encode($response);
}
else
{
    echo "<script>alert('An error occurred');</script>";
//     $response["success"]=0;
//     $response["message"]="An error occurred";
//     echo json_encode($response);
}

// TO show data in format ID NAME MARKS 
// $sql = "SELECT * FROM record";
// $result = mysqli_query($conn, $sql);

// while($data = $result->fetch_assoc())
// {
//     echo "</br>".$data['id']."- ID   ".$data["name"]."- NAME   ".$data["marks"]."- MARKS";
// }

mysqli_close($conn);
?>