<?php
$title = "Exy | Register";
$titleNav = '<span class="navbar-brand mb-0 h1 txtAlign"> REGISTER <span class="iconST"><i class="fas fa-plus"></i></span></span>';
require "presets/html-top.php";
require_once "presets/mySql.php";
require_once "functions.php";

/* --------------------------- */
if (isset($_POST['submit'])) {
    if ($_POST['name'] != "" && $_POST['pass'] != "" && $_POST['email'] != "") {
        
        $pfp = "";
        if(!empty($_FILES['pfp']['name'])) {
            $pfp = addFile($_FILES['pfp']['name'], $_FILES['pfp']['tmp_name']);

        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $usergroup = $_POST['usergroup_id'];

        $sql = "insert into user (name, email, pass, usergroup_id, pfp) 
                values('{$name}', '{$email}', '{$pass}', '{$usergroup}', '{$pfp}')";
        var_dump($sql);
        mysqli_query($connection, $sql);

        $value = "Successfully done";
    } else {
        $value = "Something went wrong";
    }
}
?>

<div class="container p-5">
    <form method="POST" action="registerUser.php" enctype="multipart/form-data">
        <div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.34em;">
            <div class="col">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="Password">
                </div>
            </div>

            <div class="mb-3">
                <label for="usergroup_id" class="form-label">Users' group</label>
                <select name="usergroup_id" id="usergroup_id" class="form-select">
                    <option value="" selected></option>
                    <?php
                    $sql = "select * from usergroup order by name";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) :
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    endwhile;
                    ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="pfp" class="form-label">Profile's picture</label>
                <input class="form-control" name="pfp" type="file" id="pfp" accept="image/*">
            </div>

        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="submit" class="btn btn-secondary" style="margin-left: 0.5em; box-shadow: -2px 1px 3px grey;"><i class="far fa-plus-square" style="margin-right: 2px;"></i> Register</button>
        </div>
    </form>
    <?php
    mysqli_close($connection);
    require "presets/html-bottom.php";
    ?>
</div>