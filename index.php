<?php include 'Functions.php';


$connect= new Functions();
$connection=$connect-> getConection();
if (isset($_POST["phone"]) && isset($_POST["psw"])){
    $phone=$_POST["phone"];
    $password=$_POST["psw"];
    $sql="select * from user where phone = '${phone}' and password = '${password}' ";
    $mysql="select usertype from user where phone='${phone}'";
$value=$connect->select($connection,$sql);
$val=$connect->select($connection,$mysql);

$rows=$connect->noofRows($value);
while($userdetails=$connect->fetchData($value))
{
   $_SESSION["name"]=$userdetails["name"];
   $_SESSION["phone"]=$userdetails["phone"];
  
}
while($userdetail=$connect->fetchData($val))
{
if($userdetail['usertype']==1){
$result=$connect->redirect($rows,'customer.php');
$connect->fetchData($value);
}
else{
    $result=$connect->redirect($rows,'shop.php');
$connect->fetchData($value);
}

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
    <title>Document</title>
</head>
<body>
    <div class="error">
<?php if(isset($result)){ ?>
      <h4><?php echo $result; ?></h4>
      <?php } ?></div>
<nav id="margin" >
        <div class='imglogo'>
            <img src="images/Eagle Mascot Logo.jpg" alt="">
</div>
<div class='navigation vision h-he'>
    <ul>
        <li><a href="#Home">Home</a></li>
        <li><a href="#About">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><button class="loginbutton" onClick="openForm()">Login/Sign up</button></li></a>
    </ul>
</div>
<div class="burger bu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
</nav>
<hr>
<div id="Home" class='home '>

    <div class="left-home">
        <h1>vQ</h1>
        <h4>Quit The Queues</h4></div>
    <div class="right-home">
        <img src="images/vQhome.png" alt="">
</div>

</div>
<hr>
<div id="About" class="about">
    <h1>About</h1>
    <hr>
    <p>In the brick-and-mortar retail and business world, virtual queuing for large organizations similar to the FASTPASS and Six Flags' Flash Pass, have been in use successfully since 1999 and 2001 respectively. For small businesses, the virtual queue management solutions come in two types: (a) based on SMS text notification and (b) apps on smartphones and tablet devices, with in-app notification and remote queue status views.</p>

    <h1>Our Partners</h1>
    <hr>
    <div class="partners">
        <img src="images/lulu.png" alt="">
        <img src="images/phenix.jpeg" alt="">
        <img src="images/pizza hut.png" alt="">
        <img src="images/starbucks.jpeg" alt="">
        <img src="images/dlf.png" alt="">
</div>


</div>
<hr>
<div id="contact" class="contact">
    <h1>Contact Us</h1>
    <hr>
    <div class="contact-sep">
       <div class="contact-div"> 
       <h3>Customer Care</h3>
       <h3>Mail Us</h3>
       <h3>Facebook</h3>
       <h3>Whatsapp</h3></div>
       <div class="details">
       <h3>1800-429-8798</h3>
       <h3>vQ@gmail.com</h3>
       <h3>vQ</h3>
       <h3>9876543210</h3></div>
</div>
</div>
<div class="form-popup" id="myForm">
  <form  class="form-container" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" >
<div> <button type="button" class="btn cancel closebutton" onclick="closeForm()"><img src="images/cancel-btn.png" alt=""></button>

  
        <input type="text" placeholder="Enter phone" name="phone" id="phone" required>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <button type="submit" class="btn">Login</button><br></div>
    <div class="hyperlink">
    
   
    <a href="">Forgot Password</a>
    <button type="submit" class="btn hyperlink"><a href="signup.php">Signup</button></div>
  

  </form>
 <script src="javascript/nav.js"></script>
 <script src="javascript/login.js"></script>
</div>
</body>
</html>