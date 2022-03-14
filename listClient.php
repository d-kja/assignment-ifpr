<?php
$title = "Exy | List";
$titleNav = '<span class="navbar-brand mb-0 h1 txtAlign"> <span class="iconST"><i class="fas fa-list"></i></span> LIST</span>';
require("presets/html-top.php");

require_once("presets/mySql.php");

if (isset($_GET['delete'])) {
    $sql = "delete from client where id = {$_GET['id']}";
    $result = mysqli_query($connection, $sql);
    $value = "User #{$_GET['id']} was deleted successfully";
}

$sql = "select * from client";
$result = mysqli_query($connection, $sql);
$nRows = mysqli_num_rows($result);
mysqli_close($connection);

?>

<div class="container p-3">

    <table class="table table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>

                <th scope="col">Address</th>
                <th scope="col">House Number</th>

                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Status</th>

                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) :
            ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['houseNumber'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['state'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td scope="row" class="d-flex justify-content-center">
                        <form action="alter.php" method="POST" class="p-1">
                            <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="type" id="type" value="listC">
                            <input type="hidden" name="userType" id="userType" value="client">
                            <button type="submit" name="change" value="change" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="listClient.php" method="GET" class="p-1" onsubmit="return confirm('u sure about dat?')">
                            <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete" value="delete" class="btn btn-secondary btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <?php require("presets/html-bottom.php"); ?>