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
    <title>Register</title>
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
        @media screen and (min-width:700px){
            .registerImg{
            width:500px;
            height:500px;
        }
        }
        .errMsg {
                color: red;
                margin: 0;
                font-weight: bold;
            }
    </style>
</head>
<body>
      <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING) ;
        
        $errFname = $errLname = $errEmail = $errPassword = $errCPassword = $errNum = $errPref = $errPic= '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if(empty($_POST['email'])){
                $errEmail = 'Email is required!';
            }else{
              if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                  $errEmail = 'Please Provide A Valid Email-Id!';
              }else{
                $email = $_POST['email'];
              }
            }

            if(empty(trim($_POST['fname']))){
              $errFname = 'First Name is required!';
            }else{
              if (preg_match('/[\s+]|[0-9]/',trim($_POST['fname']))){
                $errFname = 'First Name must not contain whitespaces or numbers!';
              }else{
                $fname = trim($_POST['fname']);
              }
            }

            if(empty(trim($_POST['lname']))){
              $errLname = 'Last Name is required!';
            }else{
              if (preg_match('/[\s+]|[0-9]/',trim($_POST['lname']))){
                $errLname = 'Last Name must not contain whitespaces or numbers!';
              }else{
                $lname = trim($_POST['lname']);
              }
            }

            if(empty($_POST['password'])){
              $errPassword = 'Password is mandatory!';
            }else{
                $res = array("options"=>array("regexp"=>"/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"));
                if(!filter_var($_POST['password'], FILTER_VALIDATE_REGEXP,$res)){
                    $errPassword = 'Please Provide A Valid Password!';
                }else{
                  $pw = $_POST['password'];
                }
              }

            if(empty($_POST['cPassword'])){
              $errCPassword = 'Please Confirm your password!';
            }else{
              if($_POST['password']!=$_POST['cPassword']){
                $errCPassword = 'Passwords do not match!';
              }else{
                $cpw = $_POST['cPassword'];
              }
            }
            


            if(empty($_POST['conNo'])){
              $errNum = 'Contact Number is required!';
            }else{
              $min = 1000000000; $max = 9999999999;
              if (filter_var($_POST['conNo'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false){
                  $errNum = 'Please Enter Valid 10 digit Number!';
              }else{
                $num = $_POST['conNo'];
              }
            }
            

            if(!isset($_POST['prefer'])){
              $errPref = 'Please Enter Your Preferences!';
            }else{
              if(count($_POST['prefer']) < 2){
                $errPref = "Please Select Atleast 2 Categories";
              }else{
                $pref = $_POST['prefer'];
              }
            }
            
            $imgName = $_FILES['propic']['name'];
            $target_dir = "media/propics/";
            $target_path = $target_dir.basename($_FILES["propic"]["name"]);
           $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

           /*  $check = getimagesize($_FILES["propic"]["tmp_name"]);
            if($check !== false) {
              $uploadOk = 1;
            } else {
              $errPic = "File is not an image.";
              $uploadOk = 0;
            } */


            // Check if file already exists
             if (file_exists($target_file)) {
               $errPic = "Sorry, file already exists.";
               $uploadOk = 0;
             }

            // // Check file size
           if ($_FILES["propic"]["size"] > 1000000) {
             $errPic = "Sorry, your file is too large.";
             $uploadOk = 0;
           }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
              $errPic = "Sorry, only JPG, JPEG & PNG files are allowed.";
              $uploadOk = 0;
            } 

            if(($errPic == '')&&($errFname == '')&&($errLname == '')&&($errEmail == '')&&($errPassword == '')&&($errCPassword == '')&&($errNum == '')&&($errPref == '')){
                /* include_once('regInsert.php'); */
                include_once('creds.php');
                if(!$conn){
                    die("<br>Error in creating a connection: " . mysqli_connect_error());
                }else{

                    if(isset($_POST['submit'])){


                        $final = '';
                        foreach($pref as $select){
                          $final .= $select;
                          $final .= ' ';
                        }

                        //logic to get unique user id based on number of current entries.
                        $queryRows = mysqli_query($conn,"SELECT * FROM registered_users");
                        $num_rows = mysqli_num_rows($queryRows);
                        $u_id = "U".($num_rows + 101);

                        
                        $imgName = strtolower($u_id).$imgName;

                        if ($uploadOk == 0) {
                          echo "<script>alert('Sorry, your file was not uploaded.');</script>";
                        // if everything is ok, try to upload file
                        } else {
                          if (move_uploaded_file($_FILES["propic"]["tmp_name"], $target_dir.$imgName)) {
                            $uploadOk = 1;
                          } else {
                            echo "<script>alert('Sorry there was an error uploading your file.')</script>";
                          }
                        } 

                        $query2 = "INSERT INTO proimg( userid, status, name) VALUES ('$u_id',1,'$imgName' )";
                        mysqli_query($conn,$query2);
                        
                        $query = "INSERT INTO registered_users VALUES('$fname','$lname','$email','$pw',$num,'$final','$u_id')";
                        if(mysqli_query($conn,$query)){
                            echo "<script>
                                alert('Registration successful');
                                location='login.php';
                              </script>";
                             
                        }else{
                            echo "<script>
                                alert('A problem occurred while registration ');
                                </script>";
                        }
                    }
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
                <li><a href="category.php?category=politics">Politics</a></li>
                  <li><a href="category.php?category=nature">Nature</a></li>
                  <li><a href="category.php?category=tech">Tech</a></li>
                  <li><a href="category.php?category=travel">Travel</a></li>
                  <li><a href="category.php?category=sports">Sports</a></li>
                  <?php
                    if(isset($_SESSION['user_id'])){
                      echo "<li><a href='logout.php'>Log Out</a></li>";
                      echo "<li class='disabled'><a href='user_profile.php'>"."Hello, ".$_SESSION['ufname']."</a></li>";
                    }else{
                      echo "<li><a href='login.php'>Log In</a></li>";
                    }
                  ?>
                  <li><a href="compose.php">Create Blog</a></li>
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
                  <h1 class="">Register Account</h1>
                </div>
              </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div clas='col-md-6 col-sm-12'>
                    <img src="images/register.png" alt='resgiter_illust' class="registerImg img-fluid img-rounded" style=''>
                </div>
                <div class='col-md-6 col-sm-12'>
                    <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="John"
                                  value = "<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''; ?>"
                                >
                                <span class='text-danger'><?php echo $errFname;?></span>
                            </div>
                            
                            
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Doe"
                                value = "<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>"
                                >
                                <span class='text-danger'><?php echo $errLname;?></span>
                            </div>
                            
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="abc@example.com"
                                value = "<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"
                              >
                              <span class='text-danger'><?php echo $errEmail;?></span>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="propic">Upload Profile Picture</label>
                              <input type="file" class="form-control-file" id="propic" name="propic"
                                value = "<?php echo isset($_POST['propic']) ? $_POST['propic'] : ''; ?>"
                              >
                              <span class='text-danger'><?php echo $errPic;?></span>
                          </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                value = "<?php echo isset($_POST['password']) ? $_POST['passsword'] : ''; ?>"
                                >
                                <span class='text-danger'><?php echo $errPassword;?></span>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="cPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="Confirm Password"
                                value = "<?php echo isset($_POST['cPassword']) ? $_POST['cPassword'] : ''; ?>"
                                >
                                <span class='text-danger'><?php echo $errCPassword;?></span>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="conNo">Contact Number</label>
                                <input type="number" class="form-control" id="conNo" name="conNo" placeholder="Enter contact number" 
                                value = "<?php echo isset($_POST['conNo']) ? $_POST['conNo'] : ''; ?>"
                                > 
                                <span class='text-danger'><?php echo $errNum;?></span>
                            </div>
                            
                            
                            
                            <div class="form-group col-md-6">
                                <label for="prefer">Select Your Favourite Topics:</label>
                                <select class="form-control multipicker" id="prefer" name="prefer[]" type="text" multiple>
                                <option value='nature'>Nature</option>
                                <option value='travel'>Travel</option>
                                <option value='politics'>Politics</option>
                                <option value='sports'>Sports</option>
                                <option value='tech'>Tech</option>
                                </select>
                                <span class='text-danger'><?php echo $errPref;?></span>
                            </div>
                            
                        </div>
                        <input type="submit" class="btn btn-success" value='Register' name='submit'>
                        <input type="reset" class="btn btn-dark" value='Reset'>
                        <!-- <button type="submit" class="btn btn-success" value='submit'>Register</button>
                        <button type="reset" class="btn btn-dark" value='reset'>Reset</button> -->

                    </form>
                </div>
            </div>
        </div>




    </div>
   
    </div>



    <?php include_once('footer.php'); ?>


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