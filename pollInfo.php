<?php include 'header.php';?>



<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];}
$pollInfo = $pollsImplement->pollInfo($id);
$url = "/voting/delete_poll.php?id=".$id;
$url2 = "/voting/update_poll.php?id=".$id;
$url3 = "/voting/add_ans.php?id=".$id;
?>
    <h1><?php echo $pollInfo['question']; ?></h1>
    <?php
    $role = $usersImplement->userRole($_SESSION["username"]);
    if ($role == 'admin') {
        echo "<hr>";
        echo "<a style='margin-right: 5px ' class=\"btn btn-warning\" href=\"".$url3."\" role=\"button\">Add answer</a>";
        echo "<a style='margin-right: 5px ' class=\"btn btn-success\" href=\"".$url2."\" role=\"button\">Edit poll</a>";
        echo "<a style='margin-right: 5px ' class=\"btn btn-danger\" href=\"".$url."\" role=\"button\">Delete poll</a>";
    }
    ?>
    <hr>


    <table class="table mb-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Answer</th>
            <th scope="col">Votes</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $answears = $answearsImplement->ListAll($id);
        foreach ($answears as $answear) {
            $url4 = "/voting/add_vote.php?ansid=".$answear['id'];
            $url5 = "/voting/delete_ans.php?ansid=".$answear['id'];
            ?>
            <tr>
                <td> <?php echo $answear['answear'] ?> </td>
                <td> <?php echo $answear['votes'] ?> </td>
                <td>

                    <a class="btn btn-primary" href="<?php echo $url4;?>">Vote</a>
                    <?php
                        if ($role == 'admin') {
                            ?>
                                <a class="btn btn-danger" href="<?php echo $url5;?>">Delete</a>
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="/voting/polls.php" role="button">Go back</a>









<?php include 'footer.php';?>