<?php 
require '../configuration/config.php';

session_start();

if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "root"){ 


?>
<?php 
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];

    $sql = "DELETE FROM pastes WHERE ID = '".$delete."' ";
    if(!mysqli_query($conn, $sql)){
        echo '<h1>There was a problem in the database!</h1>';
    }else{
        header("Location: pastes");
        exit;
    }
}
?>
<html>
    <head>
        <title>Paste</title>
        <link rel="stylesheet" href="assets/pastes.css" type="text/css">
        <link rel="stylesheet" href="assets/custom-scrollbar.css" type="text/css">
        <link rel="stylesheet" href="assets/header.css" type="text/css">

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

            $sql = "SELECT * FROM pastes ORDER BY id DESC";

            $result = mysqli_query($conn, $sql);

            if(isset($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="posts-post">
                    <div class="published-post">
                        <p class="post-id"><?php echo $row["id"]; ?></p>
                        <p class="post-name"><?php echo $row["paste_name"]; ?></p>
                        <a class="post-view" href="paste.php?id=<?php echo $row["id"]; ?>">View</a>
                        <a class="post-delete" href="pastes.php?delete=<?php echo $row["id"]; ?>">X</a>
                    </div>
                </div>
            <?php
                }
            }else{ 
                echo '<h1 class="nopaste">No pastes have been made :(</h1>'; 
            }
            ?>
        </form>
    </body>
</html>

<?php 
}else{
    header("Location:index");
}
?>