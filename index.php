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
      <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            $page = $queries['page'];
            if($page == false){
              $page = 1;
            }
            $author = $_SESSION["user_id"];
            include_once('creds.php');
            if(!$conn){
                die("<br>Error in creating a connection: " . mysqli_connect_error());
            }else{
            $offset = ($page - 1) * 6;
            $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author<>'$author' ORDER BY updated_at DESC LIMIT $offset,6")
              or die (mysqli_error($conn));
            $index = 0;
            while( $row = mysqli_fetch_assoc( $query)){
                $blogs[$index] = $row;
                $index = $index + 1;
            }


            $result = mysqli_query($conn, "SELECT count(1) FROM blogs WHERE author<>'$author'")
              or die (mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            $total = $row[0];


            function categoryColor($cat)
            {
            if (strcasecmp($cat,"NATURE") == 0)
              {
              return 'post-category bg-success text-white mb-3';
              }elseif (strcasecmp($cat,"POLITICS") == 0) {
                return 'post-category bg-danger text-white mb-3';
              }elseif (strcasecmp($cat,"TRAVEL") == 0) {
                return 'post-category bg-warning text-white mb-3';
              }elseif (strcasecmp($cat,"SPORTS") == 0) {
                return 'post-category bg-primary text-white mb-3';
              }elseif (strcasecmp($cat,"TECH") == 0) {
                return 'post-category bg-light text-black mb-3';
              }elseif (strcasecmp($cat,"FASHION") == 0) {
                return 'post-category bg-info text-white mb-3';
              }else{
                return 'post-category bg-black text-white mb-3';
              }
            }
 
          }
            ?>
      <div class="site-section bg-light">
        <div class="container">
          <div class="row align-items-stretch retro-layout-2">
            <?php
            $id = $blogs[0]['id'];
            $title = $blogs[0]['title'];
            $updatedAt = $blogs[0]['updated_at'];
            echo "<div class=\"col-md-4\">
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"h-entry mb-30 v-height gradient\"
                style=\"background-image: url('images/img_1.jpg')\"
              >
                <div class=\"text\">
                  <h2>$title</h2>
                  <span class=\"date\">$updatedAt</span>
                </div>
              </a>";
            $id = $blogs[1]['id'];
            $title = $blogs[1]['title'];
            $updatedAt = $blogs[1]['updated_at'];
              echo "
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"h-entry v-height gradient\"
                style=\"background-image: url('images/img_2.jpg')\"
              >
                <div class=\"text\">
                  <h2>$title</h2>
                  <span class=\"date\">$updatedAt</span>
                </div>
              </a>
            </div>";
            $id = $blogs[2]['id'];
            $title = $blogs[2]['title'];
            $updatedAt = $blogs[2]['updated_at'];
            $categories = explode(',',$blogs[2]['categories']);
            echo "
            <div class=\"col-md-4\">
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"h-entry img-5 h-100 gradient\"
                style=\"background-image: url('images/img_v_1.jpg')\"
              >
                <div class=\"text\">
                  <div class=\"post-categories mb-3\">";
                  foreach ($categories as $category) {
                    $class = categoryColor($category);
                    echo "<span class='$class'>$category</span> ";
                  }
                  echo "</div>
                  <h2>$title</h2>
                  <span class=\"date\">$updatedAt</span>
                </div>
              </a>
            </div>";
            $id = $blogs[3]['id'];
            $title = $blogs[3]['title'];
            $updatedAt = $blogs[3]['updated_at'];
            echo "
            <div class=\"col-md-4\">
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"h-entry mb-30 v-height gradient\"
                style=\"background-image: url('images/img_3.jpg')\"
              >
                <div class=\"text\">
                  <h2>$title</h2>
                  <span class=\"date\">$updatedAt</span>
                </div>
              </a>";
            $id = $blogs[0]['id'];
            $title = $blogs[0]['title'];
            $updatedAt = $blogs[0]['updated_at'];
            echo "
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"h-entry v-height gradient\"
                style=\"background-image: url('images/img_4.jpg')\"
              >
                <div class=\"text\">
                  <h2>$title</h2>
                  <span class=\"date\">$updatedAt</span>
                </div>
              </a>
            </div>";
            ?>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-12">
              <h2>Recent Posts</h2>
            </div>
          </div>
          <div class="row">
            <?php
            $i = 1;
            foreach($blogs as $blog) {
              $id = $blog['id'];
              $author = $blog['author'];
              $title = $blog['title'];
              $subtitle = $blog['subtitle'];
              $intro = $blog['intro'];
              $main = $blog['main'];
              $conclusion = $blog['conclusion'];
              $additionalReadings = $blog['additionalReadings'];
              $tags = explode(',',$blog['tags']);
              $categories = explode(',',$blog['categories']);
              $created_at = $blog['created_at'];
              $updated_at = $blog['updated_at'];

              $q_bi = mysqli_query($conn,"SELECT * FROM blogimg WHERE blogid=$id and userid='$author'") or die(mysqli_error($conn));
              if(mysqli_num_rows($q_bi)==1){
                $row = mysqli_fetch_assoc($q_bi);
                $src = 'media/blogpics/'.$row['name'];
                
              }else{
                $query = mysqli_query($conn,"SELECT * FROM blogimg WHERE blogid=$id and userid='$author' ORDER BY id DESC") or die (mysqli_error($conn));
                $row = mysqli_fetch_assoc($query);
                $src = 'media/blogpics/'.$row['name'];
              }

              $sessid = $_SESSION['user_id'];
              $query = mysqli_query($conn,"SELECT * FROM proimg WHERE userid='$author'") or die (mysqli_error($conn));
              if(mysqli_num_rows($query)==1){
                $row = mysqli_fetch_assoc($query);
                $srcdp = 'media/propics/'.$row['name'];
              }else{
                $query = mysqli_query($conn,"SELECT * FROM proimg WHERE userid='$sessid' ORDER BY id DESC") or die (mysqli_error($conn));
                $row = mysqli_fetch_assoc($query);
                $srcdp = 'media/propics/'.$row['name'];
              }

                          // fetching the author
              $author_query = mysqli_query($conn, "SELECT fname,lname,email FROM registered_users WHERE user_id='$author'")
                or die (mysqli_error($conn));
                
              $author_data = mysqli_fetch_array($author_query);
              $author = $author_data['fname'];
              $author_lname = $author_data['lname'];
              $author_email = $author_data['email'];
              echo " 
              <div class=\"col-lg-4 mb-4\">
                <div class=\"entry2\">
                  <a href=\"blog.php?blog_id=$id\"
                    ><img
                      src=\"$src\"
                      alt=\"Image\"
                      class=\"img-fluid rounded\"
                  /></a>
                  <div class=\"excerpt\">";
                  foreach ($categories as $category) {
                    $class = categoryColor($category);
                    echo "<span class='$class'>$category</span> ";
                  }
  
                    echo " <h2>
                      <a href=\"blog.php?blog_id=$id\"
                        >$title</a
                      >
                    </h2>
                    <div class=\"post-meta align-items-center text-left clearfix\">
                      <figure class=\"author-figure mb-0 mr-3 float-left\">
                        <img
                          src=\"$srcdp\"
                          alt=\"Image\"
                          class=\"img-fluid\"
                        />
                      </figure>
                      <span class=\"d-inline-block mt-1\"
                        >By <a href=\"#\">$author</a></span
                      >
                      <span>&nbsp;-&nbsp; $updated_at</span>
                    </div>
  
                    <p>
                      $intro
                    </p>
                    <p><a href=\"blog.php?blog_id=$id\">Read More</a></p>
                  </div>
                </div>
              </div>
              ";
              $i++;
              if($i > 10){
                $i = 0;
              }
            }
            
            ?>
          </div>
          <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
              <div class="custom-pagination">
                <?php 
                for($pageI = 0; $pageI < $total; $pageI+=6 ){
                  $p = $pageI + 1;
                  echo "<a href=\"index.php?page=$p\">$p</a>";
                }
                ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row align-items-stretch retro-layout">
          <?php

            include_once('creds.php');
            if(!$conn){
                die("<br>Error in creating a connection: " . mysqli_connect_error());
            }else{
            $offset = ($page - 1) * 6;
            $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author<>'$author' AND categories LIKE '%travel%' ORDER BY updated_at DESC LIMIT 1,1")
              or die (mysqli_error($conn));
            $blog = mysqli_fetch_array($query);
            if($blog != false){
              $id = $blog['id'];
              $title = $blog['title'];
              $updated_at = $blog['updated_at'];
              echo "<div class=\"col-md-5 order-md-2\">
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"hentry img-1 h-100 gradient\"
                style=\"background-image: url('images/img_4.jpg')\"
              >
                <span class=\"post-category text-white bg-danger\">Travel</span>
                <div class=\"text\">
                  <h2>$title</h2>
                  <span>$updated_at</span>
                </div>
              </a>
              </div>";
            }
            }
            ?>
            
            <?php

            include_once('creds.php');
            if(!$conn){
                die("<br>Error in creating a connection: " . mysqli_connect_error());
            }else{
            $offset = ($page - 1) * 6;
            $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author<>'$author' AND categories LIKE '%nature%' ORDER BY updated_at DESC LIMIT 1,1")
              or die (mysqli_error($conn));
            $blog = mysqli_fetch_array($query);
            if($blog != false){
              $id = $blog['id'];
              $title = $blog['title'];
              $updated_at = $blog['updated_at'];
              echo "<div class=\"col-md-7\">
              <a
                href=\"blog.php?blog_id=$id\"
                class=\"hentry img-2 v-height mb30 gradient\"
                style=\"background-image: url('images/img_1.jpg')\"
              >
                <span class=\"post-category text-white bg-success\">Nature</span>
                <div class=\"text text-sm\">
                  <h2>$title</h2>
                  <span>$updated_at</span>
                </div>
              </a>
              ";
            }
            }
            ?>


              <div class="two-col d-block d-md-flex">
              <?php

              include_once('creds.php');
              if(!$conn){
                  die("<br>Error in creating a connection: " . mysqli_connect_error());
              }else{
              $offset = ($page - 1) * 6;
              $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author<>'$author' AND categories LIKE '%sports%' ORDER BY updated_at DESC LIMIT 1,1")
                or die (mysqli_error($conn));
              $blog = mysqli_fetch_array($query);
              if($blog != false){
                $id = $blog['id'];
                $title = $blog['title'];
                $updated_at = $blog['updated_at'];
                echo "
                <a
                  href=\"blog.php?blog_id=$id\"
                  class=\"hentry v-height img-2 gradient\"
                  style=\"background-image: url('images/img_2.jpg')\"
                >
                  <span class=\"post-category text-white bg-primary\">Sports</span>
                  <div class=\"text text-sm\">
                    <h2>$title</h2>
                    <span>$updated_at</span>
                  </div>
                </a>
                ";
              }
              }
              ?>
              <?php

                include_once('creds.php');
                if(!$conn){
                    die("<br>Error in creating a connection: " . mysqli_connect_error());
                }else{
                $offset = ($page - 1) * 6;
                $query = mysqli_query($conn, "SELECT * FROM blogs WHERE author<>'$author' AND categories LIKE '%lifestyle%' ORDER BY updated_at DESC LIMIT 1,1")
                  or die (mysqli_error($conn));
                $blog = mysqli_fetch_array($query);
                if($blog != false){
                  $id = $blog['id'];
                  $title = $blog['title'];
                  $updated_at = $blog['updated_at'];
                  echo "
                  <a
                    href=\"blog.php?blog_id=$id\"
                    class=\"hentry v-height img-2 ml-auto gradient\"
                    style=\"background-image: url('images/img_3.jpg')\"
                    >
                    <span class=\"post-category text-white bg-warning\">LifeStyle</span>
                    <div class=\"text text-sm\">
                      <h2>$title</h2>
                      <span>$updated_at</span>
                    </div>
                  </a>
                  ";
                }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-lightx">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-5">
              <div class="subscribe-1">
                <h2>Subscribe to our newsletter</h2>
                <p class="mb-5">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                  nesciunt error illum a explicabo, ipsam nostrum.
                </p>
                <form action="#" class="d-flex">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter your email address"
                  />
                  <input
                    type="submit"
                    class="btn btn-primary"
                    value="Subscribe"
                  />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include_once('footer.php'); ?>

      
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
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
