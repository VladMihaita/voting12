<?php include 'header.php';?>

<?php

if (isset($_GET['ansid'])) {
    $ansId = $_GET['ansid'];
    $pollId = $answearsImplement->getPollId($ansId);
}

$userid = $usersImplement->userId($_SESSION["username"]);

$votes = $votesImplement->GetPollVotes($pollId,$userid);
if ($votes) {
    foreach ($votes as $vote) {
        $id = $vote['id'];
        $votesImplement->Delete($id);
        $answerId = $vote['answerid'];
        $answearsImplement->RemoveVote($answerId);
    }
}

$data['userId'] = $userid;
$data['answerId'] = $ansId;
$data['pollid'] = $pollId;
$votesImplement->Create($data);

$answearsImplement->AddVote($ansId);



redirect('/voting/pollInfo.php?id='.$pollId);

?>



<?php include 'footer.php';?>

