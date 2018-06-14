<?php
$link = mysqli_connect("localhost","root","root","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



    $query = "INSERT INTO admin(id,name,username,password)values(2,'demo','demo','demo')";
    if(mysqli_query($link, $query)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


mysqli_close($link);
?>
