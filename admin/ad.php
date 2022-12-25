<?php 
session_start();

include('../configuration/config.php');

if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "root"){ 

?>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="assets/ad.css">
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
        <div class="news">
            <form method="POST">
                <?php 
                    if(isset($_POST['adonesubmit'])){
                        $image = $_POST['adoneimg'];
                        $link = $_POST['adonesite'];
                        $sql = "UPDATE ad SET img='".$image."', link='".$link."' WHERE id = 1";
                        $result = mysqli_query($conn, $sql);
                    }
                ?>
                <p>Ads #1:</p>
                <input type="text" name="adoneimg" class="ad-input" placeholder="Ad Banner/Image Link">
                <br>
                <input type="text" name="adonesite" class="ad-input" placeholder="Ad Website Link">
                <br>
                <input type="submit" name="adonesubmit" class="ad-input" placeholder="Post AD">
                <br>
            </form>
        </div>
        <div class="news">
            <form method="POST">
                <?php 
                    if(isset($_POST['adtwosubmit'])){
                        $image = $_POST['adtwoimg'];
                        $link = $_POST['adtwosite'];
                        $sql = "UPDATE ad SET img='".$image."', link='".$link."' WHERE id = 2";
                        $result = mysqli_query($conn, $sql);
                    }
                ?>
                <p>Ads #2:</p>
                <input type="text"name="adtwoimg" class="ad-input" placeholder="Ad Banner Link">
                <br>
                <input type="text"name="adtwosite" class="ad-input" placeholder="Ad Website Link">
                <br>
                <input type="submit" name="adtwosubmit" class="ad-input" placeholder="Post AD">
                <br>
            </form>
        </div>
    </body>
</html>

<?php 
}
?>