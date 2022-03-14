<?php
$title = "Exy | Register";
$titleNav = '<span class="navbar-brand mb-0 h1 txtAlign"> REGISTER <span class="iconST"><i class="fas fa-plus"></i></span></span>';
require("presets/html-top.php");

/* --------------------------- */

require_once("presets/mySql.php");

if (isset($_POST['submit'])) {
    if (
        $_POST['name'] != "" &&
        $_POST['email'] != "" &&
        $_POST['phone'] != "" &&
        $_POST['cpfcnpj'] != "" &&
        $_POST['address'] != "" &&
        $_POST['state'] != "" &&
        $_POST['city'] != "" &&
        $_POST['houseNumber'] != ""
    ) {
        switch ($_POST['state']) {
            case '1':
                $state = "PR";
                break;
            case '2': # just an example or more like a template
                $state = "02";
                break;
            case '3':
                $state = "03";
                break;
                # and so on...
        }
        
        if (isset($_POST['check']) && $_POST['check'] == "on") {
            $status = "S";
        } else {
            $status = "N";
        }

        $houseNumber = (int) $_POST['houseNumber'];

        $sql = "insert into client (
                name, 
                cpfcnpj,
                email, 
                phone, 
                address, 
                houseNumber, 
                city, 
                state, 
                status)

        values( '{$_POST['name']}', 
                '{$_POST['cpfcnpj']}', 
                '{$_POST['email']}', 
                '{$_POST['phone']}', 
                '{$_POST['address']}', 
                '{$houseNumber}', 
                '{$_POST['city']}',
                '{$state}',
                '{$status}')";

        mysqli_query($connection, $sql);
        mysqli_close($connection);
        
        /* var_dump($_POST);

        echo "-----";
        var_dump($houseNumber);
        echo "-----";
        var_dump($state);
        echo "-----";
        var_dump($status); 
            /\ isso dai foi eu tentando encontrar o pq n tava
            criando a tabela no database... eu tinha ctrl+c/v e
            tava USER invés de CLIENT e eu tinha esquecido de
            atualizar :'D
        */

        $value = "Successfully done 😉";
    } else {
        $value = "Something went wrong, you always can try it again 👻"; /* hu tao's emote? PauseChamp */
    }
}

?>

<div class="container p-5">
    <form method="POST" action="registerClient.php">
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
                    <input type="email" name="email" placeholder="example@domain.com" class="form-control" id="Email" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" placeholder="contain at least 9 numbers" class="form-control" id="phone">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="cpfcnpj" class="form-label">Cpf or Cnpj</label>
                    <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj">
                </div>
            </div>
        </div>
        <div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" aria-describedby="address">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.34em;">
            <!-- <div class="col">
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="number" name="state" class="form-control" id="state" aria-describedby="state">
                </div>
            </div> -->
            <select class="col form-select form-select-sm" aria-label="Default select example" style="padding-right: 0; height: 2.65em; margin: 2.3em 0.889em 0 0.898em;" name="state">
                <option selected>State</option>
                <option value="1">PR</option>
                <option value="2">Example02</option>
                <option value="3">Example03</option>
            </select>
            <div class="col">
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="city" aria-describedby="cityHelp">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="houseNumber" class="form-label">House Number</label>
                    <input type="number" name="houseNumber" class="form-control" id="houseNumber">
                </div>
            </div>
        </div>
        <div class="mb-3 form-check d-flex justify-content-end">
            <input type="checkbox" name="check" class="form-check-input" id="check">
            <label class="form-check-label" for="check" style="margin-left: 0.4em;">An random value for my Status</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="submit" class="btn btn-secondary" style="margin-left: 0.5em; box-shadow: -2px 1px 3px grey;"><i class="far fa-plus-square" style="margin-right: 2px;"></i> Register</button>
        </div>
    </form>
    <?php require("presets/html-bottom.php"); ?>
</div>