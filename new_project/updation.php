<?php

$link = mysqli_connect("localhost","root","","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "select * from items";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_num_rows($result);

if(isset($_POST['name']) )
{
    $name = $_POST['name'];
    foreach($name as $n)
    {
        echo $count;
    $query1 = "UPDATE items SET name='$n'";
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    }
}

mysqli_close($link);
?>

