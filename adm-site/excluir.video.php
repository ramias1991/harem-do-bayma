<?php
require_once '../assets/classes/Modelos.php';
$modelo = new Modelos();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $modelo->excluirVideo($id);
    echo "<script>";
    echo "window.history.go(-1);";
    echo "</script>";
}