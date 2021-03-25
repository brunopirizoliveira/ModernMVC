<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends ControllerHTML implements InterfaceProcessaRequisicao 
{
    public function processRequest() : void
    {
        $titulo = "Login";
        echo $this->renderizaHTML('login/formulario.php', [
            'titulo' => $titulo
        ]);
    }

}