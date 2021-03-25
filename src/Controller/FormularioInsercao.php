<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerHTML implements InterfaceProcessaRequisicao 
{
    public function processRequest() : void
    {
        $titulo = "Novo Curso";
        echo $this->renderizaHTML('cursos/novo-curso.php', [
            'titulo' => $titulo
        ]);
    }

}