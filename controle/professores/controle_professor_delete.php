<?php
require_once("modelo/Banco.php");
require_once("modelo/Professor.php");


$objResposta = new stdClass();
$objProfessor = new Professor();


$objProfessor->setIdProfessor($paramentro_idprofessor);
if ($objProfessor->delete()==true){
    header('HTTP/1.1 204');
}else{
    header('HTTP/1.1 200');
    header('content-type : application/json');
}
    

?>
