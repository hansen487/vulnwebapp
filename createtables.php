<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST["createtables"])){
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

        if (!$conn){
            die('Could not connect: ' . mysqli_error($conn));
        }
        else
        echo 'Connected successfully </br>';
        create_database($conn);
        create_tables($conn);
        mysqli_close($conn);
    }

    function create_database($conn){
        $query = 'CREATE Database vulnwebapp';
        $returnval = mysqli_query($conn, $query);

        if (! $returnval){
            echo 'Failed creating database: ' . mysqli_error($conn) . "</br>";
        }
        else{
            echo "Database vulnwebapp created succesfully </br>";
        }
    }

    function create_tables($conn){
        $query = 'CREATE TABLE users(username varchar(64), password varchar(64), firstname varchar(64), lastname varchar(64), PRIMARY KEY (username))';
        mysqli_select_db($conn, "vulnwebapp");
        $returnval = mysqli_query($conn, $query);
        if (! $returnval){
            echo 'Failed creating tables: ' . mysqli_error($conn) . "</br>";
        }
        else{
            echo "Users table created succesfully </br>";
        }
        $query = 'INSERT INTO users (username, password, firstname, lastname) VALUES ("secretuser", "123456", "Secret", "User")';
        $returnval = mysqli_query($conn, $query);
        if (! $returnval){
            echo 'Failed inserting data: ' . mysqli_error($conn) . "</br>";
        }
        else{
            echo "Data inserted succesfully </br>";
        }
    }
    echo "<a href='index.html'>Home Page</a>";
?>
</body>
</html>