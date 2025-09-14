<?php
    include 'partials/dbconnect.php';
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSeek | Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/_footerc.css">
    <link rel="stylesheet" href="css/_navc.css">
</head>
<body>
    <?php include 'partial/_nav.php' ?>
    <div>
    
    <?php
    if(isset($_GET['login'])){
        if($_GET['login'] == 'true'){
            echo "
            <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                <strong> Congratulations! </strong> You have successfully logged in , now you may proceed.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    ?>

    <section class="hero">
        <div class="container text-center">
            <h1>Find Your Dream Job</h1>
            <p>Connecting job seekers with top employers. Start your journey today!</p>
            <a href="jobs.php" class="btn btn-primary" style="float:right;">Get Started</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-briefcase fa-3x"></i>
                    <h3>Job Listings</h3>
                    <p>Explore thousands of job opportunities across various industries.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-user-tie fa-3x"></i>
                    <h3>Top Employers</h3>
                    <p>Connect with reputable companies looking for talented individuals.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-chart-line fa-3x"></i>
                    <h3>Career Growth</h3>
                    <p>Take your career to the next level with our resources and tools.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'partial/_footer.php' ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
