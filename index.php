<?php
include 'db_connection.php';

// Fetch the latest 4 products
$sql = "SELECT id,item_name, price, imgpath FROM seller_posts ORDER BY created_at DESC LIMIT 4";
$result = $conn->query($sql);
?>

<?php


// Fetch the latest farmer post
$farmer_post_query = "SELECT farmer_posts.*, farmers.full_name 
                      FROM farmer_posts 
                      INNER JOIN farmers ON farmer_posts.user_id = farmers.user_id 
                      ORDER BY farmer_posts.created_at DESC LIMIT 1";
$farmer_post_result = mysqli_query($conn, $farmer_post_query);
$farmer_post = mysqli_fetch_assoc($farmer_post_result);

// Fetch the latest expert post
$expert_post_query = "SELECT expert_posts.*, agriculture_experts.full_name 
                      FROM expert_posts 
                      INNER JOIN agriculture_experts ON expert_posts.user_id = agriculture_experts.user_id 
                      ORDER BY expert_posts.created_at DESC LIMIT 1";
$expert_post_result = mysqli_query($conn, $expert_post_query);
$expert_post = mysqli_fetch_assoc($expert_post_result);

// Fetch the latest researcher post
$researcher_post_query = "SELECT researcher_posts.*, researchers.full_name 
                          FROM researcher_posts 
                          INNER JOIN researchers ON researcher_posts.user_id = researchers.user_id 
                          ORDER BY researcher_posts.created_at DESC LIMIT 1";
$researcher_post_result = mysqli_query($conn, $researcher_post_query);
$researcher_post = mysqli_fetch_assoc($researcher_post_result);
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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
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
                    <h1 class="display-5 animated fadeIn mb-4">Growing <span class="text-primary">Together</span> for
                        a <span class="text-primary">Greener</span> Tomorrow</h1>
                    <p class="animated fadeIn mb-4 pb-2">Join our growing community of farmers, agriculture experts, and
                        researchers. Share your experiences, insights, and discoveries to help revolutionize agriculture
                        and support sustainable growth for the future.</p>
                    <a href="account.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Join Us</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <!-- <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <input type="text" class="form-control border-0 py-3" placeholder="Search">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3">
                                    <option selected>Farmer Experience</option>
                                    <option value="1">Expert Thoughts</option>
                                    <option value="2">Research Insights</option>
                                    <option value="3">Shop</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Resources for Farmers and Agricultural Innovators</h1>
                    <p>Discover useful websites and tools that empower farmers, researchers,
                        and agriculture enthusiasts. These resources provide valuable insights, services, and technology
                        to support sustainable farming and innovation across the agriculture sector.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://doa.gov.lk/">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Ministry of Agriculture</h6>
                                <span>agrimin.gov.lk</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="https://agrariandept.gov.lk/">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Agrarian Development</h6>
                                <span>agrariandept.gov.lk</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="https://www.meteo.gov.lk/index.php?lang=si">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Department of Meteorology</h6>
                                <span>www.meteo.gov.lk</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="http://www.hadabima.gov.lk/index.php/si/">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Hadabima Authority</h6>
                                <span>www.hadabima.gov.lk</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="https://www.ft.lk/agriculture/31">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-building.png" alt="Icon">
                                </div>
                                <h6>GoviLab Agritech</h6>
                                <span>Daily FT - GoviLab</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="https://www.fao.org/home/en/">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-neighborhood.png" alt="Icon">
                                </div>
                                <h6>FAO Sri Lanka Resources</h6>
                                <span>FAO in Sri Lanka</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="https://leap.unep.org/en">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-condominium.png" alt="Icon">
                                </div>
                                <h6>E-agriculture Sri Lanka </h6>
                                <span> Strategy</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3"
                            href="https://doa.gov.lk/other-useful-links-si/">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-luxury.png" alt="Icon">
                                </div>
                                <h6>More</h6>
                                <span>Useful links</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.png">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Empowering Agriculture Through Connection and Knowledge</h1>
                        <p class="mb-4">AgriNet brings together farmers, researchers, and experts to foster
                            collaboration and innovation in agriculture. By connecting people and sharing knowledge, we
                            help drive sustainable farming practices and improve the livelihood of farming communities.
                        </p>
                        <p><i class="fa fa-check text-primary me-3"></i>Expert Knowledge at Your Fingertips</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Collaborative Community</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tailored Resources for Every Role</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="blog.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Top Post Start -->



        <!-- Top Post End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Latest Insights and Updates</h1>
                            <p>Dive into the latest discussions, expert advice, and innovative ideas from our community.
                                Stay informed with posts from farmers, researchers, and agriculture experts, all working
                                together to shape the future of sustainable farming.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <a class="btn btn-primary py-3 px-5 mt-3" href="blog.php">See All</a>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">

                            <!-- Farmer Post Section -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="farmer_post.php?id=<?php echo $farmer_post['id']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo !empty($farmer_post['imgpath']) ? $farmer_post['imgpath'] : 'img/property-1.png'; ?>"
                                                alt="">
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Experience</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            <?php echo $farmer_post['full_name']; ?></div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2"
                                            href="farmer_post.php?id=<?php echo $farmer_post['id']; ?>"><?php echo $farmer_post['title']; ?></a>
                                    </div>
                                    <div class="d-flex border-top">
                                        <p style="padding: 15px;">
                                            <?php echo substr($farmer_post['experience_description'], 0, 150); ?>...</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Expert Post Section -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="expert_post.php?id=<?php echo $expert_post['id']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo !empty($expert_post['imgpath']) ? $expert_post['imgpath'] : 'img/property-2.png'; ?>"
                                                alt="">
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Experts</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            <?php echo $expert_post['full_name']; ?></div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2"
                                            href="expert_post.php?id=<?php echo $expert_post['id']; ?>"><?php echo $expert_post['topic']; ?></a>
                                    </div>
                                    <div class="d-flex border-top">
                                        <p style="padding: 15px;">
                                            <?php echo substr($expert_post['advice'], 0, 150); ?>...</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Researcher Post Section -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="research_post.php?id=<?php echo $researcher_post['id']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo !empty($researcher_post['imgpath']) ? $researcher_post['imgpath'] : 'img/property-3.png'; ?>"
                                                alt="">
                                        </a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Research</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            <?php echo $researcher_post['full_name']; ?></div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2"
                                            href="research_post.php?id=<?php echo $researcher_post['id']; ?>"><?php echo $researcher_post['research_title']; ?></a>
                                    </div>
                                    <div class="d-flex border-top">
                                        <p style="padding: 15px;">
                                            <?php echo substr($researcher_post['research_results'], 0, 150); ?>...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="blog.php">Browse More Articles</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Property List End -->


        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="img/agri_exp.jpg" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Contact With Our Certified Agent</h1>
                                    <p>Get expert guidance from our certified agriculture professionals. Whether you’re
                                        looking for advice on sustainable farming, product recommendations, or
                                        personalized solutions, our agents are here to help you every step of the way.
                                    </p>
                                </div>
                                <a href="tel:+94771234567" class="btn btn-primary py-3 px-4 me-2">Make A Call</a>
                                <a href="tel:+94771234567" class="btn btn-dark py-3 px-4"><i
                                        class="fa fa-phone-alt me-2"></i>+94 70
                                    234 3569
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Top Products</h1>
                    <p>Discover a selection of high-quality agricultural products tailored to meet the diverse needs of
                        farmers and experts alike.</p>
                </div>
                <div class="row g-4">

                    <?php
            if ($result->num_rows > 0) {
                // Output data for each product
                $delay = 0.1; // Initial delay for the animation
                while ($row = $result->fetch_assoc()) {
                    $imgpath = !empty($row['imgpath']) ? $row['imgpath'] : 'img/default.png'; // Default image if imgpath is missing
                    echo '
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="' . $delay . 's">
                        <a href="single_product.php?id=' . $row["id"] . '">
                            <div class="team-item rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="' . $imgpath . '" alt="">
                                </div>
                                <div class="text-center p-4 mt-3">
                                    <h5 class="fw-bold mb-0">' . $row["item_name"] . '</h5>
                                    <small>Rs. ' . $row["price"] . '</small>
                                </div>
                            </div>
                        </a>
                    </div>';
                    $delay += 0.2; // Increment delay for each product
                }
            } else {
                echo "<p>No products available.</p>";
            }

            $conn->close();
            ?>
                    <!-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/pr1.png" alt="">

                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Vegetable Fertilizer</h5>
                                <small>Rs. 900.00</small>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/pr2.png" alt="">

                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Harvest Booster</h5>
                                <small>Rs. 800.00</small>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/pr3.png" alt="">

                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Fruit Fertilizer</h5>
                                <small>Rs. 550.00</small>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/pr4.png" alt="">

                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Fert Booster</h5>
                                <small>Rs. 450.00</small>

                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Community Says!</h1>
                    <p>Hear from our valued farmers, experts, and researchers who are transforming agriculture with
                        AgriNet.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>AgriNet has been a game-changer for my farm. The advice from fellow farmers and experts
                                has helped me improve my crop yield, and I now feel more connected to a nice community.
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.png"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Nihal Jayasekara</h6>
                                    <small>Farmer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Through AgriNet, I’ve been able to share my findings with a wider audience and get
                                feedback from farmers and industry professionals.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.png"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Janith Perera</h6>
                                    <small>Researcher</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>AgriNet allows me to stay connected with both farmers and
                                researchers. The knowledge exchange here has inspired me to develop better solutions for
                                sustainable farming practices.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.png"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Chathura Madusanka</h6>
                                    <small>Entrepreneur</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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