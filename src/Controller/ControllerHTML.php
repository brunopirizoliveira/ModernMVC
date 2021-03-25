<?php

namespace Alura\Cursos\Controller;

class ControllerHTML 
{
    public function renderizaHTML(string $pathTemplate, array $dados) 
    {
        extract($dados);
        ob_start();
        require __DIR__ . '../../../view/' .  $pathTemplate;
        $html = ob_get_clean();

        return $html;
    }

}