<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <a href=index.html>Home page</a>
        <h1>Login</h1>
        <div>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required/>
                <br/>
                <input type="password" name="password" placeholder="Password" required/>
                <br/>
                <input type="submit" name = "login" value="Login">
            </form>
        </div>
        <div>
        <?php
         if (isset($_POST["login"])){
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

            if (! $conn ){
                die('Could not connect: ' . mysqli_error($conn));
            }
            else
            $username = $_POST["username"];
            $password = $_POST["password"];
            mysqli_select_db($conn, "vulnwebapp");
            $query = "SELECT password FROM users WHERE username = '$username'";
            #echo $query . "</br>";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo "result: " . $row["password"] . "</br>";
            if ($row["password"] != $password){
                echo "Login failed. Please try again</br>";
            }
            else{
                header("Location:homepage.php");
            }
            mysqli_close($conn);
         }
        ?>
        </div>
    </body>
</html>