<?php
require_once("modelo/Banco.php");
require_once("modelo/DisciplinasXProfessores.php");

$objResposta = new stdClass();
$objDXP = new DisciplinasXProfessores();

$vetor = $objDXP->ReadALL() ;

$objResposta->cod = 1;
$objResposta->status = true;
$objResposta->msg = "executado com sucesso!";
$objResposta->professor = $vetor;

header('HTTP/1.1 200');
header('content-type : application/json');
echo json_encode($objResposta);
?>
