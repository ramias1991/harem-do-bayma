<?php
session_start();
require_once '../assets/classes/Modelos.php';
$modelos = new Modelos();
$listaModelos = $modelos->getModelos();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $id = $_SESSION['id'];
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
            <h1>Área Restrita</h1>
            <a href="add_modelo.php" class="btn btn-success mt-3">Adiconar Modelo</a>
            <a href="visitas.site.php" class="btn btn-info mt-3">Visitas</a>
            <table class="table table-hover mt-5 col-md-12">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="text-center">-</th>
                </thead>
                <tbody>
                    <?php $i=1;foreach($listaModelos as $modelo): ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $modelo['nome'];?></td>
                        <td>
                            <a href="editar.modelo.php?id=<?php echo $modelo['id'];?>" class="btn btn-primary">Editar</a>
                            <a href="excluir.confirm.modelo.php?id=<?php echo $modelo['id'];?>" class="btn btn-danger">Excluir</a>
                            <?php if($modelo['status'] == 1){?>
                                <a href="desativar.modelo.php?id=<?php echo $modelo['id'];?>" class="btn btn-warning">Desativar</a>
                            <?php } else {?>
                                <a href="ativar.modelo.php?id=<?php echo $modelo['id'];?>" class="btn btn-success">Ativar</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>