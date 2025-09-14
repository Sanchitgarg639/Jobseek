<?php
include 'partials/dbconnect.php';
error_reporting(0);
session_start();
?>


<?php
$error = false; $successful = false;
if (isset($_GET['aid'])) {
    $jobid = $_GET['aid'];
    $usernum = $_SESSION['userphone'];
        $sql = "SELECT * FROM applied WHERE user_num = '$usernum' AND job_id = '$jobid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
             // Already applied for this job
             echo "<script>alert('You have already applied for this job.');</script>"
             . "<script>window.location.href='jobs.php';</script>";
        } else {
            $query ="INSERT INTO `applied`(`user_num`, `job_id`) VALUES ('$usernum','$jobid')";
            $result = mysqli_query($conn, $query);
            if ($result) { $successful = true; }
            else { $error = true; }
        }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/_footerc.css">
        <link rel="stylesheet" href="css/_navc.css">
        <link rel="stylesheet" href="css/jobc.css">
     
        <title>JobSeek | Find the jobs you needed, here!</title>
</head>
<body>
<?php include 'partial/_nav.php' ?>
<!--LOGIN Modal -->
<div class="modal fade" id="loginmodel" tabindex="-1" aria-labelledby="loginmodel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodel">Login to JobSeek.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Login or Signup to JobSeek to apply for the jobs. <br>
            </div>
            <div class="modal-footer">
                <a href="login.php" class="btn btn-primary">Log-in</a>
                <a href="signup.php" class="btn btn-primary">Sign-up</a>
            </div>
        </div>
    </div>
</div>

<!-- Make sure he clicked right
<div class="modal fade" id="makeSureModal" tabindex="-1" aria-labelledby="makeSureModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="makeSureModal">CONFIRM TO APPLY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Please confirm if you want to apply for this job or not. <br>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-apply" id="confirm">I Confirm</button>
            </div>
        </div>
    </div>
</div> -->

<section class="jobpost-hero">
    <div class="container">
        <h1>Available Job Postings</h1>
        <p>Explore the latest job opportunities and apply now!</p>
    </div>
</section>

    <!-- Searchbar -->
    <div class="searchdiv1">
        <a href="search.php"><input class="searchbar" type="text" name="searchbar" placeholder="Search for the jobs you think fits your attire..." autocomplete="off"></a>
        <a href="search.php">
			<button class="searchbutton">
        		<i class="fas fa-search"></i>
        	</button>
		</a>
	</div>
    <?php
        // Something went wrong
        if($successful){
            echo "
            <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                <strong>Success!</strong> You have applied for the job successfully.
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
    
    <?php
    $sql = "SELECT * FROM applied WHERE user_num = '".$_SESSION['userphone']."'"; // Example SQL query to fetch applied jobs
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="heading"> Applied for: </div>';
        while ($data = mysqli_fetch_assoc($result)) {
            $jobid = $data['job_id'];
            $jobquery = "SELECT * FROM jobpost WHERE id = '$jobid'";
            $jobresult = mysqli_query($conn, $jobquery);
            if (mysqli_num_rows($jobresult) > 0) {
                while ($jobdata = mysqli_fetch_assoc($jobresult)) {
                    echo '<div class="job-container">
                        <div class="container">
                            <div class="row">
                                    <div class="job-card">
                                        <h3>'.$jobdata['title'].'</h3>
                                        <p>Company: '.$jobdata['company'].'</p>
                                        <p>Location: '.$jobdata['location'].'</p>
                                        <p>Salary: '.$jobdata['salary'].'</p>
                                        <p>Job Discription: <span>'.$jobdata['discp'].'</span></p>
                                        <p>Least Years Contract: '.$jobdata['leastyr'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
        }
    } else {
        echo '<div class="job-container"><div class="container"><div class="row"><div class="job-card">You have not applied for any jobs yet.</div></div></div></div>';
    }
    ?>


    <div class="heading"> Jobs Available: </div>
	<!-- job template -->
	 <?php
	$sql = "SELECT * FROM jobpost"; // Example SQL query to fetch job postings
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($data = mysqli_fetch_assoc($result)) {
	echo '<div class="job-container">
		<div class="container">
					<div class="job-card">
						<h3>'.$data['title'].'</h3>
						<p>Company: '.$data['company'].'</p>
						<p>Location: '.$data['location'].'</p>
						<p>Salary: '.$data['salary'].'</p>
						<p>Job Discription: <span>'.$data['discp'].'</span></p>
						<p>Least Years Contract: '.$data['leastyr'].'</p>';
						if(isset($_SESSION['logn']) && $_SESSION['logn'] == true){
							echo ' <div class="btn btn-apply"><a href="jobs.php?aid='.$data['id'].'">Apply Now</a></div>';
						}
						else{
							echo '<div class="btn btn-apply" data-bs-toggle="modal" data-bs-target="#loginmodel"> Apply Now </div>';
						}
						echo '
				</div>
			</div>
		</div>';
	    }
	} else {
	    echo '<div class="container"><p>No job postings available at the moment.</p></div>';
	}
	?>

    <!-- Footer -->
    <?php include 'partial/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/_searchjs.js"></script>
</body>
</html>