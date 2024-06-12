<?php
require_once("modelo/Banco.php");
require_once("modelo/DisciplinasXProfessores.php");

$textorecibido = file_get_contents("php://input");
$objJson = json_decode($textorecibido) or die ("formato errado!");

$objResposta = new stdClass();
$objDxp = new DisciplinasXProfessores();

$objDxp->setCurso($objJson->disciplinasxprofessores->curso);
$objDxp->setCargahoraria($objJson->disciplinasxprofessores->cargaHoraria);
$objDxp->setanoLetivo($objJson->disciplinasxprofessores->anoLetivo);

$objDxp->setID_idprofessor($objJson->disciplinasxprofessores->ID_idprofessor);
$objDxp->setID_iddisciplina($objJson->disciplinasxprofessores->ID_iddisciplina);


if($objDxp->getCurso()==''){
    $objResposta->status = false;
    $objResposta->msg = "o nome do curso nao pode ser vazio";
    $objResposta->cod = 2;
}else if(strlen ($objDxp->getCurso() )<3){
    $objResposta->status = false; 
    $objResposta->msg = "o nome do curso nao pode ser menor que 3 caracteres!";
    $objResposta->cod = 2;
}else if ($objDxp->isCurso() == true){
    $objResposta-> cod=3;
    $objResposta-> status = false;
    $objResposta-> msg ="ja existe esse curso!";
}else if ($objDxp->ProfessorexXDisciplinas() == true){
    $objResposta-> cod=3;
    $objResposta-> status = false;
    $objResposta-> msg ="ja existe essas combinacoes de professores e disciplinas!";

}else{
    if ($objDxp->create()==true) {
        $objResposta-> cod=4;
        $objResposta-> status = true;
        $objResposta-> msg ="cadastradao com sucesso!";
        $objResposta-> novoProfessor= $objDxp;
    }else{
        $objResposta->status = false;
        $objResposta->msg = "erro ao cadastrar o novo curso!";
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