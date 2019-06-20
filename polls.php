<?php include 'header.php';?>



<?php
    $role = $usersImplement->userRole($_SESSION["username"]);
?>
    <h1 class="mb-5">Polls:</h1>

    <ul class="list-group">
        <?php
        $polls = $pollsImplement->listAll();
        if ($polls) {
            foreach ($polls as $poll) {
                ?>
                <li class="list-group-item">
                    <a href="<?php echo "/voting/pollInfo.php?id=".$poll['id']; ?>"> <?php echo $poll['question']; ?></a>
                </li>
                <?php
            }
        }else {
            echo "<p>There are no polls!</p>";
        }
        ?>

    </ul>
    <br>



<?php
    if($role == 'admin') {
        ?>
        <a class="btn btn-success" href="/voting/create_poll.php" role="button">Create poll</a>
        <?php
    }
?>


<?php include 'footer.php'; ?>