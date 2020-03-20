<!DOCTYPE html>
<head>
    <title>Register</title>
    <a href=index.html>Home page</a>
    <h1>Register an account</h1>
</head>
<body>
    <div>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required/>
            <br/>
            <input type="password" name="password" placeholder="Password" required/>
            <br/>
            <input type="text" name="firstname" placeholder="First Name" required/>
            <br/>
            <input type="text" name="lastname" placeholder="Last Name" required/>
            <br/>
            <input type="submit" name="register" value="Register">
        </form>
    </div>
    <div>
    <?php
    if (isset($_POST["register"])){
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

        if (! $conn ){
            die('Could not connect: ' . mysqli_error($conn));
        }
        else
        echo 'Connected successfully </br>';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        mysqli_select_db($conn, "vulnwebapp");
        $query = "INSERT INTO users (username, password, firstname, lastname) VALUES('$username', '$password', '$firstname', '$lastname')";
        echo $query . "</br>";
        $returnval = mysqli_multi_query($conn, $query);
        if (! $returnval){
            echo "Error registering: " . mysqli_error($conn) . "</br>";
        }
        else{
            echo "User successfully registered.</br>";
            include "login.php";
        }

    }
    ?>
    </div>
</body>
</html>