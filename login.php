<?php
    include 'partials/dbconnect.php';
    error_reporting(0);
    session_start();

    $acc_err = false; $pass_err = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $lphone = $_POST['lphone'];
        $lpass = $_POST['lpass'];

        $query = "SELECT * FROM `resume` WHERE phone='$lphone'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            while($data = mysqli_fetch_assoc($result)){
                if(password_verify($lpass, $data['pass'])){
                    $_SESSION['logn'] = true;
                    $_SESSION['firstname'] = $data['fname'];
                    $_SESSION['lastname'] = $data['lname'];
                    $_SESSION['userimage'] = $data['userimg'];
                    $_SESSION['usermail'] = $data['mail'];
                    $_SESSION['userphone'] = $lphone;
                    $_SESSION['useraddress'] = $data['address'];
                    $_SESSION['web'] = $data['website'];
                    
                    $_SESSION['skill1'] = $data['skill1'];
                    $_SESSION['skill2'] = $data['skill2'];
                    $_SESSION['skill3'] = $data['skill3'];
                    $_SESSION['skill4'] = $data['skill4'];

                    $_SESSION['softwear1'] = $data['softwear1'];
                    $_SESSION['softwear2'] = $data['softwear2'];
                    $_SESSION['softwear3'] = $data['softwear3'];

                    $_SESSION['hobby1'] = $data['hobby1'];
                    $_SESSION['hobby2'] = $data['hobby2'];
                    $_SESSION['hobby3'] = $data['hobby3'];

                    $_SESSION['mskill'] = $data['main_skill'];
                    $_SESSION['mskilld'] = $data['main_skill_discp'];

                    $_SESSION['info'] = $data['personal'];

                    $_SESSION['degree1'] = $data['deg1'];
                    $_SESSION['university1'] = $data['uni1'];
                    $_SESSION['degree2'] = $data['deg2'];
                    $_SESSION['university2'] = $data['uni2'];
                    $_SESSION['degree3'] = $data['deg3'];
                    $_SESSION['university3'] = $data['uni3'];

                    $_SESSION['topic1'] = $data['topic1'];
                    $_SESSION['work1'] = $data['work1'];
                    $_SESSION['topic2'] = $data['topic2'];
                    $_SESSION['work2'] = $data['work2'];




                    if(isset($_POST['rememberme'])){
                        setcookie('usernumcookie',$userphone,time()+(86400*31));
                    }
                    header("Location: home.php?login=true");   
                }
                else{ $pass_err = "Error! Password is incorret. "; }
            }
        }
        else{ $acc_err = "Error! No such account found. "; }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    	<link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/signupe.css">

        <title>JobSeek | Login.</title>
    </head>
    <body>
        <div class="main-container">
            <div class="logo text-center my-4"><a href="home.php">JobSeek</a></div>

            <div class="container my-4">
                <h3 class="px-4" style="padding-top: 20px;">Login </h3>
                <h6 class="px-4">( If you already have an account.. )</h6>

                <?php
                    //logout greeting
                    if(isset($_GET['logout'])){
                        if($_GET['logout'] == 'true'){
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show my-0' role='alert'>
                                <strong>Logged Out! </strong> You are logged out successfully.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    }
                    //signup greeting
                    if(isset($_GET['signup'])){
                        if($_GET['signup'] == 'true'){
                            echo "
                            <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                                <strong> Congratulations! </strong> Your Account and Resume Profile are created successfully. Now Login to continue.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    }
                ?>
                
                <form action="" method="POST" class="py-4 px-4">
                    <div class="mb-3">    
                        <div class="input-group">
                            <span class="input-group-text"><i class="fad fa-mobile"></i></span>
                            <input type="number" class="form-control" id="lphone" name="lphone" placeholder="Phone Number" value="<?php if(isset($_COOKIE['usernumcookie'])){ echo $_COOKIE['usernumcookie']; } ?>">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($acc_err){ echo ' <div class="small"> '.$acc_err.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <!-- <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="lmail" name="lmail" placeholder="Email Address">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($acc_err){ echo ' <div class="small"> '.$acc_err.' </div>'; }
                            ?>
                        </small>
                    </div> -->

                    <div class="mb-3">    
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="lpass" name="lpass" placeholder="Password">
                            <div class="input-group-text eyeopen" onclick="eye()"><i class="fas fa-eye"></i></div>
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($pass_err){ echo ' <div class="small"> '.$pass_err.' </div>'; }
                            ?>
                        </small>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" value="rememberme" name="rememberme"  id="rememberme">
                        <label class="form-check-label" style="color: white;">Remember me</label>
                    </div>

                    <div class="text-center">
                        <input type="submit" value=" LOGIN " name="submit" id="submit" class="btn bt btn-dark">
                    </div>
                </form>

                <div class="login">
                    <h5 class="account">Don't have an Account?</h5>
                    <div class="center"><a href="signup.php" class="btn bt btn-dark log" style="width: 150px;">Signup</a> </div>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        //hide and show password
        function eye() {
            var x = document.getElementById("lpass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>