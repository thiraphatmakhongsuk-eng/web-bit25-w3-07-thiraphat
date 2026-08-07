<?php
      // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    $id = $_GET['id'];

    include 'connect.php';

    $sql = "DELETE FROM games WHERE game_id = '$id' ";

    $result = mysqli_query($con, $sql);

    if(!$result){
        echo "error";
    }else{
        header("location: ../manage_game.php");
        exit;
    }
?>