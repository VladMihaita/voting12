<?php include 'header.php';?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

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
    $ansErr = "";
    $ans = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["ans"])) {
            $ansErr = "Answear is required";
        } else {
            $ans = test_input($_POST["ans"]);
        }


    }

    if (!empty($_POST["ans"])) {


        $data['pollid'] = $_POST['pollid'];
        $data['answear'] = $ans;

        $answearsImplement->Create($data);
        redirect('/voting/pollInfo.php?id='.$_POST['pollid']);
    }
    ?>

    <h1>Add answear</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="exampleInputAns">Answear</label>
            <input name="ans" type="text" class="form-control" id="exampleInputAns"  placeholder="Enter answear">
            <?php echo $ansErr;?>
        </div>
        <input name="pollid" type="hidden" class="form-control" id="examplePollId" value="<?php echo $id ?>">
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

