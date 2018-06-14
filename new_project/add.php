
<?php
$link = mysqli_connect("localhost","root","","demo");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['un']) and isset($_POST['p']) and isset($_POST['id']) and isset($_POST['name']))
{
    $un=$_POST['un'];
    $id=$_POST['id'];
    $n=$_POST['name'];
    $p=$_POST['p'];

    $query = "INSERT INTO admin(id,name,username,password)values('$id','$n','$un','$p')";
   
    if(mysqli_query($link, $query)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>


<html>
<head>


</head>
<body>
    <form action="" method="post">
    <table>
        <tr>
            <th>
                Enter id :
            </th>
            <th>
                <input type="text" name="id"/>
            </th>
        </tr>
        <tr>
            <th>
                Enter Name :
            </th>
            <th>
                <input type="text" name="name"/>
            </th>
        </tr>
        <tr>
            <th>
                Enter UserName :
            </th>
            <th>
                <input type="text" name="un"/>
            </th>
        </tr>
        <tr>
            <th>
                Enter Password :
            </th>
            <th>
                <input type="password" name="p"/>
            </th>
        </tr>
        <tr >
            <th colspan=2>
                <input type="submit" value="SUBMIT"/>
            </th>
        </tr>
    </table>
    </form>




</body>
</html>