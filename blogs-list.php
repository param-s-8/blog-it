<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
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
              <a href="index.html" class="text-black h2 mb-0">Mini Blog</a>
            </div>

            <div class="col-8 text-right">
              <nav class="site-navigation" role="navigation">
                <ul
                  class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0"
                >
                  <li><a href="category.html">Home</a></li>
                  <li><a href="category.html">Politics</a></li>
                  <li><a href="category.html">Tech</a></li>
                  <li><a href="category.html">Entertainment</a></li>
                  <li><a href="category.html">Travel</a></li>
                  <li><a href="category.html">Sports</a></li>
                  <li><a href="blog.html">Create Blog</a></li>
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
                  <h1 class="">List Of Blogs</h1>
                </div>
              </div>
            </div>
          </div>
          <table border="1" align="center" class="table">
            <thead class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Author</th>
              <th scope="col">Title</th>
              <th scope="col">Subtitle</th>
              <th scope="col">Intro</th>
              <th scope="col">Main</th>
              <th scope="col">Conclusion</th>
              <th scope="col">Additional Readings</th>
              <th scope="col">Tags</th>
              <th scope="col">Categories</th>
              <th scope="col">Edit Link</th>
              <th scope="col">View Link</th>
            </thead>
            <tbody>
            <?php
            $author = $_SESSION["user_id"];
            include_once('creds.php');
            if(!$conn){
                die("<br>Error in creating a connection: " . mysqli_connect_error());
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
                <th scope='row'>{$id}</th>
                <td>{$row['author']}</td>
                <td>{$row['title']}</td>
                <td>{$row['subtitle']}</td>
                <td>{$intro}</td>
                <td>{$main}...</td>
                <td>{$conclusion}</td>
                <td>{$row['additionalReadings']}</td>
                <td>{$row['tags']}</td>
                <td>{$row['categories']}</td>
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
