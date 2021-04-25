<?php
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
// SQL query to select data from database
$sql = "SELECT * FROM record ORDER BY id ASC ";
$result = mysqli_query($conn, $sql);
mysqli_close($conn); 
?>
<!-- HTML code to display data in tabular format -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Managing Data Bases</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>


<h3>INSERT</h3>
    <form action="save.php" method="GET"  >
        ID  <input type="text" name="id" id="id" required /><br /><br />
        NAME  <input type="text" name="name" id="name" required/><br /><br />
        MARKS  <input type="text" name="marks" id="marks" required/><br /><br />
        <input type="submit" value="SAVE DATA" />
    </form>
<h3>DELETE</h3>
    <form  action="delete.php" method="GET >
        NAME  <input type="text" name="name" name="name" placeholder=" where name is :"><br /><br />
        <input type="submit" value="DELETE DATA"/>
    </form> 
    <h3>UPDATE data</h3>
    <form  action="update.php" method="GET" >
        NAME  <input type="text" name="name" name="name" placeholder=" where name is :" /><br /><br />
        <input type="submit" value="DELETE DATA"/>
    </form> 
<h2>All saved data</h2>
    <section>
        <!-- TABLE CONSTRUCTION-->
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
    </section>
</body>
</html>