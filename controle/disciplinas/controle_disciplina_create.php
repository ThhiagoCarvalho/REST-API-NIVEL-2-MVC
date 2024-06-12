<?php
require_once("modelo/Banco.php") ;
require_once("modelo/Disciplina.php") ;
$textorecibido = file_get_contents("php://input") ;
$objJson = json_decode($textorecibido) or die ('{"msg":"formato incorreto!"}');

$objResposta = new stdClass();
$objDisciplina = new Disciplina();

$objDisciplina -> setNomeDisciplina($objJson->disciplina->nomeDisciplina) ;

if ($objDisciplina->getNomeDisciplina()==""){
    $objResposta-> status = false;
    $objResposta->msg = "Erro! o nome nao pode ser vazio!";
    $objResposta-> cod =1;
} else if ($objDisciplina->getNomeDisciplina() < 3){
    $objResposta->status = false;
    $objResposta->msg = "Erro! o nome nao pode ser menor que 3 carateres!";
    $objResposta->cod = 2;
}else if ($objDisciplina->isDisciplina()== true){
    $objResposta->status = false;
    $objResposta->msg = "Erro! o nome da disciplina nao pode ser repitido";
    $objResposta->cod = 3;
}else if ($objDisciplina->create() == true){
    $objResposta->status = true;
    $objResposta->msg = "Cadastramento realizdo com sucesso!";
    $objResposta->cod = 4;

}else{
    $objResposta->status = false;
    $objResposta->msg = "Erro ao cadastrar!";
    $objResposta->cod = 5;
}


if($objResposta->status == true){
    header('HTTP/1.1 201');
}else{
    header('HTTP/1.1 200');

}
echo json_encode($objResposta);




?>