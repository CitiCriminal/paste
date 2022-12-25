<?php 
session_start();

?>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        
        <form method="POST">
            <div class="panel">
                <h1>Admin Panel</h1>
                <?php 

                $error = '<h2>Something went wrong!</h2>';

                    if(isset($_POST['submit'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        if($username == "root" && $password == "root"){
                            $_SESSION["admin"] = "root";
                            header("Location: home");
                            
                        }else{
                            echo $error;
                        }
                    }
                ?>
                <input type="text" name="username" class="login-input" placeholder="username">
                <input type="password" name="password" class="login-input" placeholder="password">
                <input type="submit" value="login" name="submit" class="login-input">
            </div>
        </form>
    </body>
</html>
