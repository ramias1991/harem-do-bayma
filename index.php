<?php
require_once 'header.php';
$estados = $modelos->getModeloEstado();
if(isset($_GET['estado']) && !empty($_GET['estado'])){
    $estadoB = $_GET['estado'];
} else {
    $estadoB = 'Maranhão';
}
?>
    <div class="container p-3">
        <div class="row mt-5">
            <form method="GET" class="form-inline">
                <div class="form-group mt-3 mr-3">
                    <select name="estado" id="estado" class="custom-select" onchange="this.form.submit()">
                        <option value="">Estado</option>
                        <?php foreach($estados as $estado):?>
                            <option value="<?php echo $estado['estado'];?>" <?php echo($estadoB == $estado['estado'])?'selected':''; ?>><?php echo $estado['estado'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="container pb-3" id="slide-top">
        <div class="row">
            <div class="col-md-7 card bg-black mt-2 pb-3">             
                <h4 class="title-modelo mt-3" style="color:red;">MODELOS DO MÊS</h4>
                <?php $modelosMes = $modelos->getModelosMes($estadoB);
                ?>
                <div id="carousel-top-exibir" class="carousel slide carousel-fade mt-3" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                            $i = 1;
                            foreach($modelosMes as $modeloMes):
                                $fotosSlides = $modelos->getFotosExibir($modeloMes['id']);
                                foreach($fotosSlides as $fotoSlide):
                        ?>
                        <div class="carousel-item <?php if($i++ == 1){echo "active";}?>">
                            <a href="modelo.php?id=<?php echo $fotoSlide['id_modelo'];?>">
                                <img src="assets/img/modelos/<?php echo $fotoSlide['imagem'] . '.' . $fotoSlide['tipo'];?>" class="d-block w-100" title="Modelo <?php echo $modeloMes['nome'] . " GP";?>">
                            </a>
                            <div class="carousel-legend p-3">
                                <?php echo "<h4>".$modeloMes['nome']."</h4>"; if($modeloMes['nome'] == "Bruna Ferraz"){
                                    echo "<h5>Capa da Sexy e Ex Miss Bumbum</h5>";
                                }?>
                            </div>
                        </div>
                        <?php 
                                endforeach;
                            endforeach;?>

                    </div>
                    <a class="carousel-control-prev" href="#carousel-top-exibir" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-top-exibir" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-5 card bg-black mt-2">
                <div class="row">
                    <h5 class="title-modelo mt-3 ml-3">MODELOS DIAMOND</h5>
                </div>
                <div class="row">
                    <?php
                        $modelosDiamont = $modelos->getModelosDiamont($estadoB);
                        foreach($modelosDiamont as $modeloDiamont):
                    ?>
                    <div class="col-12 col-md-6 mt-2 mb-3 text-center">
                        <a href="modelo.php?id=<?php echo $modeloDiamont['id'];?>" class="a-hover text-link">
                            <img src="assets/img/modelos/perfil/<?php echo $modeloDiamont['img_perfil'] . '.jpg';?>" class="img-fluid w-100" title="Modelo <?php echo $modeloDiamont['nome'] . " GP";?>">
                        </a>
                        <span class="text-white"><?php echo $modeloDiamont['nome'];?></span>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12 card bg-black mt-3">
                <div class="row">
                    <h5 class="title-modelo mt-3 ml-3">MODELOS GOLD</h5>
                </div>
                <div class="row">
                    <?php
                        $modelosGold = $modelos->getModelosGold($estadoB);
                        foreach($modelosGold as $modeloGold):
                    ?>
                    <div class="col-md-3 col-6 mt-2 mb-3 text-center">
                        <a href="modelo.php?id=<?php echo $modeloGold['id'];?>" class="a-hover text-link">
                            <img src="assets/img/modelos/perfil/<?php echo $modeloGold['img_perfil'] . '.jpg';?>" class="img-fluid w-100" title="Modelo <?php echo $modeloGold['nome'] . " GP";?>">
                        </a>
                        <span class="text-white"><?php echo $modeloGold['nome'];?></span>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container card mb-3 bg-black">
        <h5 class="title-modelo mt-3">MODELOS SELECT</h5>
        <div class="row">
            <?php foreach($modelos->getModelosIndex($estadoB) as $modelo):
                if($modelo['status'] == 1): ?>
            <div class="col-md-4 col-6 text-center mt-3 mb-3">
                <a href="modelo.php?id=<?php echo $modelo['id'];?>" class="a-hover">
                    <img src="assets/img/modelos/perfil/<?php echo $modelo['img_perfil'] . '.jpg';?>" class="img-fluid w-100" title="Modelo <?php echo $modelo['nome'] . " GP";?>">
                </a>
                <span class="text-white"><?php echo $modelo['nome'];?></span>
            </div>
            <?php 
                endif;
                endforeach;?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>