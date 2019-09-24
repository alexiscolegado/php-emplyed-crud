<?php
include_once("config.php");

if(isset($_POST['update'])) {
    $id = $_POST['id'];

    $efirstname      = $_POST['efirstname'];
    $elastname       = $_POST['elastname'];
    $egender         = $_POST['egender'];
    $edepartment     = $_POST['edepartment'];
    $edateEmployed   = $_POST['edateEmployed'];
    $eSalary         = $_POST['eSalary'];

    if(empty($efirstname) || empty($elastname) || empty($egender) || empty($edepartment) || empty($edateEmployed) || empty($eSalary)) {

        if(empty($efirstname)) {
            echo "<font color='red'>Firstname field is empty.</font><br/>";
        }
        if(empty($elastname)) {
            echo "<font color='red'>Lastname field is empty.</font><br/>";
        }
        if(empty($egender)) {
            echo "<font color='red'>Gender field is empty.</font><br/>";
        }
        if(empty($edepartment)) {
            echo "<font color='red'>Department field is empty.</font><br/>";
        }
        if(empty($eSalary)) {
            echo "<font color='red'>Salary field is empty.</font><br/>";
        }

        echo "<br><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else {

        $sql = "UPDATE employees SET efirstname=:efirstname,elastname=:elastname,egender=:egender,edepartment=:edepartment,edateEmployed=:edateEmployed,eSalary=:eSalary WHERE id=:id";
        $query = $dbConn->prepare($sql);
    
        $query->bindparam(':id',$id);
        $query->bindparam(':efirstname',$efirstname);
        $query->bindparam(':elastname',$elastname);
        $query->bindparam(':egender',$egender);
        $query->bindparam(':edepartment',$edepartment);
        $query->bindparam(':edateEmployed',$edateEmployed);
        $query->bindparam(':eSalary',$eSalary);
        $query->execute();
    
        echo "<font color='green'> Data added successf;ully.";
        echo "<br><a href=''index.php>View Result</a>";
    
        header("Location: index.php");
    }
} 
?>

<?php 
$id = $_GET['id'];

$sql = "SELECT * FROM employees WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));


while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $efirstname      = $row['efirstname'];
    $elastname       = $row['elastname'];
    $egender         = $row['egender'];
    $edepartment     = $row['edepartment'];
    $edateEmployed   = $row['edateEmployed'];
    $eSalary         = $row['eSalary'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br><br>

    <form name="form1" method="post" action="edit.php">
        <table>
            <tr>
                <td>Firstname</td>
                <td><input type="text" name="efirstname" value="<?php echo $efirstname ?>"></td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td><input type="text" name="elastname" value="<?php echo $elastname ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="egender" value="<?php echo $egender ?>"></td>
            </tr>
            <tr>
                <td>Department</td>
                <td><input type="text" name="edepartment" value="<?php echo $edepartment ?>"></td>
            </tr>
            <tr>
                <td>Date Employed</td>
                <td><input type="text" name="edateEmployed" value="<?php echo $edateEmployed ?>"></td>
            </tr>
            <tr>
                <td>Salary</td>
                <td><input type="text" name="eSalary" value="<?php echo $eSalary ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>


    </form>
</body>
</html>
