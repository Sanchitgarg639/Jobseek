<?php
    include 'partials/dbconnect.php';
	error_reporting(0);
    session_start();

    $firstnameer = false; $lastnameer = false; $phoneer = false; $mailer= false; $imger = false;$weburler = false; $addresser = false; $skiller = false; $softwearer = false; $hobbyer = false; $mskiller = false;$mskillder = false; $personaler = false; $edu1er = false; $matcher = false; $passer = false;
    $successful = false; $error = false;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $firstn = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastn = mysqli_real_escape_string($conn, $_POST['lastname']);

        $img = $_FILES['uploadfile']['name'];
		$temp_name = $_FILES['uploadfile']['tmp_name'];
		$folder = "person_img/".$img;

        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);

        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

        $house = mysqli_real_escape_string($conn, $_POST['house']);
        $area = mysqli_real_escape_string($conn, $_POST['area']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pin']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);

        $weburl = mysqli_real_escape_string($conn, $_POST['weburl']);

        $skill1 = mysqli_real_escape_string($conn, $_POST['skill1']);
        $skill2 = mysqli_real_escape_string($conn, $_POST['skill2']);
        $skill3 = mysqli_real_escape_string($conn, $_POST['skill3']);
        $skill4 = mysqli_real_escape_string($conn, $_POST['skill4']);

        $softwear1 = mysqli_real_escape_string($conn, $_POST['softwear1']);
        $softwear2 = mysqli_real_escape_string($conn, $_POST['softwear2']);
        $softwear3 = mysqli_real_escape_string($conn, $_POST['softwear3']);

        $hobby1 = mysqli_real_escape_string($conn, $_POST['hobby1']);
        $hobby2 = mysqli_real_escape_string($conn, $_POST['hobby2']);
        $hobby3 = mysqli_real_escape_string($conn, $_POST['hobby3']);

        $mskill = mysqli_real_escape_string($conn, $_POST['mskill']);
        $mskilld = mysqli_real_escape_string($conn, $_POST['mskilld']);

        $personal = mysqli_real_escape_string($conn, $_POST['personal']);
        
        $edu1 = mysqli_real_escape_string($conn, $_POST['edu1']);
        $edu1uni = mysqli_real_escape_string($conn, $_POST['edu1uni']);
        $edu2 = mysqli_real_escape_string($conn, $_POST['edu2']);
        $edu2uni = mysqli_real_escape_string($conn, $_POST['edu2uni']);
        $edu3 = mysqli_real_escape_string($conn, $_POST['edu3']);
        $edu3uni = mysqli_real_escape_string($conn, $_POST['edu3uni']);

        $work1 = mysqli_real_escape_string($conn, $_POST['work1']);
        $work1d = mysqli_real_escape_string($conn, $_POST['work1d']);
        $work2 = mysqli_real_escape_string($conn, $_POST['work2']);
        $work2d = mysqli_real_escape_string($conn, $_POST['work2d']);

        $phoneSql = "SELECT * FROM `resume` WHERE phone=$phone";
        $phoneResult = mysqli_query($conn, $phoneSql);
        $phoneRow = mysqli_num_rows($phoneResult);

        $mailSql = "SELECT * FROM `resume` WHERE mail='$mail'";
        $mailResult = mysqli_query($conn, $mailSql);
        $mailRow = mysqli_num_rows($mailResult); 

        if(empty($firstn)){
            $firstnameer = 'Error! Enter your first name.'; 
        }
        elseif(empty($lastn)){
            $lastnameer = 'Error! Enter your last name.'; 
        }
        elseif(empty($phone)){
            $phoneer = 'Error! Enter your phone number.'; 
        }
        elseif(empty($mail)){
            $mailer = 'Error! Enter your email address.'; 
        }
        elseif(empty($house) || empty($city) || empty($pincode) || empty($state) || empty($country) || empty($area)){
            $addresser = 'Error! Enter your Full Address.';
        }
        elseif(empty($weburl)){
            $weburler = 'Error! Enter your website URL.'; 
        }
        elseif(empty($skill1) || empty($skill2)){
            $skiller = 'Error! Enter at least 2 of your skills.'; 
        }
        elseif(empty($softwear1) || empty($softwear2)){ 
            $softwearer = 'Error! Enter at least 2 softwears you are comfortable in using.'; 
        }
        elseif(empty($hobby1) || empty($hobby2)){ 
            $hobbyer = 'Error! Enter at least 2 of your hobbies.'; 
        }
        elseif(empty($mskill)){ 
            $mskiller = 'Error! Enter your main skill.'; 
        }
        elseif(empty($mskilld)){ 
            $mskillder = 'Error! Do describe your main.'; 
        }
        elseif(empty($personal)){ 
            $personaler = 'Error! Describe yourself.'; 
        }
        elseif(empty($edu1) || empty($edu1uni)){ 
            $edu1er = 'Error! Enter your education details.'; 
        }
        elseif($phoneRow > 0){ 
            $phoneer = "Error! This Phone Number already exists."; 
        }
        elseif($mailRow > 0){ 
            $mailer = "Error! This Email Address already exists."; 
        }
        elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { 
            $mailer = "Invalid email format"; 
        }
        elseif(strlen($user) >= 61 || strlen($user) <= 3){ 
            $userer = "Error! Username's length can be between 4 to 60."; 
        }
        elseif(strlen($phone) != 10){ 
            $phoneer = "Error! Enter a valid phone number."; 
        }
        elseif(strlen($pass) <= 6 || strlen($pass) >= 21){ 
            $passer = "Error! password's length can be between 7 to 20 only."; 
        }
        elseif(strlen($mail) >= 200){ 
            $mailer = "Error Email's length cannot be greater than 200."; 
        }
        elseif($pass != $cpass){ 
            $matcher = "Error! Passwords do not match."; 
        }
        else{
            $address =  $house.' '.$area.' '.$city.' - '.$pincode.' '.$state.' '.$country;
            $hash = password_hash($pass , PASSWORD_DEFAULT); 
            if(empty($work1) || empty($work1d)){ $work1 = ' '; $work1d = ' '; }
            if(empty($work2) || empty($work2d)){ $work2 = ' '; $work2d = ' '; }
            if(empty($edu2) || empty($edu2uni)){ $edu2 = ' '; $edu2uni = ' '; }
            if(empty($edu3) || empty($edu3uni)){ $edu3 = ' '; $edu3uni = ' '; }
            if(empty($hobby3)){ $hobby3 = ' '; }
            if(empty($skill3)){ $skill3 = ' '; }
            if(empty($skill4)){ $skill4 = ' '; }
            if(empty($softwear3)){ $softwear3 = ' '; }

            $check = getimagesize($temp_name);
            if($check !== false) {
                // Move the uploaded file to the desired location
                if(move_uploaded_file($temp_name, $folder)){
                    $query = "INSERT INTO `resume`(`fname`, `lname`, `userimg`, `mail`, `phone`, `address`, `website`, `skill1`, `skill2`, `skill3`, `skill4`, `softwear1`, `softwear2`, `softwear3`, `hobby1`, `hobby2`, `hobby3`, `main_skill`, `main_skill_discp`, `personal`, `deg1`, `uni1`, `deg2`, `uni2`, `deg3`, `uni3`, `topic1`, `work1`, `topic2`, `work2`, `pass`) VALUES ('$firstn', '$lastn', '$folder','$mail','$phone','$address','$weburl','$skill1','$skill2','$skill3','$skill4','$softwear1','$softwear2','$softwear3','$hobby1','$hobby2','$hobby3','$mskill','$mskilld','$personal','$edu1','$edu1uni','$edu2','$edu2uni','$edu3','$edu3uni','$work1','$work1d','$work2','$work2d', '$hash')";
                    $result = mysqli_query($conn, $query);
                    if($result){ 
                        $_SESSION['sign'] = true;
                        $successful = true;
                        header("Location: login.php?signup=true");
                    }
                    else{ $error = true; }
                }
                else { $imger = "Failed to upload image."; }
            } 
            else { $imger = "File is not an image."; }
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/signupe.css">

        <title> JobSeek | Lets get your Signup and Resume done.</title>
    </head>
    <body>
        <div class="main-container">
            <div class="logo text-center my-4"><a href="home.php" style="color:rgb(7, 36, 63)"> JobSeek</a></div>

            <div class="container my-4">
                <h3 class="px-4" style="padding-top: 20px;">Signup</h3>
                <h6 class="px-4">(Enter your resume details here..)</h6>

                <?php
                    // Something went wrong
                    if($successful){
                        echo "
                        <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                            <strong> Congratulations! </strong> Your Accounted is created successfully.
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
                
                <form method="POST" class="py-4 px-4" enctype="multipart/form-data">
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($firstnameer){ echo ' <div class="small"> '.$firstnameer.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($lastnameer){ echo ' <div class="small"> '.$lastnameer.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="upload">
                            <h6 class="px-4">Upload image here:</h6>
		                    <input style="padding: 10px;" class="form-control" type="file" name="uploadfile" id="uploadfile" required>
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($imger){ echo ' <div class="small"> '.$imger.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <h6 class="px-4">CONTACT DETAILS:</h6>

                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="Email Address" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($mailer){ echo ' <div class="small"> '.$mailer.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($phoneer){ echo ' <div class="small"> '.$phoneer.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="input-group my-1">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control" id="house" name="house" placeholder="House No." autocomplete="off">
                            <input type="text" class="form-control" id="area" name="area" placeholder="Nearby Area" autocomplete="off">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" autocomplete="off">
                        </div>
                        <div class="input-group">   
                            <input type="number" class="form-control" id="pin" name="pin" placeholder="Pincode">
                            <input type="text" class="form-control" id="state" name="state" placeholder="State" autocomplete="off">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Country" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($addresser){ echo ' <div class="small"> '.$addresser.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                            <input type="text" class="form-control" id="weburl" name="weburl" placeholder="Website URL" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($weburler){ echo ' <div class="small"> '.$weburler.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <h6 class="px-4">SKILL SET:</h6>

                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                            <input type="text" class="form-control" id="skill1" name="skill1" placeholder="Skill 1" autocomplete="off">
                            <input type="text" class="form-control" id="skill2" name="skill2" placeholder="Skill 2" autocomplete="off">
                            <input type="text" class="form-control" id="skill3" name="skill3" placeholder="Skill 3" autocomplete="off">
                            <input type="text" class="form-control" id="skill4" name="skill4" placeholder="Skill 4" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($skiller){ echo ' <div class="small"> '.$skiller.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <h6 class="px-4">Softwears:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-brands fa-uncharted"></i></span>
                            <input type="text" class="form-control" id="softwear1" name="softwear1" placeholder="Softwear 1" autocomplete="off">
                            <input type="text" class="form-control" id="softwear2" name="softwear2" placeholder="Softwear 2" autocomplete="off">
                            <input type="text" class="form-control" id="softwear3" name="softwear3" placeholder="Softwear 3" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($softwearer){ echo ' <div class="small"> '.$softwearer.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <h6 class="px-4">Hobbies:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                            <input type="text" class="form-control" id="hobby1" name="hobby1" placeholder="Hobby 1" autocomplete="off">
                            <input type="text" class="form-control" id="hobby2" name="hobby2" placeholder="Hobby 2" autocomplete="off">
                            <input type="text" class="form-control" id="hobby3" name="hobby3" placeholder="Hobby 3" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($hobbyer){ echo ' <div class="small"> '.$hobbyer.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <h6 class="px-4">Main Skill:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                            <input type="text" class="form-control" id="mskill" name="mskill" placeholder="Main Skill" autocomplete="off">
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($mskiller){ echo ' <div class="small"> '.$mskiller.' </div>'; }
                            ?>
                        </small>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <textarea class="form-control" name="mskilld" id="mskilld" placeholder="Describe your skill"></textarea>
                            <small>
                                <?php
                                    if($mskillder){ echo ' <div class="small"> '.$mskillder.' </div>'; }
                                ?>
                            </small>
                        </div>
                    </div>

                    <h6 class="px-4">Personal Information:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <textarea class="form-control" name="personal" id="personal" placeholder="Describe yourself"></textarea>    
                            <small class="form-text text-muted">
                                <?php
                                    if($personaler){ echo ' <div class="small"> '.$personaler.' </div>'; }
                                ?>
                            </small>
                        </div>
                    </div>

                    <h6 class="px-4">Education:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="text" class="form-control" id="edu1" name="edu1" placeholder="Years and Degree (if not, enter NA)" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                            <input type="text" class="form-control" id="edu1uni" name="edu1uni" placeholder="University Name" autocomplete="off">
                            <small class="form-text text-muted">
                                <?php
                                    if($edu1er){ echo ' <div class="small"> '.$edu1er.' </div>'; }
                                ?>
                            </small>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="text" class="form-control" id="edu2" name="edu2" placeholder="Years and Degree (if not, enter NA)" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                            <input type="text" class="form-control" id="edu2uni" name="edu2uni" placeholder="University Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="text" class="form-control" id="edu3" name="edu3" placeholder="Years and Degree (if not, enter NA)" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                            <input type="text" class="form-control" id="edu3uni" name="edu3uni" placeholder="University Name" autocomplete="off">
                        </div>
                    </div>

                    <h6 class="px-4">Experience:</h6>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="text" class="form-control" id="work1" name="work1" placeholder="Years and Topic" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <textarea class="form-control" name="work1d" id="work1d" placeholder="Describe your work there"></textarea>
                        </div>
                    </div><div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="text" class="form-control" id="work2" name="work2" placeholder="Years and Topic" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <textarea class="form-control" name="work2d" id="work2d" placeholder="Describe your work there"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Set Password">
                            <div class="input-group-text eyeopen" onclick="eye()"><i class="fas fa-eye"></i></div>
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($passer){ echo ' <div class="small"> '.$passer.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password">
                            <div class="input-group-text eyeopen" onclick="oeye()"><i class="fas fa-eye"></i></div>
                        </div>
                        <small class="form-text text-muted">
                            <?php
                                if($matcher){ echo ' <div class="small"> '.$matcher.' </div>'; }
                            ?>
                        </small>
                    </div>

                    <!-- <div id="addskilltome"></div>
                    <div class="mb-2">
                        <div class="input-group">
                            <button onclick="addskill()"><i class="fas fa-plus"></i> ADD</button>
                        </div>
                        <small class="form-text text-muted">
                            <?php
                            ?>
                        </small>
                    </div> -->
                    
                    <div class="text-center sbtbtn">
                        <input type="submit" value=" SUBMIT " name="submit" id="submit" class="btn bt btn-dark">
                    </div>
                </form>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        //hide and show password and confirm password
        function eye() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function oeye() {
            var x = document.getElementById("cpass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
   
    </body>
</html>