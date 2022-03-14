<nav class="navbar navbar-expand-lg navbar-light bg-light navEdit" style="margin: 0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#?Sup-Brah"><span style="font-weight: 500;">EXY <!-- just a random name --></span> | Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homeUser.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lists
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                        <!-- i more than know dat we got da HOME's button but i felt like adding target blank -->
                        <li><a class="dropdown-item" href="listUser.php">Users' list</a></li>
                        <li><a class="dropdown-item" href="listClient.php">Clients' list</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Register
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="registerUser.php" >User</a></li>
                        <li><a class="dropdown-item" href="registerClient.php" >Client</a></li>
                    </ul>
                </li>
            </ul>
            <div class="title">
                <?=$titleNav?>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-user-circle"></i> <?= $_SESSION['name'] ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="alter.php" method="post">
                            <input type="hidden" name="id" value=" <?= $_SESSION['id'] ?> ">
                            <input type="hidden" name="type" id="type" value="menu">
                            <input type="hidden" name="userType" id="userType" value="user">
                            <button class="dropdown-item" type="submit" name="change" value="change"> <i class="fas fa-cog"></i> Configurations</button>
                        </form>
                    </li>
                    <li><a href="logOut.php"><button class="dropdown-item" type="button"> <i class="fas fa-sign-out-alt"></i> Log-out</button></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>