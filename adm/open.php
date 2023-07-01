<?php
require_once("../lib/db.php");
if(!isset($_COOKIE[$keks])) {header("Location: ../adm/?nopassword=1");}

# close Befehl
$close = $_GET['close'];
if ($close == null) {}
else {if ($link->query("UPDATE support SET closed=1 WHERE id=$close;") === TRUE) {$msg = '<div class="alert alert-success text-center" id="alert"><i class="bi bi-check-circle"></i> Das Ticket #'.$close.' wurde geschlossen.</div>';}}

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
        <div class="row align-items-start mt-4">
            <?php echo $msg?>
            <div class="col-2">
                <ul class="list-group" id="admnavbar"></ul>
            </div>
            <div class="col"><table class="w-100 table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>E-Mail</th>
                        <th>Problem</th>
                        <th><i class="bi bi-clock"></i></th>
                        <th><i class="bi bi-hand-index"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $result = mysqli_query($link, "SELECT * FROM support WHERE closed=0");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo('<tr>
                            <td>'.$row["id"].'</td>
                            <td><a href=mailto:'.$row["email"].'>'.$row["email"].'</a></td>
                            <td>'.$row["problem"].'</td>
                            <td>'.$row["time"].'</td>
                            <td>
                                <a href="?close='.$row["id"].'" style="color: red; padding: 3px;" title="Ticket Schließen"><i class="bi bi-x-circle"></i></a>
                                <a href="view?id='.$row["id"].'" style="color: green; padding: 3px;" title="Ticket Anschauen"><i class="bi bi-eye"></i></a>
                            </td></tr>');
                    }
                } else {echo "<h1>Keine Tickets offen!</h1>";}
                ?>
                </tbody>
            </table></div>
        </div>
    </div>
</body>
<script>
    $("#alert").delay(3000).queue(function() {$(this).remove(); window.location.href = "../adm/open";});
</script>
<script>
    $("#navbarload").load("../lib/navbar.html");
    $("#admnavbar").load("../lib/admnavbar.html");
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
<?php $link->close();?>