<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao extends ControllerHTML implements InterfaceProcessaRequisicao 
{
    private $entityManager;
    private $repositoryCursos;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator(Curso::class))->getEntityManager();
        $this->repositoryCursos = $this->entityManager->getRepository(Curso::class);
    }

    public function processRequest() : void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        if(is_null($id) || $id === false) {
            header("Location: /listar-cursos");
            return;
        }

        $curso = $this->repositoryCursos->find($id);

        $titulo = "Editar Curso";
        echo $this->renderizaHTML('cursos/novo-curso.php', [
            'curso' => $curso,
            'titulo' => $titulo
        ]);        
    }

}