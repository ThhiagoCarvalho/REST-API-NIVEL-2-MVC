<?php
require_once("modelo/Banco.php");
require_once("modelo/DisciplinasXProfessores.php");

$objResposta = new stdClass();
$objDXP = new DisciplinasXProfessores();

$objDXP->setIdDisciplinasXProfessores($paramentro_DXP);

if ( $objDXP->delete()== true ) {
    header('HTTP/1.1 204');

}
else {
    header('HTTP/1.1 200');
    header('content-type : application/json');

}
?>
