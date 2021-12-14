<?php include 'Functions.php';

$loggedname=$_SESSION["name"];
$loggednumber=$_SESSION["phone"];

if(isset($_POST["summit"])){
    $shop=$_POST["summit"];
    $_SESSION["shop-name"]=$shop;

   
  
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
    <title>Document</title>
</head>
<body>
<nav>
        <div class='imglogo'>
            <img src="images/Eagle Mascot Logo.jpg" alt="">
</div>
<div class='navigation'>
    <ul>
        <li><p>Hi&nbsp;<?php echo $loggedname;?></p>
       
        <li ><a href="distance.php"><BUTTON class='username' id="idbtn"> QUEUES</BUTTON></a></li>
        <li ><a href="index.php"><BUTTON class='username' id="idbtn"> LOGOUT</BUTTON></a></li>

    </ul>
</div>

</nav>
<hr >



<div class="shop">

    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <div class="shop-details">
        <div class="shop-img"><img src="images/pizza hut.png" alt="" srcset=""></div>
        <div class="shop-identity">
            <h3 >PIZZA HUT</h3>
            <h4>9.30 - 10.30</h4>
            <p>Pizza Hut is an American multinational restaurant chain and international franchise founded in 1958 in Wichita, Kansas by Dan and Frank Carney. It provides pizza and other Italian-American dishes, including pasta, side dishes and desserts.</p>
            <button class="username"  name="summit" value="PIZZA HUT" >GET TOKEN</button>
            
          

        </div>
    </div>
    </form>
    <hr class="extent">
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <div class="shop-details">
       <div class="shop-img"> <img src="images/dlf.png" alt="" srcset=""></div>
        <div class="shop-identity">
            <h3 name="DLF">DLF</h3>
            <h4>9.30 - 10.30</h4>
          
            <p>Delhi Land & Finance is a commercial real estate developer. It was founded by Chaudhary Raghvendra Singh in 1946 and it is based in New Delhi, India.</p>
            <button class="username"  name="summit" value="DLF">GET TOKEN</button>
        </div>
    </div>
    </form>
    <hr class="extent">
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
     <div class="shop-details">
        <div class="shop-img"><img src="images/lulu.png" alt="" srcset=""></div>
        <div class="shop-identity">
            <h3 name="LULU PARADISE">LULU PARADISE</h3>
            <h4>9.30 - 10.30</h4>
            <p>LuLu Mall Kochi is a shopping mall located in Edappally Kochi, Kerala. The mall, its car parking facility, the convention center and the hotel altogether got total area of 1.85 million sq ft. With an average daily footfall of more than 80,000, it is one of the most visited places in Kerala.</p>
            <button class="username"  name="summit" value="LULU PARADISE">GET TOKEN</button>
        </div>
    </div>
    </form>
    
    <hr class="extent">
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
     <div class="shop-details">
       <div class="shop-img"> <img src="images/starbucks.jpeg" alt="" srcset=""></div>
        <div class="shop-identity">
            <h3 name="STARBUGS">STARBUGS</h3>
            <h4>9.30 - 10.30</h4>
            <p>Starbucks Corporation is an American multinational chain of coffeehouses and roastery reserves headquartered in Seattle, Washington. It is the world's largest coffeehouse chain. As of November 2021, the company had 33,833 stores in 80 countries, 15,444 of which were located in the United States.</p>
            <button class="username" name="summit"  value="STARBUGS">GET TOKEN</button>
        </div>
    </div>
    </form>
    <hr class="extent">
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
     <div class="shop-details">
        <div class="shop-img ccd"><img src="images/ccd.jpg" alt="" srcset=""></div>
        <div class="shop-identity">
            <h3 name="CAFE COFFEE DAY"> CAFE COFFEE DAY</h3>
            <h4>9.30 - 10.30</h4>
            <p>Café Coffee Day is an Indian café chain. It is a subsidiary of Coffee Day Enterprises Limited. Internationally, CCDs were present in Austria, Czech Republic, Malaysia, Nepal and Egypt before shutting down all operations outside India.</p>
            <button class="username" name="summit"  value="CAFE COFFEE DAY">GET TOKEN</button>
        </div>
    </div>
</form>
</div>
<?php if(isset($_POST["summit"])){ ?>
<form action="distance.php" method="POST" >
<div id="shop-info">


<div class="specific-shop">

   <div class="shop-name"> <h4><?php echo $shop ?></h4></div>
    <div class="shop-details-expand" ><h3>TIMINGS</h3>
    <p><?php echo $time ?></p></div>
    <div class="shop-details-expand" ><h3>TOTAL TOKENS</h3>
    <p><?php echo $totaltokens ?></p></div>
   <div class="shop-details-expand" > <h3>AVAILABLE TOKENS </h3>
    <p><?php echo $availtokens ?></p></div>
    

   
    <div><button class=" left"  name="shop-down">Confirm</button></div> 
    







</div>
</div>
</form>
<?php } ?>




<script src="javascript/shop.js"></script>
<script src="javascript/logout.js"></script>


</div>
</body>
</html>