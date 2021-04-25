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
    <title>SHOW DATABASE</title>

<style>

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 0px;
}

/* Control the left side */
.left {
  left: 0;
}

/* Control the right side */
.right {
  right: 0;
}

/* If you want the content centered horizontally and vertically */
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
</head>
  
<body>
<div class="split left">
<div class="centered">
<h2>-INSERT-</h2>
    <form action="save.php" method="GET" target="_self" >
        ID  <input type="text" name="id" id="id" required /><br /><br />
        NAME  <input type="text" name="name" id="name" required/><br /><br />
        MARKS  <input type="text" name="marks" id="marks" required/><br /><br />
        <input type="submit" value="Submit"   />
    </form>
    <br>
    <hr class="rounded">
<h2>-DELETE-</h2>
    <form  action="delete.php" method="GET">
        NAME  <input type="text" name="name" name="name" placeholder=" Where name is :" /><br /><br />
        <input type="submit" value="DELETE DATA"/>
    </form> 
    <br>
    <hr class="rounded">
<h2>-UPDATE NAME-</h2>
    <form  action="update.php" method="GET">
    NAME  <input type="text" name="name" name="name" placeholder=" New Name " required /><br /><br />
    User ID  <input type="text" name="id" id="id" placeholder="where ID is" required /><br /><br />
        <input type="submit" value="Update Name"/>
    </form> 
</body>
</div>
</div>

<div class="split right">
  <div class="centered">
  <section>
        <h1>Live User's DATA</h1>
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
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['marks'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
  </div>
</div>

</html>