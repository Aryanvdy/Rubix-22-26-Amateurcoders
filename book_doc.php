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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/maicons.css">
    <link rel="stylesheet" href="css/lang.css">
    <link rel="stylesheet" href="css/book_doc.css">
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
                            <a class="nav-link  hover-underline-animation" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active hover-underline-animation" href="videoconsult.php">Video Consult</a>
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
                            <!-- <li><a class="dropdown-item" href="#">Calculate BMI</a></li> -->
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
    
    $em=$_GET['email'];
    $sql = "SELECT * FROM  doctors where email='$em'";
    $result=mysqli_query($conn,$sql);
    
    if(!$result)
    {
        echo "Error : ".$sql."<br>".mysqli_error($conn);
    }
    $rows=mysqli_fetch_assoc($result);
    $_SESSION['emaill'] = $rows['email'];
    


if(isset($_POST['submit'])){
    $slot=$_POST['slot'];
    $eml = $_POST['hidemail'];
    $date = date('Y-m-d'); 
    $sql_dt="INSERT INTO doctor_timing values('{$eml}','{$date}','{$slot}')";
    $result_dt=mysqli_query($conn,$sql_dt);

    
    if($result){
        echo "<script> alert('Booking Successful!');
        window.location='index.php';
        </script>";
    }
    else{
        echo $conn->error;
        echo "<script> alert('Issue with Database');
        </script>";

    }
}
?>
<section>
<section class="w-s info" id="blog">
<div class="row">
  <div class="blog-column col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Name: <?php  echo $rows['fname'].' '.$rows['lname']; ?></h3>
      </div>
      <div class="h4">
        <h4>Contact: <?php  echo $rows['phone'] ?></h4>
        <h4>Email: <?php  echo $rows['email']?></h4>
        <h4>Speciality: <?php  echo $rows['speciality']?></h4>
      </div>
      </div>
    </div>
  </div>
  </div>
</section>

    <div class="container-fluid buttonss">

       <div class="row buttonn">
        <form action="book_doc.php" method="post" class="buttonss">
        <div class="form-group" style="display:none">
            <select class="form-control" name="hidemail">
                <option name="hidden" value="<?php echo $rows['email'] ?>">Gender</option>
            </select>
        </div>
        <?php 
             $mail = $rows['email'];
             $d = date('Y-m-d');
             $select = mysqli_query($conn, "SELECT `slot` FROM `doctor_timing` WHERE `email` = '$mail' && `date` = '$d' && `slot`='10:00 am'");
             $numb = mysqli_num_rows($select);
             if($numb==0) { ?>
               <input class="rbtn" type="radio" name="slot" value="10:00 am">10:00 am
             <?php }
             
             
             
        ?>


          





          <!-- <input class="rbtn" type="radio" name="slot" value="10:00 am">10:00 am -->
          <input class="rbtn" type="radio" name="slot" value="12:00 pm">12:00 pm
          <input class="rbtn" type="radio" name="slot" value="2:00 pm">2:00 pm
          <input class="rbtn" type="radio" name="slot" value="4:00 pm">4:00 pm
          <input class="rbtn" type="radio" name="slot" value="6:00 pm">6:00 pm
          <input class="rbtn" type="radio" name="slot" value="8:00 pm">8:00 pm<br>
          <button class="btn btn-b" type="submit" name="submit" onclick="email_notify()">Submit</button>
        </form>
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
        <script>
          	function email_notify(){
              <?php 
                include('configuration.php');
                include('api.php');
                $arr['topic']='FindCare- Doctor Consultation';
                $arr['start_date']=date('Y/m/d');
                $arr['duration']=30;
                $arr['password']='FindCare';
                $arr['type']='2';
                $result=createMeeting($arr);
                if(isset($result->id)){
                  $html = "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>
                            Password: ".$result->password."<br/>
                            Start Time: ".$result->start_time."<br/>
                            Duration: ".$result->duration."<br/>";
                }else{
                  echo '<pre>';
                  print_r($result);
                }
                include('smtp/PHPMailerAutoload.php');
                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host="smtp.gmail.com";
                $mail->Port=587;
                $mail->SMTPSecure="tls";
                $mail->SMTPAuth=true;
                $mail->Username="avidyarthi513@gmail.com";
                $mail->Password="aryanvdy@5502";
                $mail->SetFrom("avidyarthi513@gmail.com");
                $mail->addAddress('phulwanikashish46@gmail.com');
                $mail->IsHTML(true);
                $mail->Subject="New OTP";
                $mail->Body=$html;
                $mail->SMTPOptions=array('ssl'=>array(
                  'verify_peer'=>false,
                  'verify_peer_name'=>false,
                  'allow_self_signed'=>false
                ));
                if($mail->send()){
                  echo "done";                
                }
          ?>
                
            }
        </script>
  </body>
</html>