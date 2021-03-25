<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos extends ControllerHTML implements InterfaceProcessaRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos =  $entityManager->getRepository(Curso::class);   
    }

    public function processRequest() : void
    {        
        $titulo = "Listar Cursos";
        $cursos = $this->repositorioDeCursos->findAll();
        
        echo $this->renderizaHTML('cursos/listar-cursos.php', [
            'cursos' => $cursos,
            'titulo' => $titulo
        ]);     
    }
}