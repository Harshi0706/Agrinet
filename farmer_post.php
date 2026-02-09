<?php
require 'db_connection.php';

// Get the post ID from the URL
$post_id = $_GET['id'] ?? null;

if ($post_id) {
    // Fetch the post from the database
    $query = "SELECT farmer_posts.*, farmers.full_name 
              FROM farmer_posts 
              INNER JOIN farmers ON farmer_posts.user_id = farmers.user_id 
              WHERE farmer_posts.id = $post_id";
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
    } else {
        header("Location: 404.html");
    exit();
    }
} else {
    header("Location: 404.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AgriNet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/agrinet.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">AgriNet</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="index.php#about" class="nav-item nav-link">About</a>
                        <a href="blog.php" class="nav-item nav-link">Blog</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="account.php" class="nav-item nav-link">Account</a>
                    </div>
                    <div>
                        <a href="shop.php">
                            <a href="shop.php" class="btn btn-primary px-3 d-none d-lg-flex">Shop</a>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><?php echo $post['title']; ?></h1>
                    <ul>
                        <li>
                            <h5 class="animated fadeIn">Crop Type: <?php echo $post['crop_type']; ?></h5>
                        </li>
                        <li>
                            <h5 class="animated fadeIn">Farm Size: <?php echo $post['farm_size']; ?> ha</h5>
                        </li>
                        <li>
                            <h5 class="animated fadeIn">Location: <?php echo $post['farm_location']; ?></h5>
                        </li>
                    </ul>
                    <hr>
                    <h6>by</h6>
                    <h5><?php echo $post['full_name']; ?></h5>
                    <p>Date: <?php echo date('d/m/Y', strtotime($post['created_at'])); ?></p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid"
                        src="<?php echo !empty($post['imgpath']) ? $post['imgpath'] : 'img/property-1.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                </div>
            </div>
        </div>
        <!-- Search End -->

        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">

                </div>

                <div class="tab-content">
                    <h4>Weather Conditions</h4>
                    <p><?php echo $post['weather_conditions']; ?></p>
                    <hr>
                    <h4>Problem</h4>
                    <p><?php echo $post['problem_description']; ?></p>
                    <hr>
                    <h4>Solution</h4>
                    <p><?php echo $post['solution_description']; ?></p>
                    <hr>
                    <h4>Overall Experience</h4>
                    <p><?php echo $post['experience_description']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-4" style="padding-left: 50px;">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, Colombo,Sri Lanka</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>011 345 6789</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@agrinet.com</p>

                </div>
                <div class="col-lg-3 col-md-4" style="padding-left: 60px;">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link text-white-50" href="index.php#about">About Us</a>
                    <a class="btn btn-link text-white-50" href="contact.html">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="">Our Services</a>
                    <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                    <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white mb-4">Follow Us</h5>

                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white mb-4">Agrinet</h5>
                    <p class="btn btn-link text-white-50"> &copy; <a class="border-bottom" href="#">AgriNet</a>
                        <br>All Rights Reserved.
                    </p>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>