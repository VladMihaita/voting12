<?php include 'header.php';?>

    <?php
        $emailErr = $passwordErr = "";
        $email = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
            }

        }

        if (!empty($_POST["email"]) && !empty($_POST["password"])) {

            $data['email'] = $email;
            $data['password'] = $password;
            if($usersImplement->Register($data)) {
                redirect('/voting/signup_success.php');
            }else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Email already used!
                </div>
                <?php
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <h1>Sign up!</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <?php echo $emailErr;?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <?php echo $passwordErr;?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php


?>

<?php include 'footer.php';?>

