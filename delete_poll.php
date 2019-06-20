<?php include 'header.php';?>




<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $role = $usersImplement->userRole($_SESSION["username"]);
    if ($role == 'admin') {
        $pollsImplement->Delete($id);

        $answers = $answearsImplement->ListAll($id);

        if ($answers) {
            foreach ($answers as $answer) {
                $ansid = $answer['id'];
                $answearsImplement->Delete($ansid);

                $votes = $votesImplement->IdByAnswer($ansid);
                if ($votes) {
                    foreach ($votes as $vote) {
                        $id = $vote['id'];
                        $votesImplement->Delete($id);
                    }
                }
            }
        }
        redirect('/voting/polls.php');
    }

?>


<?php include 'footer.php';?>