<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class RealizaLogin implements InterfaceProcessaRequisicao 
{
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }
    public function processRequest() : void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(is_null($email) || $email == false)
        {
            echo "Email inválido" ;
            return;
        }
        /** @var Usuario $usuario */
        $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        
        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha))
        {
            echo 'E-mail ou senha inválidos';
            return;
        }
        
        header('Location: /listar-cursos');
    }
}