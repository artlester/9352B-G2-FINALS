<nav class="navbar navbar-expand navbar-dark bg-black py-md-0" id="bg-black">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item py-0">
                <a class="nav-link text-light" href="homepage.php">Audirentur</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item py-0">
                <a class="nav-link text-light" href="notification.php"><i class="fa fa-bell"></i></a>
            </li>
            <li class="nav-item dropdown py-0">
                <?php echo'<a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" data-toggle="dropdown" href="javascript:void(0)">' . $user . '</a>'; ?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" id="drop-down" href="http://customer.audirentur.com/profile.php"><i class="fas fa-user"></i> &nbsp;Profile</a>
                    <a class="dropdown-item" id="drop-down" href="http://customer.audirentur.com/transactions.php"><i class="fas fa-credit-card"></i> Transactions</a>
                    <a class="dropdown-item" id="drop-down" href="http://customer.audirentur.com/logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp;Logout</a>
                </div>
            </li>
            <li class="nav-item py-0"><a class="nav-link text-light" id="socio-icon" href="https://bit.ly/2KD6yAw" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="nav-item py-0"><a class="nav-link text-light" id="socio-icon" href="https://bit.ly/2wY5DIF" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="nav-item py-0"><a class="nav-link text-light" id="socio-icon" href="https://bit.ly/2ITqVfA" target="_blank"><i class="fab fa-google-plus"></i></a></li>
        </ul>
</nav>
