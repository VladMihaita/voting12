<?php include 'header.php';?>


    <?php
    $_SESSION["username"] = "";
    $_SESSION["logged_in"] = false;
    ?>

    <h1>Logged out!</h1>
    <br>
    <a class="btn btn-primary" href="/" role="button">Go back</a>

<?php include 'footer.php';?>