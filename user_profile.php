<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog-IT</title>

    <!--CSS & Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

  <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING) ;
        
        $errFname = $errLname = $errEmail = $errNum = $errPref = '';
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

            if(($errFname == '')&&($errLname == '')&&($errEmail == '')&&($errNum == '')&&($errPref == '')){
                /* include_once('regInsert.php'); */
                include_once('creds.php');
                if(!$conn){
                    die("<br>Error in creating a connection: " . mysqli_connect_error());
                }else{
                    
                    if(isset($_POST['submit'])){
                        $sess_id = $_SESSION['user_id'];
                        

                        $query = "UPDATE registered_users SET fname = '$fname' , lname = '$lname' , email = '$email', 
                        number = $num WHERE user_id='$sess_id' ";
                        
                        if(mysqli_query($conn,$query)){
                            echo "<script>
                                alert('Profile updated succesfully!');
                              </script>";
                             
                            $_SESSION['uemail'] = $email;
                            $_SESSION['ufname'] = $fname;
                            $_SESSION['ulname'] = $lname;
                            $_SESSION['unumber'] = $num;
                            $_SESSION['upref'] = $final;

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
              <a href="index.php" class="text-black h2 mb-0">Blog-It</a>
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
                  <?php
                    if(isset($_SESSION['user_id'])){
                      echo "<li><a href='logout.php'>Log Out</a></li>";
                      echo "<li class='disabled'><a href='user_profile.php'>"."Hello, ".$_SESSION['ufname']."</a></li>";
                    }else{
                      echo "<li><a href='login.php'>Log In</a></li>";
                    }
                  ?>
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
        <div class="container">
    
    <!-- Breadcrumb -->
    <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </nav> -->
    <!-- /Breadcrumb -->

            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        <?php
                          include_once('creds.php');
                          if(!$conn){
                            die("<br>Error in creating a connnection: " . mysqli_connect_error());
                          }else{
                            if (isset($_SESSION['ufname'])){
                              $sessid = $_SESSION['user_id'];
                              $query = mysqli_query($conn,"SELECT * FROM proimg WHERE userid='$sessid'") or die (mysqli_error($conn));
                              if(mysqli_num_rows($query)==1){
                                $row = mysqli_fetch_assoc($query);
                                $src = 'media/propics/'.$row['name'];
                                echo "<img src=$src alt='Admin' class='rounded-circle' width='150'>";
                              }
                            }
                          }
                        ?>
                        <div class="mt-3">
                            <h4><?php echo $_SESSION['ufname']." ". $_SESSION['ulname']; ?></h4>
                            <p class="text-secondary mb-1"><?php echo $_SESSION['uemail']; ?></p>
                            <p class="text-muted font-size-sm">Total Blogs Published: </p>
                            <!-- <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-primary">Message</button> -->
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">https://bootdey.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">@bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">bootdey</span>
                        </li>
                    </ul>
                    </div>

                </div>

                <div class="col-md-8">
                  
                    <div class="card mb-3">
                      <div class="card-body">
                        <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="John"
                                  value = "<?php echo $_SESSION['ufname'];?>"
                                >
                                <span class='text-danger'><?php echo $errFname;?></span>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Doe"
                              value = "<?php echo $_SESSION['ulname'];?>"
                            >
                            <span class='text-danger'><?php echo $errLname;?></span>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input type="email" class="form-control" id="email" name="email" placeholder="abc@example.com"
                                value = "<?php echo $_SESSION['uemail'];?>"
                              >
                              <span class='text-danger'><?php echo $errEmail;?></span>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Contact Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input type="number" class="form-control" id="conNo" name="conNo" placeholder="Enter contact number" 
                              value = "<?php echo $_SESSION['unumber'];?>"
                              >
                              <span class='text-danger'><?php echo $errNum;?></span> 
                            </div>
                          </div>
                          <!-- <hr>
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Profile Picture</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <input type="file" class="form-control-file" id="propic" name="propic" 
                              >
                              <span class='text-danger'><?php echo $errNum;?></span> 
                            </div>
                          </div> -->
                          <!-- <hr>
                          <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <select class="form-control multipicker" id="prefer" name="prefer[]" type="text" multiple>
                                <option value='nature' selected>Nature</option>
                                <option value='travel'>Travel</option>
                                <option value='politics'>Politics</option>
                                <option value='sports'>Sports</option>
                                <option value='tech'>Tech</option>
                              </select>
                              <span class='text-danger'><?php echo $errPref;?></span>
                            </div>
                          </div> -->
                          <hr>
                          <div class="row">
                          <input type="submit" class="btn btn-success ml-3" value='Save Changes' name='submit'>
                          </div>
                        </form>
                      </div>
                    </div>

                  <div class='row'>
                    <div class='col-md-12'>

                    <table border="1" align="center" class="table">
            <thead class="thead-dark">
              <!-- <th scope="col">#</th> -->
              <!-- <th scope="col">Author</th> -->
              <th scope="col">Title</th>
              <!-- <th scope="col">Subtitle</th> -->
              <!-- <th scope="col">Intro</th> -->
              <th scope="col">Main</th>
              <!-- <th scope="col">Conclusion</th> -->
              <!-- <th scope="col">Additional Readings</th> -->
              <th scope="col">Tags</th>
              <!-- <th scope="col">Categories</th> -->
              <th scope="col">Edit Blog</th>
              <th scope="col">View Blog</th>
            </thead>
            <tbody>
            <?php
            $author = $_SESSION["user_id"];
            include_once('creds.php');
            if(!$conn){
                die("<br>Error in creating a connectionn: " . mysqli_connect_error());
            }else{

            $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author='$author'")
              or die (mysqli_error($conn));

            while ($row = mysqli_fetch_array($query)) {
              $main = substr($row['main'],0,50);
              $intro = substr($row['intro'],0,50);
              $conclusion = substr($row['conclusion'],0,50);
              $id = $row['id'];
              // $categories = implode(',', $row['categories']);
              echo
              "<tr>
                <td>{$row['title']}</td>
                <td>{$main}...</td>
                <td>{$row['tags']}</td>
                <td><a href=\"compose.php?blog_id=$id\" class=\"btn btn-success btn-lg active\" role=\"button\" aria-pressed=\"true\">Update Blog</a></td>
                <td><a href=\"blog.php?blog_id=$id\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">View Blog</a></td>
              </tr>\n";
            }
          }
            ?>
            </tbody>
            </table>

                    </div>
                  </div>
                  

                    
                    <!-- <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                            <small>Web Design</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Website Markup</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>One Page</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Mobile Template</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Backend API</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                            <small>Web Design</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Website Markup</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>One Page</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Mobile Template</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Backend API</small>
                            <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div> -->
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

    