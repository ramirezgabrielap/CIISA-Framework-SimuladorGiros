<?php 

$rut = $_POST['rut'] . "-" . $dv = $_POST['dv'];
$pass = $_POST['pass'];
$tipoC = $_POST['tipoC'];
$monto = $_POST['monto'];

$UNO = ['Juan','1-9','Cuenta Corriente',200000];
$DOS = ['Pedro','2-7','Cuenta Corriente',150000];
$TRE = ['Luis','3-5','Cuenta Corriente',200000];
$CUA = ['Tina','4-3','Cuenta Corriente',150000];
$CIN = ['Ana','5-1','Cuenta Corriente',200000];
$SEI = ['Pedro','2-7','Cuenta Vista',100000];
$SIE = ['Luis','3-5','Cuenta Vista',100000];

$clientes = [$UNO, $DOS, $TRE, $CUA, $CIN, $SEI, $SIE];
$error = "<!DOCTYPE html>"."<html lang='en'>".
"<head>".
"<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css' integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>".
"<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css'>".
"</head>"."<br>".
"<body style='display: grid; justify-content: center; background-color: #EAFAF1'>".
"<div class='row justify-content-center'>".
"<div class='col-md-8'>".
"<h1>Error en los datos ingresados.</h1>" . "<br>".
"<h3>Por favor, vuelva a intentarlo; "."<br>"."validando que los datos sean los que correspondan.</h3>"."<br>".
"<button class='btn btn-success' onclick='return window.history.back();'>Volver a Consultar</button>" . "<br>".
"</div>"."</div>"."</body>" . "</html>"; 


$data = [];
$saldo = 0;

foreach ($clientes as $cliente) {
    if($rut==$cliente[1] && $tipoC==$cliente[2]){
        $data = $cliente;
        break;
    }
}

if(empty($data)){
    echo $error;
    return false;
}

if($pass != $data[0]){
    echo $error;
    return false;
}

if($tipoC != $data[2]){
    echo $error;
    return false;
}

if($monto > $data[3]){
    echo "<!DOCTYPE html>"."<html lang='en'>".
    "<head>".
    "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css' integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>".
    "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css'>".
    "</head>"."<br>".
    "<body style='display: grid; justify-content: center; background-color: #EAFAF1'>".

    "<div class='row justify-content-center'>".
    "<div class='col-md-10'>".
    "<h1>Error en los datos ingresados.</h1>" . "<br>".
    "<h3>Por favor, vuelva a intentarlo; "."<br>"."validando que"."<br>"."<i>NO Exceda el Monto Máximo.<i></h3>"."<br>".
    "<button class='btn btn-success' onclick='return window.history.back();'>Volver a Intentarlo</button>" . "<br>".
    "</div>"."</div>"."</body>" . "</html>";

    return false;
} else {
    $saldo = $data[3] - $monto;
}

// RESUMEN TRANSACCIÓN

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css' integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>";
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css'>";
echo "</head>";

echo "<br>" . "<h1>" . "Resumen de la transacción: " . "</h1>" . "<br>";
echo "<body style='display: grid; justify-content: center; background-color: #EAFAF1'>";
echo "<div class='card'>";
echo "<div class='card-body'>";

echo "<h3>" . "Rut: " . "</h3>" . $data[1] . "<br>";
echo "<h3>" . "Tipo de Cuenta: " . "</h3>" . $data[2] . "<br>";
echo "<h3>" . "Monto Girado: " . "</h3>" . $monto. "<br>";
echo "<h3>" . "Saldo disponible: " . "</h3>" . $saldo . "<br>";

echo "</div>";
echo "</div>";

echo "<br><button type='submit' class='btn btn-success'><a href='../index.php'>Cerrar Sesión</a></button>";

echo "<body>" . "</html>";

?>