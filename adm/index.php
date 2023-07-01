<?php
$keepass = 'password1';
require_once("../lib/db.php");

$logout = $_GET['logout'];
if ($logout==1) {
    unset($_COOKIE[$keks]);
    $msg = '<div class="alert alert-info mx-auto text-center w-75 mt-4" role="alert"><i class="bi bi-arrow-bar-left"></i> Du wurdest abgemeldet!</div>';
};

if(isset($_COOKIE[$keks])) {
    header("Location: ../adm/open");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = trim($_POST['password']);
    if ($password == $keepass) {
        $cookie_name = $keks;
        $cookie_value = "1";
        setcookie($cookie_name, $cookie_value, time() + (21600), "/");
        header("Location: ../adm/open");
    } else {$msg = '<div class="alert alert-danger mx-auto text-center w-75 mt-4" role="alert"><i class="bi bi-exclamation-diamond-fill"></i> Das Passwort ist Falsch!</div>';}
}

$nopassword = $_GET["nopassword"];
if ($nopassword=="1") {
    $msg = '<div class="alert alert-warning mx-auto text-center w-75 mt-4" role="alert"><i class="bi bi-exclamation-diamond-fill"></i> Melde dich zuerst an!</div>';
}
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
<head>
    <title>Datalok Support</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.datalok.de/assets/logos/BoxLogo.webp" type="image/x-icon">
    <script src="../lib/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top" id="navbarload"></nav>
    <div class="container-md">
        <?php echo $msg?>
        <div class="card my-4 mx-auto w-75">
            <h5 class="card-header">Anmelden</h5>
            <form action="../adm/" method="POST" class="card-body" id="admform">
                <p class="card-text">Um aufs Admin Panel Zugriff zu bekommen musst du dich authentifizieren.</p>
                <input name="password" type="password" class="form-control mb-3" placeholder="Passwort" required>
                <button type="submit" form="admform" class="btn btn-success shadow-sm"><i class="bi bi-box-arrow-in-right"></i> Anmelden</button>
            </form>
        </div>
    </div>
</body>
<script>
    $("#navbarload").load("../lib/navbar.html");
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
<?php $link->close();?>