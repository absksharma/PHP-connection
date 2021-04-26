<?php
$response=array();

$id=$_POST["id"];
$name=["name"];
$marks=["marks"];

$database='record';
$server='localhost';
$user='root';
$pwd='';

$conn = mysqli_connect($server,$user,$pwd,$database);

if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
$sql = "SELECT * FROM record WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result)
{
    // <!--TO PRINT DATA IN TEXT FORMAT *****-->
    // while($data = $result->fetch_assoc())
    // {
    //     echo "</br>".$data["id"]."- ID   ".$data["name"]."- NAME   ".$data["marks"]."- MARKS";
    // }

    // //******* PRINT DATA IN JSON *********
    // while ( $row = $result->fetch_assoc())  {
    //     $response[]=$row;
    // }
    // echo json_encode($response);

    $response["success"]=1;
    $response["message"]="result Found"; 
}
else
{
    $response["success"]=0;
    $response["message"]="An error occurred";
}
mysqli_close($conn);
?>

<!-- DEFAULT TO PRINT DATA IN TABLE -->
<!DOCTYPE html>
<html lang="en">
<body>
<style>
.centered {
  position: absolute;
  top: 47%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        h2 {
            text-align: center;
            color: #006600;
            font-size: x-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
</style>

<table>
            <tr>
                <th>ID</th>
                <th>NAMES</th>
                <th>MARKS</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['marks'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
            </body>
</html>