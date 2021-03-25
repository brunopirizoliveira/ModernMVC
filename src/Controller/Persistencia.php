<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceProcessaRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceProcessaRequisicao {

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processRequest() : void 
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        if($id) {
            $curso = $this->entityManager->getRepository(Curso::class)->find($id);
            $curso->setDescricao($descricao);
            $this->entityManager->merge($curso);

        } else {
            $curso = new Curso;
            $curso->setDescricao($descricao);
            $this->entityManager->persist($curso);            
        }
        $this->entityManager->flush();

        header('Location: /listar-cursos', false, 302);
    }
    
}