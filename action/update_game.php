<?php
      // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    $game_id = $_POST["game_id"];
    $game_name = $_POST["game_name"];
    $game_price = $_POST["game_price"];
    $game_cover = $_POST["game_cover"];
    $type_id = $_POST["type_id"];

    include 'connect.php';

    $sql = "UPDATE `games` 
            SET 
            `game_name`='$game_name',
            `game_price`='$game_price',
            `game_cover`='$game_cover',
            `type_id`='$type_id'
            WHERE game_id = '$game_id'
            ";

    $result = mysqli_query($con, $sql);

    if(!$result){
        echo "error";
    }else{
        header("location: ../manage_game.php");
        exit;
    }
?>