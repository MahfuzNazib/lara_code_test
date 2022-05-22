<?php

$placeName = ['khulna', 'dhaka', 'cumillah', 'barisal', 'jessore', 'kushtia', 'kazipur'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        foreach($placeName as $name) {
            echo $name. " ";
        }
    ?> <br>
    <form method="post">
        <h5>Enter first character</h5>
        <input type="text" name="character">
        <br>
        <h5>How many characters</h5>
        <input type="number" name="number">
        <br>
        <button>
            Submit
        </button>
    </form>

    <?php
        $outputArray = [];

        if((@$_POST['character'] != null) && $_POST['number'] != null) {
            $character = $_POST['character'];
            $number = $_POST['number'];

            foreach($placeName as $name) {
                if(strlen($name) == $number && substr($name,0,1) == $character){
                    array_push($outputArray,$name);
                }
            }
            echo implode(",", $outputArray);
            
        }
        
        if(@$_POST['character'] != null && $_POST['number'] == null) {
            foreach($placeName as $name) {
                if(substr($name,0,1) == $_POST['character']) {
                    array_push($outputArray, $name);
                }
            }
            echo implode(",", $outputArray);


        }
        unset($outputArray);

        
    ?>
</body>

</html>