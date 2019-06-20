<?php include 'header.php';?>



<?php
$role = $usersImplement->userRole($_SESSION["username"]);
if ($role == 'admin') {
    ?>
        <h1>Dashboard</h1>
        <hr>
        <h3>Users:</h3>

        <ul class="list-group">
            <?php
            $users = $usersImplement->listAll();
            foreach ($users as $user) {
                ?>
                <li class="list-group-item">
                    <a href="<?php echo "/voting/userInfo.php?id=".$user['id']; ?>"> <?php echo $user['email']; ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    <?php
}else {
    ?>
    <h1>Access denied!</h1>
    <?php
}
?>




<?php include 'footer.php';?>

