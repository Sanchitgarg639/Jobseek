<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">JobSeek</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php  
        if(!(isset($_SESSION['logn']) && $_SESSION['logn'] == true)){
          echo '
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          ';
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
		<?php
		if(isset($_SESSION['logn']) && $_SESSION['logn'] == true){
			echo'
        <li class="nav-item">
          <a class="nav-link" href="postjob.php">Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
		}
		else{
			echo '
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
		}
		?>
      </ul>
    </div>
  </div>
</nav>
