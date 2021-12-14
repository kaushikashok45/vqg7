<?php  include 'Functions.php';
$shop= "PIZZA HUT";
$connect= new Functions();
$connection=$connect-> getConection();
$sql="select * from shop where name='${shop}'";
$value=$connect->select($connection,$sql);
$rows=$connect->noofRows($value);


while($shopdetails=$connect->fetchData($value))
{
$time=$shopdetails["time"];
$totaltokens=$shopdetails["total_tokens"];
$availtokens=$shopdetails["available_tokens"];


$_SESSION["time"]=$time;
$_SESSION["totaltokens"]=$totaltokens;
$_SESSION["availtokens"]=$availtokens;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/customer.css">
    <link rel="stylesheet" href="css/distance.css">


    <title>Document</title>
</head>
<body>
<nav>
        <div class='imglogo'>
            <img src="images/Eagle Mascot Logo.jpg" alt="">
</div>
<div class="buttonflex"><button class="logout" ><a href="index.php">LogOut</a></button></div>


</nav>
<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" >
<div class="shop-details bg">
        <div class="shop-img"><img src="images/pizza hut.png" alt="" srcset=""></div>
        <div class=" width-shop">
            <h3 >PIZZA HUT</h3>
            <h4>9.30 - 10.30</h4>
            <p>Pizza Hut is an American multinational restaurant chain and international franchise founded in 1958 in Wichita, Kansas by Dan and Frank Carney. It provides pizza and other Italian-American dishes, including pasta, side dishes and desserts.</p>
           
            <div class="shop-details-expand" ><h3>TIMINGS</h3>
    <p><?php echo $time ?></p></div>
    <div class="shop-details-expand" ><h3>TOTAL TOKENS</h3>
    <p><?php echo $totaltokens ?></p></div>
   <div class="shop-details-expand" > <h3>AVAILABLE TOKENS </h3>
    <p><?php echo $availtokens ?></p></div>
    <button type="submit" class="username" name="summit" >START TOKEN</button>
    <button type="submit" class="username" name="sumit" >STOP TOKEN</button>
    <button type="submit" class="username" name="show" >SHOW CUSTOMERS</button>


    </div>
    </div>
    </form>
    <div class="distance">
    <?php if(isset($_POST["summit"])){
        $val="select * from customerdistance";
        $valresult=$connect->select($connection,$val);
   
      
    $sql="update shop set active=1 where name='${shop}'";
    $value=$connect->select($connection,$sql);
    $sqle="update shop set available_tokens=99 where name='${shop}'";
    $vale=$connect->select($connection,$sqle);
    $v="create table customerdistance(phone varchar(11) unique,distance varchar(50),token int auto_increment unique)";
    $va=$connect->select($connection,$v);
    

     } ?>
    
    
    <?php 
    if(isset($_POST["show"])){ 
        $vale="select * from customerdistance";
        $valeresult=$connect->select($connection,$vale);
        ?>
        <h1>Queue Order</h1> 
   <?php while($customerfinalresult=$connect->fetchData($valeresult)){ 
       ?>
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" >

        <p>The customer with <?php echo $customerfinalresult["phone"] ?> will get token number <?php echo $customerfinalresult["token"] ?></p><br>
        <!-- <input type="hidden" class='username' name="clos"  id="idbtn"> -->
    
    <BUTTON class='username' name="close"  id="idbtn" value='<?php echo $customerfinalresult['phone']; ?>'> CLEAR</BUTTON></form>
    <?php }}?>
    <?php
    if (isset($_POST["close"])){
     $no=$_POST["close"];  
    $sqlie="delete from customerdistance where phone=$no";
    $vaal=$connect->select($connection,$sqlie);
    $vai="drop table customerdistance";
    $vi=$connect->select($connection,$vi);
   


} ?>
<?php if(isset($_POST["sumit"])){
         $sql="update shop set active=0 where name='${shop}'";
         $value=$connect->select($connection,$sql);
    } ?>
    </div>

</body>
</html>