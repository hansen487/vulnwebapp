<!DOCTYPE html>
<html>
    <header>
        <title>Home Page</title>
        <h1>Home Page</h1>
    </header>
    <body>
        <div>
        <form method="GET" action="" name="search">
            <p>Search for other users: <input type="text" name="searchusers"></p>
            <input type="submit" name="submit" value="Search">
        </form>
     </div>
     <div>
     <?php
            if(isset($_GET["searchusers"])){
                $username = $_GET["searchusers"];
                $conn = mysqli_connect('localhost', 'root', '');
                $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                if (! $result){
                    echo "Cannot find user " . $_GET["searchusers"];
                }
                else{
                    echo "Following user exists: " . $_GET["searchusers"];
                }
                #echo("Your name is ". $_GET["searchusers"]);
            }
                
    ?>
    </div>
    </body>
</html>