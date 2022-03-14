<?php
$title = "Exy | List";
$titleNav = '<span class="navbar-brand mb-0 h1 txtAlign"> <span class="iconST"><i class="fas fa-list"></i></span> LIST</span>';
require("presets/html-top.php");
require_once("functions.php");
require_once("presets/mySql.php");

if (isset($_GET['delete'])) {
    $imagePath = getFile($_GET['id'], $connection);
    deleteFile("users-file\\images\\" . $imagePath);

    $sql = "delete from user where id = {$_GET['id']}";
    $result = mysqli_query($connection, $sql);
    $value = "User #{$_GET['id']} was deleted successfully";
}

$sqlFilter = '';
if (isset($_GET['filter'])) {
    if (isset($_GET['name'])) {
        $sqlFilter = "and user.name like '%" . $_GET['name'] . "%'";
        /* 
            Eu não coloquei mais uma coluna pq ia ficar feio no site, 
            mas se eu fosse colocar era simplesmente concatenar valores 
            na variavel $sqlFilter com a mesma ideia da propria pq o
            where já tá recebendo um valor a todo momento (1 = 1)

            pra receber o valor do segundo campo tbm ia funcionar da
            mesma forma que o campo Name já utilizado

            \/ obs: eu to explicando pra n precisar realmente colocar... geralmente esses 
                    filtros são feitos com os headings da table e só uma area de pesquisa

            html: 
                <div class="mb-3">
                    <label for="umCampoAleatorio" class="form-label">CAMPO EXEMPLO</label>
                    <input type="text" placeholder="CAMPO" name="CAMPO" class="form-control" id="umCampoAleatorio" aria-describedby="umCampoAleatorio">
                </div>
            php: 

                $sqlFilter .= "and user.campo = '".$_GET['CAMPO']."'"; // obs. o valor e o sql depende do campo em especifico
        */
    }
}

$sql = "select user.*, usergroup.name as gp_name
        from user left join usergroup 
        on usergroup.id = user.usergroup_id 
        where 1 = 1 {$sqlFilter}
        order by user.status desc, user.name";

function getSth($value, $connection)
{
    $sql = "select name from usergroup where id = {$value}";
    $resultGroup = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resultGroup);

    return $row['name'];
}

$result = mysqli_query($connection, $sql);
$nRows = mysqli_num_rows($result);
mysqli_close($connection);
?>

<div class="container p-3">
    <form method="GET" action="listUser.php">
        <div class="d-flex justify-content-end">
            <div class="mb-3">
                <label for="name" class="form-label">Filter</label>
                <input type="text" placeholder="Name" name="name" class="form-control" id="name" aria-describedby="nameHelp">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="filter" value="0" class="btn btn-secondary" style="margin: 30px 0.5em; box-shadow: -2px 1px 3px grey;">
                    <i class="fas fa-search" style="margin-right: 2px;"></i> 
                </button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PFP</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Group</th>
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
                    <td><img src="
                    <?php if (isset($row['pfp']) && $row['pfp'] != "") { ?>
                            users-file/images/<?= $row['pfp'] ?>
                    <?php } else { ?>
                            users-file/images/user-default.png
                    <?php } ?>
                    " style="
                            width: 30px;
                            height: 30px;
                            border-radius: 100%;
                            border-bottom: none;
                            box-shadow: none;
                            -webkit-user-drag: none;
                            object-fit: cover;
                        "></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['gp_name'] ?></td>
                    <td><?= $row['status'] == "S" ? "Active" : "Inactive" ?></td>
                    <td scope="row" class="d-flex">
                        <form action="alter.php" method="POST" class="p-1">
                            <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="type" id="type" value="listU">
                            <input type="hidden" name="userType" id="userType" value="user">
                            <button type="submit" name="change" value="change" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="listUser.php" method="GET" class="p-1" onsubmit="return confirm('u sure about dat?')">
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
    <hr style="margin: 30px 450px 15px; opacity: 15%;">
    <div class="alert alert-light alert-dismissible fade show" role="alert" style="
            background-color: lightgrey;
            border-radius: 5px;
            padding: 15px 5px;
            text-align: center;
            margin: 0 270px 15px;
        ">
            <span style="
                    color: black;
                    opacity: 55%;
                    font-size: small;
                    font-weight: 400;
                ">Eu não coloquei status, mas eu expliquei com comentário no código! tldr: fica feio
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php require("presets/html-bottom.php"); ?>