<?php
$link = mysqli_connect("localhost","root","","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "select * from items";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

echo "
<form action='update_list.php' method='post'>
<center>
<table border=3 cellpading=20>
<h1>ITEM LIST</h1>
<tr>
<TH>ITEM-ID</TH>
<TH>ITEM-NAME</TH>
<TH>ITEM-QUANTITY</TH>
<TH>AVAILABLE-ITEMS</TH>
<th>PRICE/ITEM</th>
<th>UPDATE</th>
<th>DELETE</th>
<th>CheckBox</th>
</tr>";
$i=0;

while($row = mysqli_fetch_array($result))
{

    echo  '
    
    <tr>
    <th><input type="number" placeholder='.$row['id'].' name="id'.$i.'" value='.$row['id'].' readonly></th>
    <th><input type="text" placeholder='.$row['name'].' name="name'.$i.'" value='.$row['name'].'></th>
    <th><input type="number" placeholder='.$row['quantity'].' name="quantity'.$i.'" value='.$row['quantity'].'></th>
    <th><input type="number" placeholder='.$row['available'].' name="available'.$i.'" value='.$row['available'].'></th>
    <th><input type="number" placeholder='.$row['Price'].' name="price'.$i.'" value='.$row['Price'].'></th>
    <th><input type="submit" value="Update" name="address'.$i.'"/>
    <th><input type="submit" value="Delete" name="delete'.$i.'"/>
    <th><input type="checkbox"  name="check'.$i.'"/>
    </tr>
    ';
    if(isset($_POST['delete'.$i.'']))
    {
        if(isset($_POST['check'.$i.'']))
        {
            $idd=$_POST['id'.$i.''];
            $n=$_POST['name'.$i.''];
            $query1 = "DELETE from items where id='$idd'";
            $result1 = mysqli_query($link, $query1) ;

            $query2 = "DELETE from bill where name='$n'";
            $result2 = mysqli_query($link, $query2) ;

            if(!query1)
            {
                echo "Updation failed";
            }
            else
            {
                header("location: update_list.php");

            }
        }

    }

    if(isset($_POST['address'.$i.'']))
    {
        if(isset($_POST['check'.$i.'']))
        {
        $idd=$_POST['id'.$i.''];
        $n=$_POST['name'.$i.''];
        $q=$_POST['quantity'.$i.''];
        $a=$_POST['available'.$i.''];
        $p=$_POST['price'.$i.''];
        if($n=='')
        {
        $n="None";
        }
        $query1 = "UPDATE items SET name='$n', quantity='$q', available='$a', Price='$p' where id='$idd'";
        $result1 = mysqli_query($link, $query1) ;

        $query2 = "UPDATE bill SET name='$n', quantity='$q', available='$a', Price='$p' where name='$n'";
        $result2 = mysqli_query($link, $query2) ;

        if(!query1)
        {
            echo "Updation failed";
        }
        else
        {
            header("location: update_list.php");

        }

        }
        else
        {
            echo "please check the checkbox";
        }

    }


    $i=$i+1;
}

echo "</table>";

echo '
<br>
<br>
<br>
<table border=2>
<h1>ADD ITEM</h1>
<tr>
<th><input type="text" placeholder="Name" name="name"  /></th>
<th><input type="number" placeholder="Quantity" name="quantity" /></th>
<th><input type="number" placeholder="Available" name="available"/></th>
<th><input type="number" placeholder="Price" name="price"/></th>
</tr>
<tr>
<th colspan=4>
<input type="submit" name="add" value="ADD"/>
</th>
</tr>
</table>
<br>
</form>


</center>
';

if(isset($_POST['add']))
{
    $n=$_POST['name'];
    $q=$_POST['quantity'];
    $a=$_POST['available'];
    $p=$_POST['price'];
    if($n=='')
        {
        $n="None";
        }
    $query = "INSERT INTO items(name,quantity,available,Price)values('$n','$q','$a','$p')";
        
    $query1 = "INSERT INTO bill(name,quantity,available,Price)values('$n','$q','$a','$p')";
    mysqli_query($link, $query1);

    if(mysqli_query($link, $query)){
        header("location:update_list.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

echo '
<center>
<br>
<a href="list.php"><button>Check List</button></a>
<br>
</center>
';


mysqli_close($link);


?>

