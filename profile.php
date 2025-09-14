<?php
include 'partials/dbconnect.php';
error_reporting(0);
session_start();

//Getting use id
$ppn = $_SESSION['userphone'];
$quer = "SELECT * FROM `resume` WHERE `phone`='$ppn'";
$resul = mysqli_query($conn , $quer);
$row = mysqli_num_rows($resul);
if($row > 0){
    while($dat = mysqli_fetch_assoc($resul)){
        $did = $dat['id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | JobSeek</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/_footerc.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php
    if((isset($_SESSION['logn']) && $_SESSION['logn'] == true)){
    echo '
    <div class="container">
        <div class="left">
            <div class="pimg">
                <img src="'.$_SESSION['userimage'].'" alt="Profile Picture">
            </div>
            <div class="contact">
                <h4 style="color: #CBB26A; font-size:30px;">Contact</h4>
                <div class="contactin">
                    <i class="fas fa-envelope"></i>
                    '.$_SESSION['usermail'].'
                </div>
                <div class="contactin">
                    <i class="fas fa-phone"></i> 
                    '.$_SESSION['userphone'].'
                </div>
                <div class="contactin">
                    <i class="fas fa-map-marker-alt"></i> 
                    '.$_SESSION['useraddress'].'
                </div>
                <div class="contactin">
                    <i class="fas fa-globe"></i>
                    '.$_SESSION['web'].'
                </div>
            </div>
            <div class="skills">
                <h4 style="color: #CBB26A;font-size:30px;">Skills</h4>
                <div class="skillsin">'.$_SESSION['skill1'].'</div>
                <div class="skillsin">'.$_SESSION['skill2'].'</div>
                <div class="skillsin">'.$_SESSION['skill3'].'</div>
                <div class="skillsin">'.$_SESSION['skill4'].'</div>
            </div>
            <div class="softwares">
                <h4 style="color: #CBB26A;font-size:30px;" >Softwares</h4>
                <div class="skillsin">'.$_SESSION['softwear1'].'</div>
                <div class="skillsin">'.$_SESSION['softwear2'].'</div>
                <div class="skillsin">'.$_SESSION['softwear3'].'</div>
            </div>
            <div class="softwares">
                <h4 style="color: #CBB26A;font-size:30px;" >Hobbies</h4>
                <div class="skillsin">'.$_SESSION['hobby1'].'</div>
                <div class="skillsin">'.$_SESSION['hobby2'].'</div>
                <div class="skillsin">'.$_SESSION['hobby3'].'</div>
            </div>
        </div>
        <div class="right">
            <p class="first-name">'.$_SESSION['firstname'].'</p>
            <p class="last-name">'.$_SESSION['lastname'].'</p>
            <p class="work_interest">'.$_SESSION['mskill'].'</p>
            <p class="para">'.$_SESSION['mskilld'].'</p>
            <div class="section">
                <button class="personal">
                     PERSONAL INFORMATION
                </button>
                <p class="para">'.$_SESSION['info'].'</p>
            </div>
            <div class="section">
                <button class="personal">
                   EDUCATION
                </button>
                <table class="table">
                    <tr>
                        <th>'.$_SESSION['degree1'].'</th>
                    </tr>
                    <tr>
                        <td>'.$_SESSION['university1'].'</td>
                    </tr>
                    <tr>
                        <th>'.$_SESSION['degree2'].'</th>
                    </tr>
                    <tr>
                        <td>'.$_SESSION['university2'].'</td>
                    </tr>
                    <tr>
                        <th>'.$_SESSION['degree3'].'</th>
                    </tr>
                    <tr>
                        <td>'.$_SESSION['university3'].'</td>
                    </tr>
                </table>
            </div>
            <div class="section">
                <button class="personal">
                    WORK EXPERIENCE
                </button>
                <table class="table">
                    <tr>
                        <th>'.$_SESSION['topic1'].'</th>
                    </tr>
                    <tr>
                        <td>'.$_SESSION['work1'].'</td>
                    </tr>
                    <tr>
                        <th>'.$_SESSION['topic2'].'</th>
                    </tr>
                    <tr>
                        <td>.'.$_SESSION['work2'].'</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    ';
    }
else{
        echo '<div class="text-center">
                <h1 style="color: #143c64;">Please login to view your profile</h1>
                <a href="login.php" class="btn btn-primary">Login</a>
              </div>';
}
?>
</body>

<?php include 'partial/_footer.php'; ?>
</html>