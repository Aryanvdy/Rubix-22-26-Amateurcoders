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
    <link rel="stylesheet" href="css/available_doc.css">
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

<?php include 'config.php';?>
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



    <h1>Availabe Doctors</h1>
    <div>
        <table class="table table-hover" style="border-color:black;">
            <thead >
                <tr>
                    <!-- <th class="text-center">Doctor Id</th> -->
                    <th class="text-center">Name</th>
                    <th class="text-center">Speciality</th>
                    <th class="text-center">City</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql ="select * from doctors";
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query))
                {
            ?>
                <tr>
                    <td class="py-2" ><?php echo $rows['fname']; ?></td>
                    <td class="py-2" ><?php echo $rows['speciality']; ?></td>
                    <td class="py-2" ><?php echo $rows['city']; ?> </td>
                    <td class="py-2" ><?php echo $rows['phone']; ?> </td>
                </tr>

            <?php } ?>
            </tbody>
        </table>

    </div>
</body>
</html>