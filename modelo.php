<?php
require_once 'header.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id_modelo = $_GET['id'];
}

$modelo = $modelos->getModelo($id_modelo);
$arrayCel = str_split($modelo['celular']);
$celular = "(". $arrayCel[0] . $arrayCel[1] . ") " . $arrayCel[2] . $arrayCel[3] . $arrayCel[4] . $arrayCel[5] . $arrayCel[6] . " - " . $arrayCel[7] . $arrayCel[8] . $arrayCel[9] . $arrayCel[10];

?>
    <div class="container p-3">
        <div class="row mt-5">
            <div class="col-md-3 mb-3">
            <div class="accordion" id="accordionExample">
                <div class="card bg-black">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Perfil +
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table bg-black bg-black table-dark table-striped table-sm">
                            <tr><td><span class="title-modelo">Idade:</span> <?php echo $modelo['idade'];?></td></tr>
                            <tr><td><span class="title-modelo">Tipo:</span> <?php echo $modelo['tipo'];?></td></tr>
                            <tr><td><span class="title-modelo">Biotipo:</span> <?php echo $modelo['biotipo'];?></td></tr>
                            <tr><td><span class="title-modelo">Altura:</span> <?php echo $modelo['altura'];?></td></tr>
                            <tr><td><span class="title-modelo">Peso:</span> <?php echo $modelo['peso'];?></td></tr>
                            <tr><td><span class="title-modelo">Manequim:</span> <?php echo $modelo['manequim'];?></td></tr>
                            <tr><td><span class="title-modelo">Pés:</span> <?php echo $modelo['pes'];?></td></tr>
                            <tr><td><span class="title-modelo">Cabelos:</span> <?php echo $modelo['cabelo'];?></td></tr>
                            <tr><td><span class="title-modelo">Olhos:</span> <?php echo $modelo['olhos'];?></td></tr>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="card bg-black p-0">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Atendimento +
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table bg-black table-dark table-striped table-sm">
                            <tr><td><span class="title-modelo">Celular:</span> <?php echo $celular;?></td></tr>
                            <tr><td><span class="title-modelo">Horário:</span> <?php echo $modelo['horario'];?></td></tr>
                            <tr><td><span class="title-modelo">Faz o perfil:</span> <?php echo $modelo['faz_o_perfil'];?></td></tr>
                            <tr><td><span class="title-modelo">Acompanha:</span> <?php echo $modelo['acompanha'];?></td></tr>
                            <tr><td><span class="title-modelo">Atendo em:</span> <?php echo $modelo['atendo_em'];?></td></tr>
                            <tr><td><span class="title-modelo">WhatsApp e SMS:</span> <?php echo $modelo['whatsapp_sms'];?></td></tr>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="card bg-black">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Extra +
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table bg-black table-dark table-striped table-sm">
                            <tr><td><span class="title-modelo">Cachê:</span> <?php echo $modelo['cache'];?></td></tr>
                            <tr><td><span class="title-modelo">Aceita cartão:</span> <?php echo $modelo['aceita_cartao'];?></td></tr>
                            <tr><td><span class="title-modelo">Período:</span> <?php echo $modelo['periodo'];?></td></tr>
                            <tr><td><span class="title-modelo">Idiomas:</span> <?php echo $modelo['idiomas'];?></td></tr>
                            <tr><td><span class="title-modelo">Especialidades:</span> <?php echo $modelo['especialidades'];?></td></tr>
                            <tr><td><span class="title-modelo">Permite fumar:</span> <?php echo $modelo['permite_fumar'];?></td></tr>
                            <tr><td><span class="title-modelo">Viaja:</span> <?php echo $modelo['viaja'];?></td></tr>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-9 bg-black card pb-3">
                <div class="row mt-3">
                    <div class="col-md-7">
                        <h1 class="title-modelo title-modelo-italic"><?php echo $modelo['nome'];?></h1>
                        <h5 class="text-white"><?php echo $modelo['cidade'] . " - " . $modelo['estado'];?></h5>
                    </div>
                    <div class="col-md-5">                        
                        <a href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $modelo['celular'];?>&text=Olá! Te vi no Harém do Bayma. Gostaria de mais informações.">
                            <h5 class="text-white"><img src="assets/img/whats.png" style="width:30px;"> <?php echo $celular;?></h5>
                        </a>
                        <span class="title-modelo-italic text-white">Fale com ela sem adicionar!</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php $fotosModelo = $modelos->getFotos($id_modelo);?>
                        <div id="carousel-top-exibir" class="carousel slide carousel-fade mt-3" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                    $i = 1;
                                    foreach($fotosModelo as $fotoModelo):
                                ?>
                                <div class="carousel-item <?php if($i++ == 1){echo "active";}?>">
                                    <img src="assets/img/modelos/<?php echo $fotoModelo['imagem'] . '.jpeg';?>" class="d-block w-100">
                                </div>
                                <?php endforeach;?>

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
                </div>
                <div class="modalInicioFoto"></div>
                <div class="caixaModalFoto">
                    <img src="" class="d-block w-100 img-fluid">
                    <button class="btn btn-dark caixaModalFotoFechar mt-1">X</button>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-black p-3 card">
            <div class="col-md-12">
            <h5 class="text-white">Descrição</h5>
                <div class="row">
                    <div class="col-md-4">
                        <img src="assets/img/modelos/perfil/<?php echo $modelo['img_perfil'].".jpg";?>" class="img-fluid w-100">
                    </div>
                    <div class="col-md-8 text-white">
                        <h5 class="title-modelo"><?php echo $modelo['nome'] . " - " . $celular;?></h5>
                        <p>
                            <?php echo $modelo['descricao'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $videos = $modelos->getVideos($id_modelo);
            if(count($videos) > 0):
        ?>
        <div class="row">
            <?php foreach($videos as $video):?>
            <div class="mt-5 bg-black p-3 card col-md-6">
                <div class="col-md-12">
                    <h5 class="text-white">Vídeo</h5>
                        <video class="w-100" controls>
                            <source src="assets/videos/<?php echo $video['video'] . '.' . $video['tipo'];?>" type="video/<?php echo $video['tipo'];?>">
                        </video>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        
        <?php endif; ?>
    </div>
</div>

<?php
require_once 'footer.php';
?>