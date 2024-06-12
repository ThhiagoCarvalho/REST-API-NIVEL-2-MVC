<?php
require_once("modelo/Banco.php");
require_once("modelo/Professor.php");
$objResposta = new stdClass();
$objProfessor = new Professor();

$vetor = $objProfessor->ReadALL() ;

$objResposta->cod = 1;
$objResposta->status = true;
$objResposta->msg = "executado com sucesso!";
$objResposta->professor = $vetor;

header('HTTP/1.1 200');
header('content-type : application/json');
echo json_encode($objResposta);
?>
