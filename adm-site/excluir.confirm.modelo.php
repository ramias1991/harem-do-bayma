<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id_modelo = $_GET['id'];
} else {
    header("Location: login.php");
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
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="adm-nav">
            <div class="container ">
                <a href="" class="navbar-brand"></a>
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </nav>
        <div class="container mg-top pt-5">
            <h1 class="text-center">Deseja realmente exluir essa modelo?</h1>

            <div class="row m-auto p-5 d-flex justify-content-center">
            <a href="excluir.modelo.php?id=<?php echo $id_modelo;?>" class="btn btn-danger btn-lg mr-2">SIM</a> 
            <a href="index.php" class="btn btn-success btn-lg ml-2">NÃO</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>