<?php
require_once 'header.php';
?>
    <div class="container mt-5 mb-3 pt-3 text-white">
            <h1 class="mb-3 mt-5">Vídeos</h1>
        <div class="row">
            <?php 
                $videos = $modelos->getAllVideos();

                foreach($videos as $video): 
                    $modelo = $modelos->getModelo($video['id_modelo']);
                    if(count($modelo) > 0):
                    $arrayCel = str_split($modelo['celular']);
                    $celular = "(". $arrayCel[0] . $arrayCel[1] . ") " . $arrayCel[2] . $arrayCel[3] . $arrayCel[4] . $arrayCel[5] . $arrayCel[6] . " - " . $arrayCel[7] . $arrayCel[8] . $arrayCel[9] . $arrayCel[10];
            ?>
            <div class="col-md-6 mt-3 mb-3 card bg-black">
                <div class="row mt-3">
                    <div class="col-md-7">
                        <h3 class="title-modelo title-modelo-italic"><?php echo $modelo['nome'];?></h3>
                        <h6 class="text-white"><?php echo $modelo['cidade'] . " - " . $modelo['estado'];?></h6>
                    </div>
                    <div class="col-md-5">                        
                        <h6><img src="assets/img/whats.png" style="width:30px;"> <?php echo $celular;?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <video class="w-100" controls>
                            <source src="assets/videos/<?php echo $video['video'] . '.' . $video['tipo'];?>" type="video/<?php echo $video['tipo'];?>">
                        </video>
                    </div>
                </div>
            </div>
            <?php 
                endif;
                endforeach; ?>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>