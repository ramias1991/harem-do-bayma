<?php
session_start();
require_once '../assets/classes/Modelos.php';
require_once '../assets/classes/Visitas.php';
$modelos = new Modelos();
$visitas = new Visitas();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADM - Harém do Bayma</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="adm-nav">
            <div class="container ">
                <a href="" class="navbar-brand"></a>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
    </nav>

    <div class="container mg-top pt-5">
        <h1>Visitas</h1>
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <div class="card bg-primary">
                    <div class="card-header text-center text-white">
                        <h3>Total de Visitas</h3>
                    </div>
                    <div class="card-body text-center text-white">
                        <h1><?php echo $visitas->getVisitas();?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-header text-center text-white">
                        <h3>Visitas Únicas (Qtd de dispositivos)</h3>
                    </div>
                    <div class="card-body text-center text-white">
                        <h1><?php echo $visitas->getVisitasUnica();?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>