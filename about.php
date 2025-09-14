<?php
include 'partials/dbconnect.php';
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSeek | About</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/_footerc.css">
    <link rel="stylesheet" href="css/_navc.css">
    <link rel="stylesheet" href="css/about.css">
</head>
<body>
    
<?php include 'partial/_nav.php' ?>

    <section class="about-hero">
        <div class="container text-center">
            <h1>About JobSeek</h1>
            <p>Your trusted platform for finding the perfect job and connecting with top employers.</p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>At JobSeek, our mission is to bridge the gap between job seekers and employers by providing a seamless and efficient platform. We aim to empower individuals to achieve their career goals and help companies find the right talent to grow their businesses.</p>
                </div>
                <div class="col-md-6">
                    <h2>Why Choose Us?</h2>
                    <ul>
                        <li>Extensive job listings across various industries.</li>
                        <li>Trusted by top employers worldwide.</li>
                        <li>Easy-to-use platform with advanced search tools.</li>
                        <li>Dedicated to helping you succeed in your career.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="team">
        <div class="container text-center">
            <h2>Meet Our Team</h2>
            <p>Our team of dedicated professionals works tirelessly to ensure your success.</p>
            <div class="row">
                <div class="col-md-3">
                    <h4>Sanchit Garg</h4>
                    <p>Founder & CEO</p>
                </div>
                <div class="col-md-3">
                    <h4>Saurabh Jadhav</h4>
                    <p>Head of Operations</p>
                </div>
                <div class="col-md-3">
                    <h4>Arijeet Tripathi</h4>
                    <p>Lead Developer</p>
                </div>
                <div class="col-md-3">
                    <h4>Shlok Dadhich</h4>
                    <p>Lead Developer</p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
     <?php require 'partial/_footer.php' ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>