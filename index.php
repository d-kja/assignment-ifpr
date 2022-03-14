<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exy | Login</title>
    <?php require_once("presets/links.php"); ?>
    <link rel="stylesheet" href="presets/css/style.css">
    <style>
        @media all and (max-width: 991px) {
            .title {
                position: absolute;
                left: 25em;
                bottom: 0.34em;
            }
        }

        @media all and (max-width: 754px) {
            .title {
                position: absolute;
                left: 20em;
                bottom: 0.34em;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navEdit" style="margin: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span style="font-weight: 500;">EXY</span> | Navbar</a>
            <div class="title">
                <span class="navbar-brand mb-0 h1 txtAlign"> LOGIN <span class="iconST"><i class="fas fa-sign-in-alt"></i></span></span>
            </div>
        </div>
    </nav>
    <div class="container p-5">
        <form method="POST" action="auth.php">
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
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-secondary" style="margin-left: 0.5em; box-shadow: -2px 1px 3px grey;">Submit</button>
            </div>
        </form>
        <?php require_once("presets/dialog-div.php"); ?>
    </div>
</body>

</html>