<?php
require_once('./lib/db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]);
    $problem = trim($_POST["problem"]);
    $sql = "INSERT INTO support (email,problem) VALUES ('$email', '$problem')";
    if ($link->query($sql) === TRUE) {
        $message = '<div class="alert alert-success mx-auto mt-4 text-center" role="alert" style="width: 75%;"><i class="bi bi-check-circle-fill"></i> Dein Ticket wurde gesendet!</div>';
        # Mail Senden
        $mailbody = '<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"></head>
            <body class="bg-light">
                <div class="m-5">
                    <div class="text-center"><img src="https://www.datalok.de/assets/logos/BoxLogo.webp" alt="DataBox Mail" width="150vw"><h1>Ein Neues Ticket von <br>'.$email.'</h1></div>
                    <div class="card w-50 mx-auto mt-3"><div class="card-body"><p>'.$problem.'</p><hr><a class="btn btn-primary w-100" href="https://datalok.de/support/adm"><i class="bi bi-tools"></i> Admin Panel</a></div></div>
                </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            </body></html>';
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.sendgrid.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'apikey';
            $mail->Password   = 'yourkey';
            $mail->Port       = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->setFrom('support@datalok.de', 'Datalok Support');
            $mail->addAddress('admin@datalok.de');
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Subject = 'Neues Ticket erhalten!';
            $mail->Body    = $mailbody;
            $mail->send();
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
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
    <script src="lib/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top" id="navbarload"></nav>
    <div class="container-md">
        <?php echo $message?>
        <div class="card my-4 mx-auto" style="width: 75%;">
            <h5 class="card-header">Erstelle dein Ticket</h5>
            <form action="new" method="POST" class="card-body" id="ticketform">
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">E-Mail Addresse</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="rackl@gmail.com" required>
                    <div id="emailHelp" class="form-text">Wir nutzen die E-Mail nur um dich zu Kontaktieren! Wir senden keine Werbung!</div>
                </div>
                <div class="mb-4"><label for="exampleInputPassword1" class="form-label">Dein Problem:</label><textarea name="problem" class="form-control" id="exampleInputPassword1" style="height: 200px;" placeholder="Mein Toaster ist explodiert..." required></textarea></div>
                <button class="btn btn-success w-100" type="submit" form="ticketform" value="Submit"><i class="bi bi-send-fill"></i> TICKET SENDEN!</button>
            </form>
        </div>
    </div>
</body>
<script>
    $("#navbarload").load("lib/navbar.html");
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
<?php $link->close();?>