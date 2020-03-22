<?php
require_once 'header.php';
$tipos = $modelos->getModeloTipo();
$estados = $modelos->getModeloEstado();

if(isset($_GET['tipo']) && !empty($_GET['tipo']) || isset($_GET['estado']) && !empty($_GET['estado'])){
    $tipoB = $_GET['tipo'];
    $estadoB = $_GET['estado'];
} else {
    $modelosBusca = $modelos->getModelos();
    $tipoB = "";
    $estadoB = "Maranhão";
}

if(!empty($tipoB) && empty($estadoB)){
    $modelosBusca = $modelos->modelosBuscaTipo($tipoB);
} elseif (!empty($estadoB) && empty($tipoB)){
    $modelosBusca = $modelos->modelosBuscaEstado($estadoB);
} elseif (!empty($tipoB) && !empty($estadoB)){
    $modelosBusca = $modelos->modelosBuscaTipoEstado($tipoB, $estadoB);
}
?>
    <div class="container mt-5 mb-3 pt-3">
        <form class="mg-top mb-3" method="GET">
            <div class="form-row">
                <div class="form-group col-md-3 mr-3 mt-2">
                    <select name="tipo" id="tipo" class="custom-select">
                        <option value="">Tipo</option>
                        <?php foreach($tipos as $tipo):?>
                            <option value="<?php echo $tipo['tipo'];?>" <?php echo($tipoB == $tipo['tipo'])?'selected':''; ?>><?php echo $tipo['tipo'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-5 mr-3 mt-2">
                    <select name="estado" id="estado" class="custom-select">
                        <option value="">Estado</option>
                        <?php foreach($estados as $estado):?>
                            <option value="<?php echo $estado['estado'];?>" <?php echo($estadoB == $estado['estado'])?'selected':''; ?>><?php echo $estado['estado'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" value="Procurar" class="btn btn-dark bg-black mt-2">
                </div>
            </div>
        </form>
    </div>

    <div class="container card mb-3 bg-black">
        <h5 class="text-white mt-3">MODELOS</h5>
        <div class="row">
            <?php
                foreach($modelosBusca as $modelo):
                    if($modelo['status'] == 1):
            ?>
            <div class="col-md-4 col-6 text-center mt-3 mb-3">
                <a href="modelo.php?id=<?php echo $modelo['id'];?>" class="a-hover">
                    <img src="assets/img/modelos/perfil/<?php echo $modelo['img_perfil'] . '.jpg';?>" class="img-fluid w-100" title="Modelo <?php echo $modelo['nome'] . " GP";?>">
                </a>
                <span class="text-white"><?php echo $modelo['nome'];?></span>
            </div>
            <?php
                endif;
                endforeach;
            ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>