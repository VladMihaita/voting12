<?php include 'header.php';?>



<?php
    if (isset($_GET['ansid'])) {
        $ansid = $_GET['ansid'];
    }
    $role = $usersImplement->userRole($_SESSION["username"]);
    if ($role == 'admin') {
        $pollId = $answearsImplement->getPollId($ansid);
        $answearsImplement->Delete($ansid);

        $votes = $votesImplement->IdByAnswer($ansid);
        if ($votes) {
            foreach ($votes as $vote) {
                $id = $vote['id'];
                $votesImplement->Delete($id);
            }
        }


        redirect('/voting/pollInfo.php?id='.$pollId);
    }

?>


<?php include 'footer.php';?>