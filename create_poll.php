<?php include 'header.php';?>

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<?php
    $role = $usersImplement->userRole($_SESSION["username"]);
    if ($role == 'admin') {
            $nameErr = $questionErr = "";
            $name = $question = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                }

                if (empty($_POST["question"])) {
                    $questionErr = "Question is required";
                } else {
                    $question = test_input($_POST["question"]);
                }

            }

            if (!empty($_POST["name"]) && !empty($_POST["question"])) {

                $data['name'] = $name;
                $data['question'] = $question;
                $pollsImplement->Create($data);
                redirect('/voting/polls.php');
            }
        ?>

        <h1>Create poll!</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName"  placeholder="Enter poll name">
                <?php echo $nameErr;?>
            </div>
            <div class="form-group">
                <label for="exampleInputQuestion">Question</label>
                <input name="question" type="text" class="form-control" id="exampleInputQuestion" placeholder="Question">
                <?php echo $questionErr;?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php
    }else {
        ?>
        <h1>Access denied!</h1>
        <?php
    }
    ?>




<?php include 'footer.php';?>

