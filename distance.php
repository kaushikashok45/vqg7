<?php include 'Functions.php';
ob_start();
$distanceresult = array();
$shopname = $_SESSION["shop-name"];

$custphone = $_SESSION["phone"];
$count = 0;

$connect = new Functions();
$connection = $connect->getConection();
$sqle = "select * from shop where name='$shopname'";
$val = $connect->select($connection, $sqle);

$shopactive = $connect->fetchData($val);
$availabletoken = $shopactive["available_tokens"];
$totaltokens = $shopactive["total_tokens"];
if (isset($_POST["close"]))
{
    $sql = "delete from customerdistance where phone='$custphone' ";
    $val = $connect->select($connection, $sql);
    $sqlsorted = "delete from customersorted where phone='$custphone' ";
    $valsorted = $connect->select($connection, $sqlsorted);
    $availabletoken = $availabletoken + 1;
    $tokenupdate = "update shop set available_tokens='$availabletoken' where name='$shopname'";
    $connect->select($connection, $tokenupdate);

    header("Location: customer.php");
    exit;

}
if ($availabletoken <= $totaltokens and $availabletoken > 0)
{
    if ($shopactive["active"] == 1)
    {

        $sql = "select * from customerd where phone='$custphone'";
        $value = $connect->select($connection, $sql);
        while ($shopdetails = $connect->fetchData($value))
        {

            $latitude = $shopdetails["latitude"];

            $longitude = $shopdetails["longitude"];
            $customerphone = $shopdetails["phone"];
            
            $result = $connect->DistAB($latitude, $longitude);
            $distanceresult[$count++] = $result;
            $distancefinal[$count++] = $result;
            $sortsql = "insert into customersorted values('$customerphone','$result') ";
            $sortconnect = $connect->select($connection,$sortsql);
            $s = "select * from customersorted order by distance asc";
            $svalue = $connect->select($connection, $s);
            $drop="drop table customerdistance";
            $dropconnect=$connect->select($connection,$drop);
            $create="create table customerdistance(phone varchar(11) unique,distance varchar(50),token int auto_increment unique)";
            $createconnect=$connect->select($connection,$create);
            while ($sfetch = $connect->fetchData($svalue))
            {
                $customerphonei = $sfetch["phone"];
                $resulti = $sfetch["distance"];
                

                $sqli = "select * from customerdistance";
                $valuei = $connect->select($connection, $sqli);
                $shopdetai = $connect->fetchData($valuei);

                if (!$shopdetai)
                {
                    
                    $availabletoken = $availabletoken - 1;
                    $tokenupdate = "update shop set available_tokens='$availabletoken' where name='$shopname'";
                    $connect->select($connection, $tokenupdate);
                    $sqla = "insert into customerdistance(phone,distance,token) values('$customerphonei','$resulti',1)";
                    $valueaa = $connect->select($connection, $sqla);
                }
                elseif ($shopdetai["phone"] != $custphone)
                {
                  

                    
                    $availabletoken = $availabletoken - 1;
                    $tokenupdate = "update shop set available_tokens='$availabletoken' where name='$shopname'";
                    $connect->select($connection, $tokenupdate);

                    $sqel = "SELECT * FROM customerdistance ORDER BY token DESC LIMIT 1";
                    $valuaeaa = $connect->select($connection, $sqel);
                    $tokenfetch = $connect->fetchData($valuaeaa);
                    $tokenvalue = $tokenfetch['token'];

                    $sqla = "insert into customerdistance(phone,distance,token) values('$customerphonei','$resulti',$tokenvalue+1)";
                    $valueaa = $connect->select($connection, $sqla);
                    break;
                }

                $finalsortedorder = $connect->Sort($distancefinal);

            }
        }
    }
    else
    { ?>
         <h1 class="b-header">
         <?php
        echo "Business is not open"; ?></h1>
      <BUTTON class='username' id="idbtn">  <a href="customer.php">&#8592; Go Back</a></BUTTON>

           
    
<?php
    }

}

?>


   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/distance.css">
    <title>Document</title>
</head>
<body >
    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <div class="distance">
    <?php
$sqleb = "select * from shop where name='$shopname'";
$valueq = $connect->select($connection, $sqleb);
$shopactivee = $connect->fetchData($valueq);
if ($availabletoken <= $totaltokens and $availabletoken > 0)
{ ?>
    <BUTTON class='username left-align-i' id="idbtn"><a href="customer.php">&#8592; Go Back</a></BUTTON>
             <?php if ($shopactivee["active"] == 1)
    { ?>
               
               <BUTTON class='username' name="close" id="idbtn">I AM DONE</BUTTON>
                <h1>Queue Order</h1> 
                <?php
        $sqllength="select * from customerdistance";
        $lengthconnect=$connect->select($connection,$sqllength);
        $lengthrow=mysqli_num_rows($lengthconnect);
        $valq = "select * from customerdistance where phone='$custphone'";
        $valresult = $connect->select($connection, $valq);
        if($lengthrow >=5){
        $customerfinalresult = $connect->fetchData($valresult) ?>
                     <p>The customer with <?php echo $customerfinalresult["phone"] ?> will get token number <?php echo $customerfinalresult["token"] ?></p><br>
       <?php
    }
    else{ ?>
        <h1 class="b-header"><?php echo "please wait calculating your queue...."; ?></h1>
  <?php  }
}
}
else
{ ?>
       <h1 class="b-header"><?php echo "token not available"; ?></h1>
       <a href="customer.php"><BUTTON class='username' id="idbtn">&#8592; Go Back</BUTTON></a>

         <?php
} ?> 
  
    </div>
    </form>
</body>
</html>
