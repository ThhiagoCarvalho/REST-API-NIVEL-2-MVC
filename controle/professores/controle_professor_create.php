<?php
require_once("modelo/Banco.php");
require_once("modelo/Professor.php");
$textorecibido = file_get_contents("php://input");
$objJson = json_decode($textorecibido) or die('{"msg":"formato incorreto!"}'); 

$objResposta = new stdClass();
$objProfessor = new Professor(); 

$objProfessor->setNomeProfessor($objJson->professor->nomeProfessor);
$objProfessor->setTelefoneProfessor($objJson->professor->telefoneProfessor);
$objProfessor->setSalarioProfessor($objJson->professor->salarioProfessor);
$objProfessor->setIdadeProfessor($objJson->professor->idadeProfessor);


if($objProfessor->getNomeProfessor()==''){
    $objResposta->status = false;
    $objResposta->msg = "o nome nao pode ser vazio";
    $objResposta->cod = 2;
}else if(strlen ($objProfessor->getNomeProfessor() )<3){
    $objResposta->status = false; 
    $objResposta->msg = "o nome do professor nao pode ser menor que 3 caracteres!";
    $objResposta->cod = 2;
}else if ($objProfessor->isProfessor() == true){
    $objResposta-> cod=3;
    $objResposta-> status = false;
    $objResposta-> msg ="ja existe esse nome!";
    
}else{
    if ($objProfessor->create()==true) {
        $objResposta-> cod=4;
        $objResposta-> status = true;
        $objResposta-> msg ="cadastradao com sucesso!";
        $objResposta-> novoProfessor= $objProfessor;
    }else{
        $objResposta->status = false;
        $objResposta->msg = "erro ao cadastrar o novo Professor!";
        $objResposta->cod = 5;
}
}

if($objResposta->status == true){
    header('HTTP/1.1 201');
}else{
    header('HTTP/1.1 200');

}
echo json_encode($objResposta);

?>
