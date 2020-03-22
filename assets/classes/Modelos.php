<?php
require_once 'Conexao.php';

class Modelos extends Conexao{
    private $nome, $email, $idade, $estado, $cidade, $tipo, $biotipo, $altura, $peso, $manequim, $pes, $cabelo, $olhos, $celular, $horario, $faz_o_perfil, $acompanha, $atendo_em, $whatsapp_sms, $cache, $aceita_cartao, $periodo, $idiomas, $especialidades, $permite_fumar, $viaja;

    //Verificar se a modelo já foi cadastrada antes
    private function validarModelo($email){
        $sql = "SELECT * FROM modelos WHERE email=:email";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    //Ativar a modelo para visualização
    public function ativarModelo($id){
        $sql = "UPDATE modelos SET status = :sts WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':sts', 1);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    //Desativar a modelo para visualização
    public function desativarModelo($id){
        $sql = "UPDATE modelos SET status = :sts WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':sts', 0);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    //Excluir a modelo
    public function excluirModelo($id){
        $sql = "DELETE FROM modelos WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    //Pegar dados de uma modelo
    public function getModelo($id){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE modelos.id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        } else {
            return false;
        }
        return $array;
    }

    //Pegar modelos do mês
    public function getModelosMes($estado){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE plano = 'Modelo do Mês' AND `status` = 1 AND estado = :estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':estado', $estado);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } 
        
        return $array;
    }

    //Pegar modelos Diamont
    public function getModelosDiamont($estado){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE plano = 'Modelo Diamont' AND `status` = 1 AND estado = :estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':estado', $estado);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }

    //Pegar modelos Gold
    public function getModelosGold($estado){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE plano = 'Modelo Gold' AND `status` = 1 AND estado = :estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':estado', $estado);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } 
        return $array;
    }

    public function getModelosIndex($estado){
        $modelos = array();
        $sql = "SELECT * FROM modelos WHERE estado = :estado LIMIT 12";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':estado', $estado);
        $sql->execute();
        if($sql->rowCount() > 0){
            $modelos = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }

        return $modelos;
    }

    //Pegar dados de todas as modelos
    public function getModelos(){
        $modelos = array();
        $sql = "SELECT * FROM modelos";
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $modelos = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }

        return $modelos;
    }
    
    // Pegar tipo
    public function getModeloTipo(){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE `status`=:sts GROUP BY tipo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':sts', 1);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }

    // Pegar estado
    public function getModeloEstado(){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE `status`=:sts GROUP BY estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':sts', 1);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else{
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }
        return $array;
    }

    // Busca Modelo Tipo
    public function modelosBuscaTipo($tipo){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE tipo = :tipo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else{
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }

        return $array;
    }

    // Busca Modelo Estado
    public function modelosBuscaEstado($estado){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE estado = :estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":estado", $estado);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else{
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }

        return $array;
    }

    // Busca Modelo Tipo e Estado
    public function modelosBuscaTipoEstado($tipo, $estado){
        $array = array();
        $sql = "SELECT * FROM modelos WHERE tipo = :tipo AND estado = :estado";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":estado", $estado);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else{
            echo "<script>";
            echo "alert('Nenhuma modelo encontrada!');";
            echo "</script>";
        }

        return $array;
    }

    //Adicionar Modelo
    public function addModelo($dados){
        if(!$this->validarModelo($dados['email'])){
            $sql = "INSERT INTO modelos SET nome = :nome, email = :email, plano = :plano, idade = :idade, estado = :estado, cidade = :cidade, tipo = :tipo, biotipo = :biotipo, altura = :altura, peso = :peso, manequim = :manequim, pes = :pes, cabelo = :cabelo, olhos = :olhos, celular = :celular, horario = :horario, faz_o_perfil = :faz_o_perfil, acompanha = :acompanha, atendo_em = :atendo_em, whatsapp_sms = :whatsapp_sms, cache = :cache, aceita_cartao = :aceita_cartao, periodo = :periodo, idiomas = :idiomas, especialidades = :especialidades, permite_fumar = :permite_fumar, viaja = :viaja, descricao = :descricao";
            $sql = $this->Conectar()->prepare($sql);
            foreach ($dados as $key => $value) {
                $sql->bindValue(":$key", $value);
            }
            $sql->execute();
            
            echo "<script>";
            echo "alert('Modelo adicionada com sucesso!'); location.href = 'index.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Modelo já encontrada no nosso banco de dados!');";
            echo "</script>";
        }
    }

    //Editar Modelo
    public function editarModelo($dados, $id_model){
        $sql = "UPDATE modelos SET nome = :nome, email = :email, plano = :plano, idade = :idade, estado = :estado, cidade = :cidade, tipo = :tipo, biotipo = :biotipo, altura = :altura, peso = :peso, manequim = :manequim, pes = :pes, cabelo = :cabelo, olhos = :olhos, celular = :celular, horario = :horario, faz_o_perfil = :faz_o_perfil, acompanha = :acompanha, atendo_em = :atendo_em, whatsapp_sms = :whatsapp_sms, cache = :cache, aceita_cartao = :aceita_cartao, periodo = :periodo, idiomas = :idiomas, especialidades = :especialidades, permite_fumar = :permite_fumar, viaja = :viaja, descricao = :descricao WHERE id = $id_model";
        $sql = $this->Conectar()->prepare($sql);
        foreach($dados as $key => $value){
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();
        echo "<script>";
        echo "alert('Modelo editada com sucesso!'); location.href = 'index.php';";
        echo "</script>";
    }

    //Adicionar foto de Perfil
    public function addFotoPerfil($fotoPerfil){
        $sql = "SELECT * FROM modelos ORDER BY id DESC";
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $modelo = $sql->fetch();
        }
        $id_model = $modelo['id'];
        if($id_model > 0){
            if($this->validarModelo($modelo['email'])){
                $nome_arquivo = md5(time() . rand(0, 999));
                move_uploaded_file($fotoPerfil['tmp_name'], '../assets/img/modelos/perfil/' . $nome_arquivo . ".jpg");
                $sql = "UPDATE modelos SET img_perfil = ? WHERE id = ?";
                $sql = $this->Conectar()->prepare($sql);
                $sql->bindValue(1, $nome_arquivo);
                $sql->bindValue(2, $id_model);
                $sql->execute();
            }
        }
    }

    //Editar Foto de Perfil
    public function editarFotoPerfil($fotoPerfil, $id_model){
        $sql = "SELECT * FROM modelos WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":id", $id_model);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $modelo = $sql->fetch();
            if($this->validarModelo($modelo['email'])){
                if($fotoPerfil['size'] == 0){
                    $nome_arquivo = $modelo['img_perfil'];
                } else {
                    $nome_arquivo = md5(time() . rand(0, 999));
                    move_uploaded_file($fotoPerfil['tmp_name'], '../assets/img/modelos/perfil/' . $nome_arquivo . ".jpg");
                }
                
                $sql = "UPDATE modelos SET img_perfil = :img_perfil WHERE id = :id";
                $sql = $this->Conectar()->prepare($sql);
                $sql->bindValue(':img_perfil', $nome_arquivo);
                $sql->bindValue(':id', $id_model);
                $sql->execute();
            }
        }
    }

    //Pegar as fotos
    public function getFotos($id_model){
        $array = array();
        $sql = "SELECT * FROM imagens WHERE id_modelo = :id_modelo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id_modelo', $id_model);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "Nenhuma foto encontrada!";
        }
        return $array;

    }

    //Pegar fotos Início
    public function getFotosExibir($id_modelo){
        $array = array();
        $sql = "SELECT * FROM imagens WHERE id_modelo = :id_modelo ORDER BY id DESC LIMIT 7";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id_modelo', $id_modelo);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    //Adicionar Fotos
    public function addFotos($fotos){
        $sql = "SELECT * FROM modelos ORDER BY id DESC";
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $modelo = $sql->fetch();
        }
        $id_model = $modelo['id'];
        if($id_model > 0){
            if($this->validarModelo($modelo['email'])){
                if(count($fotos['tmp_name']) > 0){
                    for($q=0;$q < count($fotos['tmp_name']); $q++){
                        $array = $fotos['type'][$q];
                        $tipo = explode("/", $array);
                        $nome_arquivo = md5(time() . rand(0, 999));
                        move_uploaded_file($fotos['tmp_name'][$q], '../assets/img/modelos/'.$nome_arquivo . "." . $tipo[1]);
        
                        $sql = "INSERT INTO imagens SET id_modelo = :id_modelo, imagem = :imagem, tipo = :tipo";
                        $sql = $this->Conectar()->prepare($sql);
                        $sql->bindValue(':id_modelo', $id_model);
                        $sql->bindValue(':imagem', $nome_arquivo);
                        $sql->bindValue(':tipo', $tipo[1]);
                        $sql->execute();
                    }
                }
            }
        } else {
            echo "<script>";
            echo "alert('As fotos não foram adicionadas à modelo! Tente novamente!');";
            echo "</script>";
        }
    }

    //Excluir Arquivo Foto
    public function excluirArquivoFoto($id){
        $sql = "SELECT * FROM imagens WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $img = $sql->fetch();
        }
        $caminho = '../assets/img/modelos/'.$img['imagem']. "." .$img['tipo'];
        $confExc = unlink($caminho);
        if($confExc){
            echo "<script>";
            echo "alert('O arquivo foi excluído!');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('O arquivo não foi excluído da pasta!');";
            echo "</script>";
        }
    }

    //Excluir Foto
    public function excluirFoto($id){
        $this->excluirArquivoFoto($id);
        $sql = "DELETE FROM imagens WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        echo "<script>";
        echo "alert('Foto excluída!');";
        echo "</script>";
    }

     //Excluir Fotos Modelo
     public function excluirFotoModelo($id_modelo){
        $sql = "DELETE FROM imagens WHERE id_modelo = :id_modelo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id_modelo', $id_modelo);
        $sql->execute();
    }

    //Editar Fotos
    public function editarFotos($fotos, $id_model){
        for($q=0;$q < count($fotos['tmp_name']); $q++){
            $array = $fotos['type'][$q];
            $tipo = explode("/", $array);
            $nome_arquivo = md5(time() . rand(0, 999));
            move_uploaded_file($fotos['tmp_name'][$q], '../assets/img/modelos/'.$nome_arquivo . "." . $tipo[1]);

            $sql = "INSERT INTO imagens SET id_modelo = :id_modelo, imagem = :imagem, tipo = :tipo";
            $sql = $this->Conectar()->prepare($sql);
            $sql->bindValue(':id_modelo', $id_model);
            $sql->bindValue(':imagem', $nome_arquivo);
            $sql->bindValue(':tipo', $tipo[1]);
            $sql->execute();
        }
        
    }

    //Adicionar Vídeos
    public function addVideos($videos){
        $sql = "SELECT * FROM modelos ORDER BY id DESC";
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $modelo = $sql->fetch();
        }
        $id_model = $modelo['id'];
        if($id_model > 0){
            if($this->validarModelo($modelo['email'])){
                if(count($videos['tmp_name']) > 0){
                    for($q=0;$q < count($videos['tmp_name']); $q++){
                        $array = $videos['type'][$q];
                        $tipo = explode("/", $array);
                        $nome_arquivo = md5(time() . rand(0, 999));
                        move_uploaded_file($videos['tmp_name'][$q], '../assets/videos/' . $nome_arquivo . "." . $tipo[1]);
        
                        $sql = "INSERT INTO videos SET id_modelo = :id_modelo, video = :video, tipo = :tipo";
                        $sql = $this->Conectar()->prepare($sql);
                        $sql->bindValue(':id_modelo', $id_model);
                        $sql->bindValue(':video', $nome_arquivo);
                        $sql->bindValue(':tipo', $tipo[1]);
                        $sql->execute();
                    }
                }
            }
        } else {
            echo "<script>";
            echo "alert('Os vídeos não foram adicionados à modelo! Tente novamente!');";
            echo "</script>";
        }
    }

    //Pegar todos os vídeos
    public function getAllVideos(){
        $array = array();
        $sql = "SELECT * FROM videos";
        $sql = $this->Conectar()->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }else {
            echo "<script>";
            echo "alert('Nenhum vídeo encontrado!');";
            echo "</script>";
        }

        return $array;
    }

    //Pegar Vídeos
    public function getVideos($id_model){
        $array = array();
        $sql = "SELECT * FROM videos WHERE id_modelo = :id_modelo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id_modelo', $id_model);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            //echo "Nenhum vídeo encontrado!";
        }
        return $array;
    }

    //Editar Vídeos
    function editarVideos($videos, $id_model){
        $sql = "SELECT * FROM modelos WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id_model);
        $sql->execute();
        if($sql->rowCount() > 0){
            $modelo = $sql->fetch();
        }
        $id_model = $modelo['id'];
        if($id_model > 0){
            if($this->validarModelo($modelo['email'])){
                if(count($videos['tmp_name']) > 0){
                    for($q=0;$q < count($videos['tmp_name']); $q++){
                        $array = $videos['type'][$q];
                        $tipo = explode("/", $array);
                        $nome_arquivo = md5(time() . rand(0, 999));
                        move_uploaded_file($videos['tmp_name'][$q], '../assets/videos/' . $nome_arquivo . "." . $tipo[1]);
        
                        $sql = "INSERT INTO videos SET id_modelo = :id_modelo, video = :video, tipo = :tipo";
                        $sql = $this->Conectar()->prepare($sql);
                        $sql->bindValue(':id_modelo', $id_model);
                        $sql->bindValue(':video', $nome_arquivo);
                        $sql->bindValue(':tipo', $tipo[1]);
                        $sql->execute();
                    }
                }
            }
        } else {
            echo "<script>";
            echo "alert('Os vídeos não foram adicionados à modelo! Tente novamente!');";
            echo "</script>";
        }
    }

    //Excluir Vídeo
    public function excluirVideo($id){
        $sql = "DELETE FROM videos WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        echo "<script>";
        echo "alert('Vídeo excluído!');";
        echo "</script>";
    }

    //Excluir Vídeos Modelo
    public function excluirVideoModelo($id_modelo){
        $sql = "DELETE FROM videos WHERE id_modelo = :id_modelo";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':id_modelo', $id_modelo);
        $sql->execute();
    }
}