<?php 
require '../configuration/config.php';

$sql = "SELECT maintenance FROM settings";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){ 
    $row = mysqli_fetch_assoc($result);
    $maintenance_mode = $row['maintenance'];

    if($maintenance_mode == "0"){
        header("Location: ../");
        exit;
    }else{
?>

<html>
    <head>
        <title>Maintenance!</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="image">
            <img src="../undraw/undraw_under_construction_-46-pa.svg" alt="">
        </div>
        <h1>Sorry but the site is on maintenance!</h1>
        <h2>Were working on something.</h2>
    </body>
</html>
<?php
    }
}
?>