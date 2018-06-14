

<html>
<head>


</head>
<body>
<center>
    <form action="" method="post">
    <table>
        <tr>
            <th>
                Product Name :
            </th>
            <th>
                <input type="text" name="name" required/>
            </th>
        </tr>
        <tr>
            <th>
                Product Quantity :
            </th>
            <th>
                <input type="number" name="quantity" required/>
            </th>
        </tr>
        <tr>
            <th>
                Available Quantity:
            </th>
            <th>
                <input type="number" name="available" required/>
            </th>
        </tr>
        <tr >
            <th>
                <a href="add_item.php"><button>Add_item</button></a>
            </th>
            <th>
                <a href="list.php">Check_item_list</a>
            </th>
        </tr>
    </table>

    </center>
    </form>




</body>
</html>



<?php
$link = mysqli_connect("localhost","root","","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['name']) and isset($_POST['quantity']) )
{
    $n=$_POST['name'];
    $q=$_POST['quantity'];
    $a=$_POST['available'];

    $query = "INSERT INTO items(name,quantity,available)values('$n','$q','$a')";
   
    if(mysqli_query($link, $query)){
        echo "Product added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>
