<?php
    session_start();
    session_destroy();
    session_unset();
    setcookie('usernumcookie',$userphone,time()-(86400*31));
    header("Location: login.php?logout=true");

?>