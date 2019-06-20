<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('bootstrap.php'); ?>
    <?php include('connection.php'); ?>
    <base href="<?=BASE_HREF?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css">
    <title>Voting App</title>
</head>
<body>
<?php
    $usersImplement = new UsersImplement();
    $pollsImplement = new PollsImplement();
    $answearsImplement = new AnswearsImplement();
    $votesImplement = new VotesImplement();
?>
<?php include 'navbar.php';?>
<?php
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>
<div class="container">


