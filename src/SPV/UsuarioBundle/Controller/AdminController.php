<?php

namespace SPV\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function pruebaAction()
    {
        return $this->render('UsuarioBundle:Admin:principal.html.twig');
    }
}
