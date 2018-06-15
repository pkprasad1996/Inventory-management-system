<?php
$link = mysqli_connect("localhost","root","","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "select * from bill";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

echo "
<form action='calculate.php' method='post'>
<center>
<table border=3 cellpading=20>
<h1>ITEM LIST</h1>
<tr>
<TH>ITEM-ID</TH>
<TH>ITEM-NAME</TH>
<TH>ITEM-QUANTITY</TH>
<TH>AVAILABLE-ITEMS</TH>
<th>PRICE/ITEM</th>
<th>Status </th>
<th>UPDATE</th>
<th>DELETE</th>
<th>CheckBox</th>
</tr>";
$i=0;

while($row = mysqli_fetch_array($result))
{

    if($row['s']==1)
    {
    echo  '
    <tr bgcolor="red">
    <th><input type="number" placeholder='.$row['bill_id'].' name="bill_id'.$i.'" value='.$row['bill_id'].' readonly></th>
    <th>'.$row['name'].'</th>
    <th><input type="number" placeholder='.$row['quantity'].' name="quantity'.$i.'" value='.$row['quantity'].'readonly></th>
    <th><input type="number" placeholder='.$row['available'].' name="available'.$i.'" value='.$row['available'].'readonly></th>
    <th><input type="number" placeholder='.$row['Price'].' name="price'.$i.'" value='.$row['Price'].'readonly></th>
    <th><input type="number" placeholder='.$row['s'].' name="s'.$i.'" value='.$row['s'].' readonly></th>
    <th><input type="submit" value="Add" name="address'.$i.'"/>
    <th><input type="submit" value="Remove" name="delete'.$i.'"/>
    <th><input type="checkbox"  name="check'.$i.'"/>
    </tr>
    ';
    }
    else
    {
        echo '<tr bgcolor="green">
    <th><input type="number" placeholder='.$row['bill_id'].' name="bill_id'.$i.'" value='.$row['bill_id'].' readonly></th>
    <th>'.$row['name'].'</th>
    <th><input type="number" placeholder='.$row['quantity'].' name="quantity'.$i.'" value='.$row['quantity'].' readonly></th>
    <th><input type="number" placeholder='.$row['available'].' name="available'.$i.'" value='.$row['available'].' readonly></th>
    <th><input type="number" placeholder='.$row['Price'].' name="price'.$i.'" value='.$row['Price'].' readonly></th>
    <th><input type="number" placeholder='.$row['s'].' name="s'.$i.'" value='.$row['s'].' readonly></th>
    <th><input type="submit" value="Add" name="address'.$i.'"/>
    <th><input type="submit" value="Remove" name="delete'.$i.'"/>
    <th><input type="checkbox"  name="check'.$i.'"/>
    </tr>
    ';
    }

    if(isset($_POST['delete'.$i.'']))
    {
        if(isset($_POST['check'.$i.'']))
        {
            $idd=$_POST['bill_id'.$i.''];
            $s=1;
            $query1 = "UPDATE bill SET s=1 where bill_id='$idd'";
            $result1 = mysqli_query($link, $query1) ;

            if(!query1)
            {
                echo "Updation failed";
            }
            else
            {
                header("location: calculate.php");

            }
        }

    }

    if(isset($_POST['address'.$i.'']))
    {
        if(isset($_POST['check'.$i.'']))
        {
/*
        $idd=$_POST['id'.$i.''];
        $n=$_POST['name'.$i.''];
        $q=$_POST['quantity'.$i.''];
        $a=$_POST['available'.$i.''];
        if($n=='')
        {
        $n="None";
        }
        $query1 = "UPDATE items SET name='$n', quantity='$q', available='$a' where id='$idd'";
        $result1 = mysqli_query($link, $query1) ;

        $query2 = "UPDATE bill SET name='$n', quantity='$q', available='$a' where name='$n'";
        $result2 = mysqli_query($link, $query2) ;
*/

            $idd=$_POST['bill_id'.$i.''];
            $s=0;
            $query1 = "UPDATE bill SET s=0 where bill_id='$idd'";
            $result1 = mysqli_query($link, $query1) ;
            if(!query1)
            {
                echo "Updation failed";
            }
            else
            {
                header("location: calculate.php");

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
<center>
<br>
<a href="list.php"><button>Check List</button></a>
<br>
</center>
';


mysqli_close($link);


?>

