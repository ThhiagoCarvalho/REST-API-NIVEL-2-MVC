<?php
require_once("modelo/Banco.php") ;
require_once("modelo/Disciplina.php") ;

$objResposta = new stdClass();
$objDisciplina = new Disciplina();


$objDisciplina->setIdDisciplina($paramentro_iddisciplina);

if ($objDisciplina->delete() == true) {
    header('HTTP/1.1 204');
}else {
    header('HTTP/1.1 200');
    header('content-type : application/json');
}
?>