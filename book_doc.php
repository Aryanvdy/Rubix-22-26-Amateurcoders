<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "img/FindCare-Logo.png" 
        type = "image/x-icon">
    <title>FindCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/maicons.css">
    <link rel="stylesheet" href="css/lang.css">
    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/47d85d73c6.js" crossorigin="anonymous"></script>
    <!-- Icon -->
    <link rel="icon" href="favicon.ico">
    <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <!--------------------------------------- Header ---------------------------------->
    
<?php
session_start();
include 'config.php';
error_reporting(E_ALL ^ E_WARNING);
if(isset($_POST['logout'])){
  $_SESSION['login'] = "false";
  echo "<script> alert('Logged out!');
        </script>";
}





$user_ = $_SESSION['email'];
$sql = "SELECT * FROM patients where email='$user_'";
$res = mysqli_query($conn,$sql);
$user_details = mysqli_fetch_array($res);
//   echo "<script> alert($user_);
// </script>";

?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img\FindCare.png" width="120px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active hover-underline-animation" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="videoconsult.php">Video Consult</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="finddoctor.php">Find Doctor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="pharmacy.php">Pharmacy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="labtest.php">Lab Test</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 d-flex">
                        <li class="nav-item">
                          <a class="show btn btn-prime" href="login.php" id="login">LOGIN/Register</a>
                        </li>
                      <li class="nav-item">
                        <li class="nav-item dropdown hidee" id="logout">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $user_details['fname'] ?>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Calculate BMI</a></li>
                            <form action="index.php" method="post">
                              <input class="dropdown-item" type="submit" id="log-out" name="logout" value="Logout">
                            </form>
                          </ul>
                        </li>
                      </li>
                </ul>
                </div>
            </div>

        </nav>
        <br>
          <div id="google_translate_element" class="lang_trans"></div>
    </header>
    <?php
// echo $_SESSION['admin'];

if($_SESSION['login']=="true"){
  echo "<script>
  document.getElementById('login').classList.replace('show','hidee');
  document.getElementById('logout').classList.replace('hidee','show');
  </script>";
}
else{
  echo "<script>
  // document.getElementById('login').innerHTML = 'HI';
  
  </script>";

 }
 ?>
   



<!------------------------------- Header End-------------------------------------------- -->
<?php
    
    // $em=$_GET['email'];
    $em = 'av@gmail.com';
    $sql = "SELECT * FROM  doctors where email='$em'";
    $result=mysqli_query($conn,$sql);
    
    if(!$result)
    {
        echo "Error : ".$sql."<br>".mysqli_error($conn);
    }
    $rows=mysqli_fetch_assoc($result);
    $n = $rows['email'];


      echo "<script>
            alert('$n');  
            alert('$em');
        </script>";
?>

<section>
      <h1>Doctor Name <?php  echo $rows['email'].' '.$rows['lname']; ?></h1>
      <h2>Doctor Info</h2>
      <div class="container-fluid buttonss">

        <div class="row">
          
        <div class="feature-box col-lg-4">
            <button class="btn btn-b">
                10 am
              </button>
        </div>
  
        
      </div>
    </div>
    </section>





    <footer class="page-footer">
      <div class="container">
        <div class="row px-md-3">
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Company</h5>
            <ul class="footer-menu">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Editorial Team</a></li>
              <li><a href="#">Protection</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>More</h5>
            <ul class="footer-menu">
              <li><a href="#">Terms & Condition</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Join as Doctors</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Our partner</h5>
            <ul class="footer-menu">
              <li><a href="#">One-Fitness</a></li>
              <li><a href="#">One-Drugs</a></li>
              <li><a href="#">One-Live</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Contact</h5>
            <p class="footer-link mt-2">Bakers Street, Colaba, Mumbai.</p>
            <a href="#" class="footer-link">9895989598</a>
            <a href="#" class="footer-link">findcare@temporary.net</a>
  
            <h5 class="mt-3">Social Media</h5>
            <div class="footer-sosmed mt-3">
              <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
  
        </div>
    </footer>
    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>




  
    
