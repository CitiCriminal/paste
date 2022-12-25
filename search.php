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
        <link rel="stylesheet" href="assets/search.css" type="text/css">
        <link rel="stylesheet" href="assets/custom-scrollbar.css" type="text/css">
        <link rel="stylesheet" href="assets/header.css" type="text/css">

    </head>
    <body>
        <div class="header">
            <img src="logo.png" class="logo" alt="">
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
            <img src="ad.png" alt="" class="ad-img">
            <img src="ad.png" alt="" class="ad-img">
        </div>
        <h1 class="recent">Search a paste by name!</h1>
        <div>
            <form method="POST">
                <?php
                if(isset($_POST["search-button"])){
                    $search = mysqli_real_escape_string($conn, $_POST['search-title']);
                    $sql = "SELECT * FROM pastes WHERE paste_name LIKE '". $search . "'";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){ ?>
                            <div class="published-post">
                                <p class="post-name"><?php echo $row["paste_name"];?></p>
                                <a class="post-view" href="paste.php?id=<?php echo $row["id"]; ?>">View</a>
                            </div>
                        <?php 
                        }
                    }else{
                        echo '<p class="error">Couldnt find the paste!</p>';
                    }
                }
                ?>
                <div class="search-post">
                    <input type="text" class="search-title" name="search-title" placeholder="search..">
                    <br>
                    <input type="submit" name="search-button" class="search-title" value="Search">
                </div>
                
            </form>
        </div>

    </body>
</html>
<?php 
    }
}
?>