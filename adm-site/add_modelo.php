<?php
session_start();
require_once '../assets/classes/Modelos.php';
$modelos = new Modelos();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header('Location: index.php');
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $modelos->addModelo($_POST);
    $modelos->addFotoPerfil($_FILES['arquivo_img_perfil']);
    $modelos->addFotos($_FILES['arquivo_img']);
    $modelos->addVideos($_FILES['arquivo_video']);
}

$estados = array(
    array("sigla" => "AC", "nome" => "Acre"),
    array("sigla" => "AL", "nome" => "Alagoas"),
    array("sigla" => "AM", "nome" => "Amazonas"),
    array("sigla" => "AP", "nome" => "Amapá"),
    array("sigla" => "BA", "nome" => "Bahia"),
    array("sigla" => "CE", "nome" => "Ceará"),
    array("sigla" => "DF", "nome" => "Distrito Federal"),
    array("sigla" => "ES", "nome" => "Espírito Santo"),
    array("sigla" => "GO", "nome" => "Goiás"),
    array("sigla" => "MA", "nome" => "Maranhão"),
    array("sigla" => "MT", "nome" => "Mato Grosso"),
    array("sigla" => "MS", "nome" => "Mato Grosso do Sul"),
    array("sigla" => "MG", "nome" => "Minas Gerais"),
    array("sigla" => "PA", "nome" => "Pará"),
    array("sigla" => "PB", "nome" => "Paraíba"),
    array("sigla" => "PR", "nome" => "Paraná"),
    array("sigla" => "PE", "nome" => "Pernambuco"),
    array("sigla" => "PI", "nome" => "Piauí"),
    array("sigla" => "RJ", "nome" => "Rio de Janeiro"),
    array("sigla" => "RN", "nome" => "Rio Grande do Norte"),
    array("sigla" => "RO", "nome" => "Rondônia"),
    array("sigla" => "RS", "nome" => "Rio Grande do Sul"),
    array("sigla" => "RR", "nome" => "Roraima"),
    array("sigla" => "SC", "nome" => "Santa Catarina"),
    array("sigla" => "SE", "nome" => "Sergipe"),
    array("sigla" => "SP", "nome" => "São Paulo"),
    array("sigla" => "TO", "nome" => "Tocantins")
    );
    
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
    <div class="container mg-top-add-model">
        <h1>Adicionar Modelo</h1>
        <form method="POST" enctype="multipart/form-data" class="mt-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="email" name="email" placeholder="E-mail" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <select name="plano" id="plano" class="custom-select">
                        <option value="Modelo Padrão">Modelo Padrão</option>
                        <option value="Modelo do Mês">Modelo do Mês</option>
                        <option value="Modelo Diamont">Modelo Diamont</option>
                        <option value="Modelo Gold">Modelo Gold</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="idade" placeholder="Idade" class="form-control">
                </div>
                <div class="form-group col-md-5">
                    <select name="estado" class="custom-select">
                        <option value="">Estado</option>
                        <?php
                        for($i=0;$i<count($estados); $i++){
                            echo "<option value='".$estados[$i]['nome']."'>" . $estados[$i]['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="cidade" placeholder="Cidade" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="text" name="tipo" placeholder="Tipo" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="biotipo" placeholder="Biotipo" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="altura" placeholder="Altura" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="peso" placeholder="Peso" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="text" name="manequim" placeholder="Manequim" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="pes" placeholder="Pés" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="cabelo" placeholder="Cabelo" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="olhos" placeholder="Olhos" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="celular" placeholder="Celular (Somente números)" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="whatsapp_sms" placeholder="WhatsApp e SMS" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="horario" placeholder="Horário" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="faz_o_perfil" placeholder="Faz o Perfil" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="acompanha" placeholder="Acompanha" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="atendo_em" placeholder="Atendo em" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <input type="text" name="cache" placeholder="Cachê" class="form-control">
                </div>
                <div class="form-group col-md-4">
                <input type="text" name="aceita_cartao" placeholder="Aceita Cartão" class="form-control">
                </div>
                <div class="form-group col-md-4">
                <input type="text" name="periodo" placeholder="Período" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="idiomas" placeholder="Idiomas" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="especialidades" placeholder="Especialidades" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="permite_fumar" placeholder="Permite Fumar" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" name="viaja" placeholder="Viaja" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="arquivo_img_perfil">Foto Perfil: <input type="file" name="arquivo_img_perfil" id="arquivo_img_perfil" class="form-control-file"></label>
            </div>
            <div class="form-group">
                <label for="">Fotos: <input type="file" name="arquivo_img[]" id="arquivo_img" multiple class="form-control-file"></label>
            </div>
            <div class="form-group">
                <label for="">Vídeos: <input type="file" name="arquivo_video[]" id="arquivo_video" multiple class="form-control-file"></label>
            </div>
            <input type="submit" value="Enviar" class="btn btn-primary mt-3 mb-5">
        </form>
    </div>

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>