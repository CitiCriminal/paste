<?php 
require 'configuration/config.php';

//Maintenance

$sql = "SELECT maintenance FROM settings";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
    $maintenance_mode = $row['maintenance'];

    if($maintenance_mode == "1"){
        header("Location: maintenance/index");
        exit;
    }else{

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
                <a href="index">Paste</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="new">Recent Pastes</a>
                <font class="line" style="opacity: 0.4; font-size:30px;"> |</font>
                <a href="search">Search</a>
            </div>
            <div class="socials">
                <?php 
                $sql = "SELECT discord FROM settings";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($discord = mysqli_fetch_assoc($result)){ ?>

                    <a class="discord" href="https://<?php echo $discord['discord']?>">
                    <img class="discord-img" src="img/discord.png">
                </a>
                <?php
                    }
                }
                ?>
                <?php 
                    $sql = "SELECT telegram FROM settings";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($telegram = mysqli_fetch_assoc($result)){ ?>
                <a class="discord" href="https://<?php echo $telegram['telegram']; ?>">
                    <img class="telegram-img" src="img/telegram.png">
                </a>
                <?php
                    }
                }else{
                }
                ?>
            </div>
        </div>
        <div class="ad">
            <?php 
            $sql = "SELECT * FROM ad";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){?>
                <a href="<?php echo $row["link"]; ?>">
                    <img src="<?php echo $row["img"]?>" alt="" class="ad-img">
                </a>
            <?php
            }
            ?>
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
    Header("Location: index");
}
        ?>
        </form>
    </body>
</html>

<?php 
    }
}
?>