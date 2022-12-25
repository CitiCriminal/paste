<?php 
session_start();

require '../configuration/config.php';

if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "root"){ 

?>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="assets/home.css">
        <link rel="stylesheet" href="assets/header.css">
    </head>
    <body>
        <div class="header">
            <div class="header-btn">
                <a href="index">Settings</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="pastes">Pastes</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="ad">Ads</a>
            </div>
        </div>
        <form method="POST">
            <?php 
            //Site Name Script
            if(isset($_POST['name-submit'])){
                $sitename = mysqli_real_escape_string($conn, $_POST['sitename']);

                if($sitename == ""){
                    echo "Please give the site a name!";
                }else{
                    $sql = "UPDATE settings SET sitename='".$sitename."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Site Name:</p>
                <input type="text" name="sitename" class="change-input" placeholder="site name..">
                <br>
                <br>
                <input type="submit" name="name-submit" class="input-button" value="Change Name">
            </div>

            <?php 
            //Site Url Script
            if(isset($_POST['url-submit'])){
                $siteurl = mysqli_real_escape_string($conn, $_POST['siteurl']);

                if($siteurl == ""){
                    echo '<h1>Please give the site a Url!</h1>';
                }else{
                    $sql = "UPDATE settings SET `url`='".$siteurl."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Site Url:</p>
                <input type="text" name="siteurl" class="change-input" placeholder="site url..">
                <br>
                <br>
                <input type="submit" name="url-submit" class="input-button" value="Change Url">
            </div>

            <?php 
            //Site Logo Script
            if(isset($_POST['logo-submit'])){
                $sitelogo = mysqli_real_escape_string($conn, $_POST['sitelogo']);

                if($sitelogo == ""){
                    echo '<h1>Please give the site a Logo!</h1>';
                }else{
                    $sql = "UPDATE settings SET `logo`='".$sitelogo."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Site Logo:</p>
                <input type="text" name="sitelogo" class="change-input" placeholder="site logo url..">
                <br>
                <br>
                <input type="submit" name="logo-submit" class="input-button" value="Change Logo">
            </div>

            <?php 
            //Site Message Script
            if(isset($_POST['message-submit'])){
                $message = mysqli_real_escape_string($conn, $_POST['message']);

                if($message == ""){
                    echo '<h1>Please give the site a Message!</h1>';
                }else{
                    $sql = "UPDATE settings SET `message`='".$message."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Message of the day:</p>
                <input type="text" name="message" class="change-input" placeholder="message of the day..">
                <br>
                <br>
                <input type="submit" name="message-submit" class="input-button" value="Set Message">
            </div>

            <?php 
            //Site Discord Script
            if(isset($_POST['discord-submit'])){
                $discord = mysqli_real_escape_string($conn, $_POST['discord']);

                if($discord == ""){
                    echo '<h1>Please give the site a Discord Link!</h1>';
                }else{
                    $sql = "UPDATE settings SET `discord`='".$discord."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Discord URL:</p>
                <input type="text" name="discord" class="change-input" placeholder="Discord URL..">
                <br>
                <br>
                <input type="submit" name="discord-submit" class="input-button" value="Change Discord URL">
            </div>

            <?php 
            //Site Telegram Script
            if(isset($_POST['telegram-submit'])){
                $telegram = mysqli_real_escape_string($conn, $_POST['telegram']);

                if($telegram == ""){
                    echo '<h1>Please give the site a name!</h1>';
                }else{
                    $sql = "UPDATE settings SET `telegram`='".$telegram."' WHERE id=1";
                    mysqli_query($conn, $sql);
                    header("Location: home");
                    exit;

                    if(!mysqli_query($conn, $sql)){ 
                        echo '<h1>Something went wrong!</h1>';
                    }
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Telegram URL:</p>
                <input type="text" name="telegram" class="change-input" placeholder="Telegram URL..">
                <br>
                <br>
                <input type="submit" name="telegram-submit" class="input-button" value="Change Telegram URL">
            </div>

            <?php 
            if(isset($_POST['maintenance-submit'])){
                $maintenance = $_POST['maintenance'];

                if($maintenance === '0'){
                    $sql = "UPDATE settings SET `maintenance`='".$maintenance."' WHERE id=1";

                    $result = mysqli_query($conn, $sql);

                    header("Location: home");

                    exit;
                }else{
                    $sql = "UPDATE settings SET `maintenance`='".$maintenance."' WHERE id=1";

                    $result = mysqli_query($conn, $sql);

                    header("Location: home");

                    exit;
                }
            }
            ?>
            <div class="small-panel-top">
                <p>Maintenance:</p>
                <select name="maintenance" class="maintenance" id="maintenance">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <br>
                <br>
                <input type="submit" name="maintenance-submit" class="input-button" value="Set Maintenance">
            </div>
        </form>
    </body>
</html>

<?php 
}else{
    header("Location: index");
}
?>