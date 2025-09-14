<?php
    include 'partials/dbconnect.php';
    error_reporting();
    session_start();
    // Check if the user is logged in, if not then redirect to login page
    if (!isset($_SESSION["logn"]) || $_SESSION["logn"] !== true) {
        header("location: login.php");
        exit;
    }

	$successful = false; $error = false;
	$companyer = false; $salaryer = false; $discper = false; $titleer = false; $yrer = false; $locationer = false;
	if(isset($_POST['submit'])){
        $title = $_POST['title'];
		$company = $_POST['company'];
        $location = $_POST['location'];
		$discp = $_POST['discp'];
		$salary = $_POST['salary'];
		$yr = $_POST['yr'];

		if(empty($title)){
			$titleer = "Please enter your company name.";
		}
		elseif(empty($company)){
			$companyer = "Please enter the salary.";
		}
		elseif(empty($location)){
			$locationer = "Please enter the positions available.";
		}
		elseif(empty($discp)){
			$discper = "Please enter the job description.";
		}
		elseif(empty($salary)){
			$salaryer = "Please enter the skills needed.";
		}
		elseif(empty($yr)){
			$yrer = "Please enter the years contract is valid for.";
		}
		else{					
			$sql = "INSERT INTO `jobpost` (`title`, `company`, `location`, `salary`, `discp`, `leastyr`) VALUES ('$title', '$company', '$location', '$salary', '$discp', '$yr')";
            $result = mysqli_query($conn, $sql);
			if ($result) { $successful = true; }
            else { $error = true; }
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/_footerc.css">
        <link rel="stylesheet" href="css/_navc.css">
        <link rel="stylesheet" href="css/postjob.css">
		
	<title>JobSeek | Lets help you post a job</title>
</head>
<body>
    <?php include 'partial/_nav.php'; ?>
    <section class="jobpost-hero">
        <div class="container">
            <h1>Post a Job</h1>
            <p>Reach out to top talent by posting your job openings on JobSeek.</p>
        </div>
    </section>

    <?php
        if($successful){
            echo "
            <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                It's done, the job is posted.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

		if($error){
			echo "
			<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
				<strong> Oops! </strong> Something went wrong. Please try again.
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>";
		}
    ?>

    <section class="jobpost-form">
        <div class="container">
            <h2>Job Details</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter job title" autocomplete="off">
                    <small class="form-text form-label "> <?php
                        if($titleer){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$titleer.' </div>'; }
                    ?> </small>
                </div>
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter company name" autocomplete="off">
                    <small class="form-text form-label "> <?php
                                if($companyer){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$companyer.' </div>'; }
                    ?> </small>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter job location" autocomplete="off">
                    <small class="form-text form-label "> <?php
                        if($locationer){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$locationer.' </div>'; }
                    ?> </small>
                </div>
                <div class="mb-3">
                    <label for="jobDescription" class="form-label">Job Description (In not more then few words)</label>
                    <textarea class="form-control" id="discp" name="discp" rows="5" placeholder="Enter job description"></textarea>
                    <small class="form-text form-label "> <?php
                        if($discper){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$discper.' </div>'; }
                    ?> </small>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary range" autocomplete="off">
                    <small class="form-text form-label "> <?php
                        if($salaryer){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$salaryer.' </div>'; }
                    ?> </small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Minimum Number of years of contract:</span>
                    <input type="number" class="form-control" id="yr" name="yr" placeholder="Least years contract is valid for" autocomplete="off">
                    <small class="form-text form-label "> <?php
                        if($yrer){ echo ' <div style="color: #d32f2f; font-size: 15px;"> '.$yrer.' </div>'; }
                    ?> </small>
                </div>
                <input type="submit" value="Post Job" class="btn btn-primary" name="submit">
            </form>
        </div>
    </section>

    <?php include 'partial/_footer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>