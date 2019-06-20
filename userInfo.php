<?php include 'header.php';?>



<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];}
    $userInfo = $usersImplement->userInfo($id);
?>

    <h1>Email: <?php echo $userInfo['email'] ?></h1>
    <h4>Role: <?php echo $userInfo['role'] ?></h4>
    <a class="btn btn-primary" href="/voting/dashboard_admin.php" role="button">Go back</a>



<?php include 'footer.php';?>