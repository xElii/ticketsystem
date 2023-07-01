<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
<head>
    <title>Datalok Support</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.datalok.de/assets/logos/BoxLogo.webp" type="image/x-icon">
    <script src="lib/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top" id="navbarload"></nav>
    <div class="container-md">
        <div class="card my-4">
            <h5 class="card-header text-center">DATALOK Support</h5>
            <div class="card-body text-center">
                <p class="card-text">Falls du ein Problem mit einem Dienst von Datalok hast, kannst du dich hier mit dem Team in Kontakt setzen.<br>Erstelle einfach ein neues Ticket mit dieser Schaltfläche:</p>
                <a class="btn btn-success shadow-sm" href="new"><i class="bi bi-file-earmark-plus"></i> Neues Ticket</a>
            </div>
        </div>
        <div class="card mb-4">
            <h5 class="card-header text-center">DATALOK Selbst</h5>
            <div class="card-body text-center">
                <p>Was machen wir?</p>
                <img class="img-fluid" src="lib/DatalokInfoBlatt.svg" alt="Wir sind alles.">
                <p class="mt-3">Hauptsächlich hosten wir verschieden Dienste!</p>
                <a class="btn btn-primary shadow-sm" href="https://www.datalok.de/"><i class="bi bi-house-fill"></i> Datalok Homepage</a>
            </div>
        </div>
    </div>
</body>
<script>
    $("#navbarload").load("lib/navbar.html");
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>