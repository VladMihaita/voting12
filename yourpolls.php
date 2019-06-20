<?php include 'header.php';?>



<?php
$userid = $usersImplement->userId($_SESSION["username"]);
?>
    <h1 class="mb-5">Your Polls:</h1>
    <ul class="list-group">
        <?php
        $answers = $votesImplement->ListVotesByUser($userid);

        if ($answers) {
            foreach ($answers as $answer) {
                $ansId = $answer['answerId'];
                $pollId = $answearsImplement->getPollId($ansId);
                $pollInfo = $pollsImplement->pollInfo($pollId);
                ?>
                <li class="list-group-item">
                    <a href="<?php echo "/voting/pollInfo.php?id=".$pollId; ?>"> <?php echo $pollInfo['question']; ?> </a>
                </li>
                <?php
            }
        }else {
            ?>
                <p>You have no active polls.</p>
            <?php
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