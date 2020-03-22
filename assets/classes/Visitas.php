<?php
include_once 'Conexao.php';

class Visitas extends Conexao{

    private $ip, $data, $hora, $limite, $h, $m, $s, $ms;

    public function __construct(){
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->data = date('Y-m-d');
        $this->hora = date('H:i');
        $this->h = 4;
        $this->m = 60;
        $this->s = 60;
        $this->ms = 1000;
        $this->limite = $this->h * $this->m * $this->s * $this->ms;
    }

    public function verificarUsuario(){
        $sql = "SELECT * FROM visitas WHERE ip = :ip AND `data` = :datas ORDER BY ip DESC";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':ip', $this->ip);
        $sql->bindValue(':datas', $this->data);
        $sql->execute();
        if($sql->rowCount() == 0){
            $this->inserirVisita();
        } else {
            $dadoVisita = $sql->fetch();
            $horaDB = strtotime($dadoVisita['hora']);
            $horaAtual = strtotime($this->hora);
            $horaSub = $horaAtual - $horaDB;

            if($horaSub > $this->limite){
                $this->inserirVisita();
            }
        }
    }

    public function inserirVisita(){
        $sql = "INSERT INTO visitas SET ip = :ip, `data` = :datas, hora = :hora";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':ip', $this->ip);
        $sql->bindValue(':datas', $this->data);
        $sql->bindValue(':hora', $this->hora);
        $sql->execute();
    }

    public function getVisitasUnica(){
        $sql = "SELECT * FROM visitas GROUP BY ip";
        $sql = $this->Conectar()->query($sql);
        $contVisitsUnic = $sql->rowCount();
        return $contVisitsUnic;
    }

    public function getVisitas(){
        $sql = "SELECT * FROM visitas";
        $sql = $this->Conectar()->query($sql);
        $contVisits = $sql->rowCount();
        return $contVisits;
    }
}