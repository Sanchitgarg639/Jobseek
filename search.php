<?php
include 'partials/dbconnect.php';
session_start();
error_reporting(0);
// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["logn"]) || $_SESSION["logn"] !== true) {
	header("location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JobSeek | Search for Jobs</title>
	
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/_searchc.css">
	<link rel="stylesheet" href="css/jobc.css">
</head>
<body>
	<div class="backtop">
        <a href="jobs.php">
            <div class="back">
                <i class="fas fa-reply"></i>
            </div>
        </a>
        <div class="logo"><a href="home.php">JobSeek</a></div>
    </div>
	<div class="searchdiv1">
		<input class="searchbar" type="text" id="myInput" name="searchbar" placeholder="Search by the Job Title..." autocomplete="off">
		<button class="searchbutton" onclick="searchfun()">
			<i class="fas fa-search"></i>
		</button>    
	</div>

<?php
	$sql = "SELECT * FROM jobpost"; // Example SQL query to fetch job postings
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while ($data = mysqli_fetch_assoc($result)) {
	echo '<div class="job-container">
		<div class="container">
					<div class="job-card" id="mydiv">
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/_searchjs.js"></script>
</body>
</html>