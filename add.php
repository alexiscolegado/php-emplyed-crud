<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Data</title>
</head>
<body>
    <?php 
    
    include_once("config.php");

        if(isset($_POST['submit'])) {
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
            }else {

                $sql = "INSERT INTO employees(efirstname , elastname, egender ,edepartment ,edateEmployed ,eSalary) VALUES (:efirstname, :elastname , :egender, :edepartment ,:edateEmployed ,:eSalary)";
                $query = $dbConn->prepare($sql);
                $query->bindparam(':efirstname',$efirstname);
                $query->bindparam(':elastname',$elastname);
                $query->bindparam(':egender',$egender);
                $query->bindparam(':edepartment',$edepartment);
                $query->bindparam(':edateEmployed',$edateEmployed);
                $query->bindparam(':eSalary',$eSalary);
                $query->execute();
    
                echo "<font color='green'> Data added successf;ully.";
                echo "<br><a href='index.php'>View Result</a>";
            }
        } 
    
    
    ?>
</body>
</html>