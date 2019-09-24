<?php
include_once("config.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    
<a href="add.html">Add new Data<br><br></a>

<table width='80%' border=0>

<tr bgcolor="#ccc">
    <td>Firstname</td>
    <td>Lastname</td>
    <td>Gender</td>
    <td>Department</td>
    <td>Date Employed</td>
    <td>Salary</td>
    <td>Update</td>
</tr>

<?php 
$i= 0;
$result = $dbConn->query("SELECT * FROM employees");

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id             = $row['id'];
    $efirstname     = $row['efirstname'];
    $elastname      = $row['elastname'];
    $egender        = $row['egender'];
    $edepartment    = $row['edepartment'];
    $edateEmployed  = $row['edateEmployed'];
    $eSalary        = $row['eSalary'];
?>

        <tr>
            <td><?php echo $efirstname ?></td>
            <td><?php echo $elastname ?></td>
            <td><?php echo $egender?></td>
            <td><?php echo $edepartment ?></td>
            <td><?php echo $edateEmployed ?></td>
            <td><?php echo $eSalary ?></td>
            <td>
                <a href="edit.php?id=<?php echo $id ?>">Edit</a>
                <a href="delete.php?delete_id=<?php echo $id ?>">delete</a>
        </td>
         
        </tr>

    <?php } ?>
</table>

</body>
</html>                                               