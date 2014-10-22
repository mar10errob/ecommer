<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function mapaAction()
    {
        return $this->render('BackendBundle:Colonia:mapa.html.twig');
    }
}
