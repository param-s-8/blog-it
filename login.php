<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900"
      rel="stylesheet"
    />
    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->

    <style>
        .outer-box{
            /* border: 1px solid #000000; */
            -webkit-box-shadow:  0px 0px 15px 0px #000000;
            box-shadow:  0px 0px 15px 0px #000000;
            background: #ebebeb none no-repeat fixed 0px 0px;
            padding: 40px;
        }
        .errMsg {
                color: red;
                margin: 0;
                font-weight: bold;
            }
        .row2{
            align-self:center;
            padding: 0;
            margin-top: 5vh;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING) ;
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $errEmail = $errPassword = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['email'])){
                $errEmail = 'Email is required!';
            }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errEmail = 'Please Provide A Valid Email-Id!';
                }
                
            }

            if (empty($_POST['password'])){
                $errPassword = 'Password is mandatory!';
            }else{
                $res = array("options"=>array("regexp"=>"/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"));
                if(!filter_var($pw, FILTER_VALIDATE_REGEXP,$res)){
                    $errPassword = 'Please Provide A Valid Password!';
                }
                
            }
            if(($errPassword == '') && ($errEmail == '')){
                //echo "<b>User Logged In</b><br><b>Email:</b> $email<br><b>Password: </b> $pw";
                if(isset($_POST['submit'])){
                    $_SESSION['uemail'] = $email;
                    header("location: index.php");
                }
            }
        }
        
    ?>
    <div class="site-wrap">
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar" role="banner">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12 search-form-wrap js-search-form">
              <form method="get" action="#">
                <input
                  type="text"
                  id="s"
                  class="form-control"
                  placeholder="Search..."
                />
                <button class="search-btn" type="submit">
                  <span class="icon-search"></span>
                </button>
              </form>
            </div>

            <div class="col-4 site-logo">
              <a href="index.php" class="text-black h2 mb-0">Mini Blog</a>
            </div>

            <div class="col-8 text-right">
              <nav class="site-navigation" role="navigation">
                <ul
                  class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0"
                >
                  <li><a href="index.php">Home</a></li>
                  <li><a href="category.html">Politics</a></li>
                  <li><a href="category.html">Tech</a></li>
                  <li><a href="category.html">Entertainment</a></li>
                  <li><a href="category.html">Travel</a></li>
                  <li><a href="category.html">Sports</a></li>
                  <li><a href="login.php">Log In</a></li>
                  <li><a href="compose.php">Create Blog</a></li>
                  <li class="d-none d-lg-inline-block">
                    <a href="#" class="js-search-toggle"
                      ><span class="icon-search"></span
                    ></a>
                  </li>
                </ul>
              </nav>
              <a
                href="#"
                class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"
                ><span class="icon-menu h3"></span
              ></a>
            </div>
          </div>
        </div>
      </header>

    <div class="site-section bg-light">
    <div class='container'>
        <div class="container">
            <div class="row same-height justify-content-center">
              <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                  <h1 class="">Log In</h1>
                </div>
              </div>
            </div>
        </div>
        <div class='outer-box col-md-5 mx-auto'>   
            <div class='row'>
                <div class='col-md-1 col-sm-12'></div>
                <div class='col-md-10 col-sm-12'>
                    <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                <span class="errMsg"><?php echo $errEmail;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                                <span class="errMsg"><?php echo $errPassword;?></span>
                            </div>
                        </div>
                        <div class='d-flex justify-content-around'>
                            <input type="submit" class="btn btn-success" value='Submit' name='submit'>
                            <input type="reset" class="btn btn-dark" value='Reset'>
                        </div>
                    </form>
                </div>
                <div class='col-md-1'></div>    
            </div>
            <div class='row row2 d-flex justify-content-center '>
                <p>Don't have an account? <a href='register.php'>Create One!</a></p>
            </div>   
        </div>
    </div>
    <br><br><br><br><br><br>
    </div>



    <div class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Placeat reprehenderit magnam deleniti quasi saepe, consequatur
                atque sequi delectus dolore veritatis obcaecati quae, repellat
                eveniet omnis, voluptatem in. Soluta, eligendi, architecto.
              </p>
            </div>
            <div class="col-md-3 ml-auto">
              <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
              <ul class="list-unstyled float-left mr-5">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Subscribes</a></li>
              </ul>
              <ul class="list-unstyled float-left">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Sports</a></li>
                <li><a href="#">Nature</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <div>
                <h3 class="footer-heading mb-4">Connect With Us</h3>
                <p>
                  <a href="#"
                    ><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span
                  ></a>
                  <a href="#"><span class="icon-twitter p-2"></span></a>
                  <a href="#"><span class="icon-instagram p-2"></span></a>
                  <a href="#"><span class="icon-rss p-2"></span></a>
                  <a href="#"><span class="icon-envelope p-2"></span></a>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="icon-heart text-danger" aria-hidden="true"></i> by
                <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-tagsinput.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>