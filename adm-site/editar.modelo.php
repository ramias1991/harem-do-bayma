<?php
session_start();
require_once '../assets/classes/Modelos.php';
$modelos = new Modelos();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
    header('Location: index.php');
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id_modelo = $_GET['id'];
    $modelo = $modelos->getModelo($id_modelo);
} else {
    header('Location: index.php');
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $modelos->editarModelo($_POST, $id_modelo);
    $modelos->editarFotoPerfil($_FILES['arquivo_img_perfil'], $id_modelo);
    $modelos->editarFotos($_FILES['arquivo_img'], $id_modelo);
    $modelos->editarVideos($_FILES['arquivo_video'], $id_modelo);
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
        <h1>Editar Modelo</h1>
        <form method="POST" enctype="multipart/form-data" class="mt-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" value="<?php echo $modelo['nome'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" placeholder="E-mail" class="form-control" value="<?php echo $modelo['email'];?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="plano">Plano: </label>
                    <select name="plano" id="plano" class="custom-select">
                        <option value="Modelo Padrão" <?php echo("Modelo Padrão" == $modelo['plano'])?"selected":"";?>>Modelo Padrão</option>
                        <option value="Modelo do Mês" <?php echo("Modelo do Mês" == $modelo['plano'])?"selected":"";?>>Modelo do Mês</option>
                        <option value="Modelo Diamont" <?php echo("Modelo Diamont" == $modelo['plano'])?"selected":"";?>>Modelo Diamont</option>
                        <option value="Modelo Gold" <?php echo("Modelo Gold" == $modelo['plano'])?"selected":"";?>>Modelo Gold</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="idade">Idade: </label>
                    <input type="text" name="idade" placeholder="Idade" class="form-control" value="<?php echo $modelo['idade'];?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="estado">Estado: </label>
                    <select name="estado" class="custom-select" id="estado">
                        <option value="">Estado</option>
                        <?php for($i=0;$i<count($estados); $i++){ ?>
                            <option value="<?php echo $estados[$i]['nome']?>" <?php echo($estados[$i]['nome'] == $modelo['estado'])?"selected":"";?>><?php echo $estados[$i]['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-5">
                <label for="cidade">Cidade: </label>
                <input type="text" name="cidade" placeholder="Cidade" class="form-control" value="<?php echo $modelo['cidade'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tipo">Tipo: </label>
                    <input type="text" name="tipo" placeholder="Tipo" class="form-control" value="<?php echo $modelo['tipo'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="biotipo">Biotipo: </label>
                    <input type="text" name="biotipo" placeholder="Biotipo" class="form-control" value="<?php echo $modelo['biotipo'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="altura">Altura: </label>
                    <input type="text" name="altura" placeholder="Altura" class="form-control" value="<?php echo $modelo['altura'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="peso">Peso: </label>
                    <input type="text" name="peso" placeholder="Peso" class="form-control" value="<?php echo $modelo['peso'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="manequim">Manequim: </label>
                    <input type="text" name="manequim" placeholder="Manequim" class="form-control" value="<?php echo $modelo['manequim'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="pes">Pés: </label>
                    <input type="text" name="pes" placeholder="Pés" class="form-control" value="<?php echo $modelo['pes'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="cabelo">Cabelo: </label>
                    <input type="text" name="cabelo" placeholder="Cabelo" class="form-control" value="<?php echo $modelo['cabelo'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="olhos">Olhos: </label>
                    <input type="text" name="olhos" placeholder="Olhos" class="form-control" value="<?php echo $modelo['olhos'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="celular">Celular: </label>
                    <input type="text" name="celular" placeholder="Celular (Somente números)" class="form-control" value="<?php echo $modelo['celular'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp_sms">WhatsApp e SMS: </label>
                    <input type="text" name="whatsapp_sms" placeholder="WhatsApp e SMS" class="form-control" value="<?php echo $modelo['whatsapp_sms'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="horario">Horário: </label>
                    <input type="text" name="horario" placeholder="Horário" class="form-control" value="<?php echo $modelo['horario'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="faz_o_perfil">Faz o perfil: </label>
                    <input type="text" name="faz_o_perfil" placeholder="Faz o Perfil" class="form-control" value="<?php echo $modelo['faz_o_perfil'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="acompanha">Acompanha: </label>
                    <input type="text" name="acompanha" placeholder="Acompanha" class="form-control" value="<?php echo $modelo['acompanha'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="atendo_em">Atendo em: </label>
                    <input type="text" name="atendo_em" placeholder="Atendo em" class="form-control" value="<?php echo $modelo['atendo_em'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cache">Cachê: </label>
                    <input type="text" name="cache" placeholder="Cachê" class="form-control" value="<?php echo $modelo['cache'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="aceita_cartao">Aceita Cartão: </label>
                    <input type="text" name="aceita_cartao" placeholder="Aceita Cartão" class="form-control" value="<?php echo $modelo['aceita_cartao'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="periodo">Perído: </label>
                    <input type="text" name="periodo" placeholder="Período" class="form-control" value="<?php echo $modelo['periodo'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idiomas">Idiomas: </label>
                    <input type="text" name="idiomas" placeholder="Idiomas" class="form-control" value="<?php echo $modelo['idiomas'];?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="especialidades">Especialidades: </label>
                    <input type="text" name="especialidades" placeholder="Especialidades" class="form-control" value="<?php echo $modelo['especialidades'];?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="permite_fumar">Permite fumar: </label>
                    <input type="text" name="permite_fumar" placeholder="Permite Fumar" class="form-control" value="<?php echo $modelo['permite_fumar'];?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="viaja">Viaja: </label>
                    <input type="text" name="viaja" placeholder="Viaja" class="form-control" value="<?php echo $modelo['viaja'];?>">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"><?php echo $modelo['descricao'];?></textarea>
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
            <input type="submit" value="Editar" class="btn btn-primary mt-3 mb-5">
        </form>
    </div>
    <div class="container mb-5">
        <h5>Foto de Perfil</h5>
        <div class="row">
            <div class="col-md-3">
                <?php if(strlen($modelo['img_perfil']) > 0){?>
                    <img src="../assets/img/modelos/perfil/<?php echo $modelo['img_perfil'] . '.jpg';?>" alt="Modelo <?php echo $modelo['nome'];?>" class="img-fluid">
                <?php } else {?>
                    <img src="../assets/img/modelos/perfil/default.jpg" alt="Modelo Perfil" class="img-fluid">
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <h5>Fotos</h5>
        <div class="row">
            <?php
                $fotos = $modelos->getFotos($id_modelo);
                foreach($fotos as $foto):?>
                <div class="col-md-3">
                    <img src="../assets/img/modelos/<?php echo $foto['imagem'] . '.' . $foto['tipo'];?>" alt="Modelo <?php echo $modelo['nome'];?>" class="img-fluid">
                    <a href="excluir.foto.php?id_foto=<?php echo $foto['id'];?>" class="btn btn-danger">Excluir</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container mb-5">
        <h5>Vídeos</h5>
        <div class="row">
            <?php
                $videos = $modelos->getVideos($id_modelo);
                foreach($videos as $video):?>
                <div class="col-md-4">
                    <video class="w-100" controls>
                        <source src="../assets/videos/<?php echo $video['video'] . '.' . $video['tipo'];?>" type="video/<?php echo $video['tipo'];?>">
                    </video>
                    <a href="excluir.video.php?id=<?php echo $video['id']; ?>" class="btn btn-danger">Excluir</a>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>