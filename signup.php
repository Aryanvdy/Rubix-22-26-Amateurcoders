<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "img/FindCare-Logo.png" 
        type = "image/x-icon">
    <title>FindCare | Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/signup.css">

</head>
<body>


<?php
// session_start();
    include 'config.php';
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $aadhaar=$_POST['aadhaar'];
        $contact=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $con_password=$_POST['cpass'];

        if($password==$con_password && strlen($password)>8){
            $mysql="INSERT INTO patients values('{$fname}','{$lname}','{$email}','{$contact}', '{$aadhaar}','{$gender}','{$password}')";
            $result=mysqli_query($conn,$mysql);
            // echo $result;
        
            // $sql="INSERT INTO details (name, gender, blood_grp, aadhaar_no, date, contact_no, email, state, district, city) values('{$name}','{$gender}','{$blood_grp}','{$aadhaar}','{$dob}','{$contact}','{$email}','{$state}','{$district}','{$city}')";
            // $result1=mysqli_query($conn,$sql);
            // echo $result1;
            
            if($result){
                echo "<script> alert('User created and details saved successfully!');
                window.location='login.php';
                </script>";
            }
            else{
                echo $conn->error;
                // echo "<script> alert('User not registered!');
                // </script>";
        
            }
        }
    }
        

?>

<!-- <html> -->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <a class="" href="index.html">
                <img src="img/FindCare-White.png" alt=""/>
                </a>
                <a class="btn btn-prime" href="login.html">Login</a>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Signup as a Patient</h3>
                        <form action="signup.php" method="post">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"placeholder="Email *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="aadhaar"placeholder="Aadhar Number *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="pass"placeholder="Password *" value="" required/>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lname"placeholder="Last Name *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Phone *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender">
                                            <option class="hidden"  selected disabled>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  placeholder="Confirm Password *" value="" name="cpass" required/>
                                    </div>

                                    
                                    <button type="submit" value="Submit" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Signup as a Doctor</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" value="" />
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Speciality *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="hidden"  selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password *" value="" />
                                </div>
                                
                                <input type="submit" class="btnRegister"  value="Register"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>				                            
</body>
</html>