<?php
require_once("modelo/Router.php");

$roteador = new Router();

$roteador->get("/professores", function(){

 require_once("controle/professores/controle_professor_read_all.php");

});

$roteador->get("/professores/(\d+)", function($paramentro_idprofessor){
    require_once("controle/professores/controle_professor_read_by_id.php");
});

$roteador->post("/professores", function(){
    require_once("controle/professores/controle_professor_create.php");
});

$roteador->delete("/professores/(\d+)", function($paramentro_idprofessor){
    require_once("controle/professores/controle_professor_delete.php");
});

$roteador->put("/professores/(\d+)", function($paramentro_idprofessor){
    require_once("controle/professores/controle_professor_update.php");
});
   


$roteador->get("/disciplinas",function(){
    require_once("controle/disciplinas/controle_disciplina_read_all.php");
});

$roteador->get("/disciplinas/(\d+)",function($paramentro_iddisciplina){
    require_once("controle/disciplinas/controle_disciplina_read_by_id.php");
});

$roteador->post("/disciplinas",function(){
    require_once("controle/disciplinas/controle_disciplina_create.php");
});

$roteador->delete("/disciplinas/(\d+)",function($paramentro_iddisciplina){
    require_once("controle/disciplinas/controle_disciplina_delete.php");
});

$roteador->put("/disciplinas/(\d+)",function($paramentro_iddisciplina){
    require_once("controle/disciplinas/controle_disciplina_update.php");
});


$roteador->get("/disciplinasxprofessores/(\d+)", function($paramentro_DXP){
    require_once("controle/disciplinasxprofessores/controle_dxp_read_by_id.php");
});

$roteador->delete("/disciplinasxprofessores/(\d+)", function($paramentro_DXP){
    require_once("controle/disciplinasxprofessores/controle_dxp_delete.php");
});
$roteador->put("/disciplinasxprofessores/(\d+)", function($paramentro_DXP){
    require_once("controle/disciplinasxprofessores/controle_dxp_update.php");
});
$roteador->get("/disciplinasxprofessores", function(){
    require_once("controle/disciplinasxprofessores/controle_dxp_read_all.php");
});
$roteador->post("/disciplinasxprofessores", function(){
    require_once("controle/disciplinasxprofessores/controle_dxp_create.php");
});




$roteador->run();
?>