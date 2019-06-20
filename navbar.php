<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="/">Voting App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>

            <?php
                if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["username"] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                    $role = $usersImplement->userRole($_SESSION["username"]);
                                    if ($role == 'admin') {
                                        ?>
                                            <a class="dropdown-item" href="/voting/dashboard_admin.php">Dashboard</a>
                                        <?php
                                    } ?>
                                <a class="dropdown-item" href="/voting/polls.php">Polls</a>
                                <a class="dropdown-item" href="/voting/yourpolls.php">Your Polls</a>
                                <a class="dropdown-item" href="/voting/logout.php">Log out</a>
                            </div>
                        </li>
                    <?php
                }
                else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/voting/signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/voting/login.php">Log In</a>
                        </li>
                    <?php
                }
            ?>

        </ul>
    </div>
</nav>