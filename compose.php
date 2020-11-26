<?php
  session_start();
  if (!isset($_SESSION['uemail'])){
    session_destroy();
    echo "<script>
    alert('Kindly LogIn to post a blog!');
    </script>";
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog-It</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

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
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
  <?php
      error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING) ;
      $author = $_SESSION["user_id"];
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      $blog_id = $queries['blog_id'];

      include_once('creds.php');
      if(!$conn){
          die("<br>Error in creating a connection: " . mysqli_connect_error());
      }else{

        $blog_query = mysqli_query($conn, "SELECT * FROM blogs WHERE id='$blog_id'")
          or die (mysqli_error($conn));

        $blog = mysqli_fetch_array($blog_query);

      }
        $title = isset($_POST['title']) ? trim($_POST['title']) : $blog['title'];
        $subtitle = isset($_POST['subtitle']) ? trim($_POST['subtitle']) : $blog['subtitle'];
        $intro = isset($_POST['intro']) ? trim($_POST['intro']): $blog['intro'];
        $main = isset($_POST['main']) ? trim($_POST['main']) : $blog['main'];
        $conclusion = isset($_POST['conclusion']) ? trim($_POST['conclusion']) : $blog['conclusion'];
        $additionalReadings = isset($_POST['additionalReadings']) ? trim($_POST['additionalReadings']) : $blog['additionalReadings'];
        $tags = isset($_POST['tags']) ? trim($_POST['tags']) : $blog['tags'];
        $categories = isset($_POST['categories']) ? $_POST['categories']: explode(',',$blog['categories']);
        
        $errTitle = $errSubtitle = $errIntro = $errMain = $errConclusion = $errAdditionalReadings = $errTags = $errCategories = $errPic='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST['title']))){
                $errTitle = 'Title is required!';
            }

            if (empty(trim($_POST['subtitle']))){
              $errSubtitle = 'Subtitle is required!';
            }

            if (empty(trim($_POST['intro']))){
              $errIntro = 'Intro is required!';
            }else {
              if(strlen($_POST['intro']) > 100){
                $errIntro = 'Intro can be maximum 100 characters!';
              }
            }

            if (empty(trim($_POST['main']))){
              $errMain = 'Main is required!';
            }

            if (empty(trim($_POST['conclusion']))){
              $errConclusion = 'Conclusion is required!';
            }else {
              if(strlen($_POST['conclusion']) > 100){
                $errConclusion = 'Conclusion can be maximum 100 characters!';
              }
            }

            if (empty(trim($_POST['additionalReadings']))){
              $errAdditionalReadings = 'AdditionalReadings is required!';
            }else {
              if(!filter_var($_POST['additionalReadings'], FILTER_VALIDATE_URL)){
                $errAdditionalReadings = 'please provide a valid url!';
              }
            }

            if (empty(trim($_POST['tags']))){
              $errTags = 'Tags are required!';
            }

            if (!isset($_POST['categories'])){
              $errCategories = 'Categories are required!';
            }else {
              if(count($_POST['categories']) < 2){
                $errCategories = "please select atleast 2 categories";
              }else {
                $categories = implode(',', $categories);
              }
            }


             $imgName = $_FILES['blogpic']['name'];
             $target_dir = "media/blogpics/";
             $target_path = $target_dir.basename($_FILES["blogpic"]["name"]);
             $uploadOk = 1;
             $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // // Check if file already exists
             if (file_exists($target_file)) {
               $errPic = "Sorry, file already exists.";
               $uploadOk = 0;
             }

            // // Check file size
             if ($_FILES["blogpic"]["size"] > 1000000) {
               $errPic = "Sorry, your file is too large.";
               $uploadOk = 0;
            }


            
            if(($errPic == '')&&($errTitle == '') && ($errSubtitle == '') && ($errIntro == '') && ($errMain == '') && ($errConclusion == '') && ($errAdditionalReadings == '') && ($errTags == '') && ($errCategories == '')){
              include_once('creds.php');
                if(!$conn){
                    die("<br>Error in creating a connection: " . mysqli_connect_error());
                }else{

                   $imgName = strtolower($_SESSION['user_id']).$imgName;

                   if ($uploadOk == 0) {
                     echo "<script>alert('Sorry, your file was not uploaded.');</script>";
                   // if everything is ok, try to upload file
                   } else {
                     if (move_uploaded_file($_FILES["blogpic"]["tmp_name"], $target_dir.$imgName)) {
                       $uploadOk = 1;
                     } else {
                       echo "<script>alert('Sorry there was an error uploading your file.')</script>";
                     }
                   }



                  $final = '';
                    foreach($categories as $select){
                          $final .= $select;
                          $final .= ' ';
                    }

                    if(isset($_POST['submit'])){
                      $query = '';
                        echo "blog id" . $blog_id;
                        if($blog_id == false){
                          $blog_id = $_POST['blog_id'];
                          $query = "UPDATE blogs SET title='$title', subtitle='$subtitle', intro='$intro', main='$main', conclusion='$conclusion', additionalReadings='$additionalReadings', tags='$tags', categories='$categories' WHERE id='$blog_id'";
                          if(mysqli_query($conn,$query)){
                            echo "Records updated successfully.<br><br><a href=\"blogs-list.php\">Show Data</a>";
                          }else{
                              echo "<script>
                                  alert('A problem occurred while posting blog! ');
                                  </script>";
                          }
                        }else{
                          $query = "INSERT INTO blogs (author, title, subtitle, intro, main, conclusion, additionalReadings, tags, categories) VALUES('$author', '$title','$subtitle','$intro','$main','$conclusion','$additionalReadings','$tags','$categories')";
                          if(mysqli_query($conn,$query)){
                            $query2 = "SELECT id FROM blogs WHERE author='$author' AND title='$title'";
                            if(mysqli_query($conn,$query2)){

                              $bid = mysqli_fetch_assoc(mysqli_query($conn,$query2));
                              $bid = $bid['id'];
                              $uid = $_SESSION['user_id'];
                              $query3 = "INSERT INTO blogimg( userid, blogid, name) VALUES('$uid', $bid ,'$imgName' )";
                              if(mysqli_query($conn,$query3)){
                                echo "Record inserted successfully.<br><br><a href=\"blogs-list.php\">Show Data</a>";
                              }else{
                                echo "<script>
                                    alert('Blogimg database problem! ');
                                    </script>";
                              }
                            }else{
                              echo "<script>
                                    alert('Blogimg database problemmmmmmmmmm! ');
                                    </script>";
                            }
                          }else{
                              echo "<script>
                                  alert('A problem occurred while posting bloggg ');
                                  </script>";
                          }
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
        <div class="container">
          <div class="container">
            <div class="row same-height justify-content-center">
              <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                  <h1 class=""><?php echo isset($blog_id) ? "Update Blog" : "Publish A Blog" ?></h1>
                </div>
              </div>
            </div>
          </div>
          <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" >
            <h3>Header</h3>
            <div class="form-group">
              <label for="inputTitle">Title</label>
              <input
                type="text"
                name="title"
                class="form-control"
                id="inputTitle"
                placeholder="Your Title goes here..."
                value='<?php echo $title; ?>'
              />
              <span class="text-danger"><?php echo $errTitle;?></span>
            </div>
            <div class="form-group">
              <label for="inputSubtitle">Subtitle</label>
              <input
                type="text"
                name="subtitle"
                class="form-control"
                id="inputSubtitle"
                placeholder="your subtitle goes here ..."
                value='<?php echo $subtitle; ?>'
              />
              <span class="text-danger"><?php echo $errSubtitle;?></span>
            </div>
            <h3>Body</h3>
            <div class="form-group">
              <label for="intro">Introductory Paragraph</label>
              <textarea
                class="form-control"
                id="intro"
                name="intro"
                rows="3"
                placeholder="Please keep it short. max limit: 100 char"
              ><?php echo $intro; ?></textarea>
              <span class="text-danger"><?php echo $errIntro;?></span>
              <label for="main">Main Body</label>
              <textarea
                class="form-control"
                name="main"
                id="main"
                rows="6"
                placeholder="put your blog body here"
              ><?php echo $main; ?></textarea>
              <span class="text-danger"><?php echo $errMain;?></span>
              <label for="conclusion">Conclusions</label>
              <textarea
                class="form-control"
                id="conclusion"
                name="conclusion"
                rows="3"
                placeholder="Your conclusions go here. max limit: 100 char"
              ><?php echo $conclusion; ?></textarea>
              <span class="text-danger"><?php echo $errConclusion;?></span>
            </div>
            <h3>Footer</h3>
            <div class="form-row">
              <label for="basic-url">Additional Readings: </label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                </div>
                <input
                  name="additionalReadings"
                  type="text"
                  class="form-control"
                  id="basic-url"
                  aria-describedby="basic-addon3"
                  value='<?php echo $additionalReadings; ?>'
                />
                <span class="text-danger"><?php echo $errAdditionalReadings;?></span>
              </div>
            </div>
            <br /><br />
            <h3>Tags and categories</h3>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="tags">Tags</label>
                <input
                  name="tags"
                  type="text"
                  data-role="tagsinput"
                  placeholder="Add tags by putting ,"
                  value='<?php echo $tags ?>'
                />
                <span class="text-danger"><?php echo $errTags;?></span>
              </div>
              <div class="form-group col-md-4">
                <label for="categories">Categories</label>
                <select class="form-control multipicker" id="categories" name="categories[]" type="text" multiple>
                  <option <?php echo in_array("nature", $categories) ? " selected=\"selected\"" : "" ?> value='nature'>Nature</option>
                  <option <?php echo in_array("travel", $categories) ? " selected=\"selected\"" : "" ?> value='travel'>Travel</option>
                  <option <?php echo in_array("politics", $categories) ? " selected=\"selected\"" : "" ?> value='politics'>Politics</option>
                  <option <?php echo in_array("sports", $categories) ? " selected=\"selected\"" : "" ?> value='sports'>Sports</option>
                  <option <?php echo in_array("tech", $categories) ? " selected=\"selected\"" : "" ?> value='tech'>Tech</option>
                </select>
                <span class="text-danger"><?php echo $errCategories;?></span>
              </div>
              <div class="form-group col-md-4">
                <label for="blogpic">Blog Image</label>
                <input type='file' class='form-control-file' name='blogpic' id='blogpic'>
                <span class="text-danger"><?php echo $errPic;?></span>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck"
                />
                <label class="form-check-label" for="gridCheck">
                  Agree to terms and conditions
                </label>
              </div>
            </div>
            <input type="hidden" name="blog_id" value=<?php echo $blog_id; ?>>
            <button name="submit" type="submit" class="btn btn-primary" value='Submit'><?php echo isset($blog_id) ? "Update" : "Publish" ?></button>
          </form>
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
  </body>
</html>
