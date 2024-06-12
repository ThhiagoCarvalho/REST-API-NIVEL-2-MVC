<?php
require_once("modelo/Banco.php") ;
require_once("modelo/Disciplina.php") ;

$objResposta = new stdClass();
$objDisciplina = new Disciplina();


$vetor = $objDisciplina->ReallAll() ;

$objResposta->cod = 1;
$objResposta->status = true;
$objResposta->msg = "executado com sucesso!";
$objResposta->disciplina = $vetor;

header('HTTP/1.1 200');
header('content-type : application/json');
echo json_encode($objResposta);

?>d 