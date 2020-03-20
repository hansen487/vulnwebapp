<!DOCTYPE html>
<html>
    <head>
        <title>Reset DB Tables</title>
        <a href=index.html>Home page</a>
        <h1>Reset DB Tables</h1>
    </head>
    <body>
        <div>
        <p>Click the button below to reset the table entries in the database</p>
        <form method="POST">
            <input type="submit" name="resettables" value="Reset Tables">
        </form>
        </div>
        <div>
        <?php
            if (isset($_POST["resettables"])){
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

                if (!$conn){
                    die('Could not connect: ' . mysqli_error($conn));
                }
                else
                echo 'Connected successfully </br>';
                delete_tables($conn);
                create_database($conn);
                create_tables($conn);
                mysqli_close($conn);
            }

            function delete_tables($conn){
                $query = 'DROP DATABASE vulnwebapp';
                $returnval = mysqli_query($conn, $query);
                if($returnval){
                    echo "<br>Database deleted succesfully.<br>";
                }
                else{
                    echo "Error: " . mysqli_error($conn);
                }
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
        ?>
        </div>
        
</html>
