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
                        <!-- <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="pharmacy.php">Pharmacy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="labtest.php">Lab Test</a>
                        </li> -->
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
                            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="news.php">News</a></li>
                            <li><a class="dropdown-item" href="#">Manage Appointments</a></li>

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
    <div class="page-section pb-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 b-head">
              <h1>Welcome to Your<br> Health  Center</h1>
              
              <a href="about.php" class="btn btn-outline-success">Learn More</a>
            </div>
            <div class="col-lg-6 " data-wow-delay="400ms">
              <div class="img-place custom-img">
                <img src="img/Doc-HomePage.png" alt="" width="60%">
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    
<!----------------------------------------- Features ---------------------------------------->

  <section class="w-s" id="features">
    <div class="container-fluid">

      <div class="row">
        
      <div class="feature-box col-lg-4">
        <a href="videoconsult.php"><i class="fas fa-video fa-3x f-ico"></i></a>
        <h3>Video Consultations</h3>
        <p>So easy to use, even your dog could do it.</p>
      </div>
      <div class="feature-box col-lg-4 ">
        <a href="chatbot.php"><i class="fas fa-robot fa-3x f-ico"></i></a>
        <h3>24/7 Assistance</h3>
        <p>Chatbot support for emergencies.</p>
      </div>
      <div class="feature-box col-lg-4">
        <a href="appointment.php"><i class="fas fa-check fa-3x f-ico"></i></a>
        <h3>Book appointments</h3>
        <p>Find good doctors at your convenient time.</p>
      </div>
      <div class="feature-box col-lg-4">
        <a href="pharmacy.php"><i class ="fas fa-briefcase-medical fa-3x f-ico"></i></a>
        <h3>Med Store</h3>
        <p>Find prescribed medicines at lowest rate.</p>
      </div>
      <div class="feature-box col-lg-4">
        <a href="news.php"><i class="far fa-newspaper fa-3x f-ico"></i></a>
        <h3>Latest news</h3>
        <p>Get all the updates related to health care.</p>
      </div>
      <div class="feature-box col-lg-4">
        <a href="labtest.php"><i class="fas fa-vial fa-3x f-ico"></i></a>
        <h3>Lab test</h3>
        <p></p>
      </div>

      
    </div>
  </div>
  </section>
  <!---------- Blog----------->
  <section class="w-s" id="blog">

    <h2>See what our recommended doctors say</h2>
    <div class="row">
      <div class="blog-column col-lg-4 col-md-6">
        <div class="card">
          <div class="card-header">
            <h3>Dr. M.H Shah</h3>
  
          </div>
          <div class="card-body">
            <h2>Corona cases</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus sed turpis tincidunt id. Eu volutpat odio facilisis mauris sit amet massa vitae. Feugiat vivamus at augue eget arcu. Purus in mollis nunc sed id semper. Convallis tellus id interdum velit. Praesent elementum facilisis leo vel fringilla est. Sit amet est placerat in egestas. Rhoncus dolor purus non enim. Iaculis at erat pellentesque adipiscing. </p>
            <pre>      </pre>
            <button type="button" class="btn btn-outline-success sign-up"> Read more</button>
            
          </div>
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




  
    
