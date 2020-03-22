<?php
require_once '../assets/classes/Modelos.php';
$modelo = new Modelos();

if(isset($_GET['id_foto']) && !empty($_GET['id_foto'])){
    $id_foto = $_GET['id_foto'];
    $modelo->excluirFoto($id_foto);
    echo "<script>";
    echo "window.history.go(-1);";
    echo "</script>";
}