<?php
require_once '../assets/classes/Modelos.php';
$modelo = new Modelos();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $modelo->excluirModelo($id);
    $modelo->excluirVideoModelo($id);
    $modelo->excluirFotoModelo($id);
    echo "<script>";
    echo "alert('Modelo excluída!'); location.href = 'index.php';";
    echo "</script>";
}