<?php
    include 'partials/dbconnect.php';
    session_start();
    error_reporting();

    $messageer = false; $nameer = false; $emailer = false;
    $successful = false; $error = false;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (empty($name)){
            $nameer = "Enter your Name";
        }
        elseif (empty($email)){
            $emailer = "Enter your Email";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailer = "Invalid email format";
        }
        elseif (strlen($name) < 3 || strlen($name) > 50){
            $nameer = "Name must be between 3 and 50 characters";
        }
        elseif(empty($message)){
            $messageer = "Enter the message you want to send";
        }
        else{
            $sql = "INSERT INTO `contact` (`name`, `mail`, `msg`) VALUES ('$name', '$email', '$message')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $successful = true;
            } else {
                $error = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSeek | Contact</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/_footerc.css">
    <link rel="stylesheet" href="css/_navc.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include 'partial/_nav.php'; ?>

    <section class="contact-hero">
        <div class="container text-center">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Reach out to us with your questions or feedback.</p>
        </div>
    </section>

    <?php
        if($successful){
            echo "
            <div class='alert alert-info alert-dismissible fade show my-0' role='alert'>
                You have successfully submitted your message. We will get back to you soon.
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

    <section class="contact-form">
        <div class="container">
            <h2>Get in Touch</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                    <?php if($nameer) { echo "<div class='text-danger'>$nameer</div>"; } ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                    <?php if($emailer) { echo "<div class='text-danger'>$emailer</div>"; } ?>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message"></textarea>
                    <?php if($messageer) { echo "<div class='text-danger'>$messageer</div>"; } ?>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <?php include 'partial/_footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
