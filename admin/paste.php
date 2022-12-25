<?php 
require '../configuration/config.php';

session_start();

if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "root"){ 
?>

<html>
    <head>
        <title>Paste</title>
        <link rel="stylesheet" href="assets/style.css" type="text/css">
        <link rel="stylesheet" href="assets/custom-scrollbar.css" type="text/css">
        <link rel="stylesheet" href="assets/header.css" type="text/css">

    </head>
    <body>
        <div class="header">
            <?php 
            $sql = "SELECT logo FROM settings";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){ 
                while($logo = mysqli_fetch_assoc($result)){?>
                    <img src="<?php echo $logo['logo']; ?>" class="logo" alt="">
                <?php
                }
            }
            ?>
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
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $sql = "SELECT * FROM pastes WHERE id = " . $_GET['id'];
            $result = mysqli_query($conn, $sql);

            if(isset($result) > 0){
                while($showpaste = mysqli_fetch_assoc($result)){ ?>
            <div class="panel">
                <p class="site-name"></p>
                <input type="text" name="title-paste" readonly value="<?php echo $showpaste['paste_name']; ?>" class="panel-input">
                <div class="textarea-div">
                    <textarea name="text-paste" readonly id="text" cols="30" rows="10"><?php echo $showpaste['paste_name']; ?></textarea>
                </div>
            </div>
        <?php
        }
    }
}else{
    Header("Location: pastes");
}
        ?>
        </form>
    </body>
</html>

<?php 
}
?>