<?php

namespace SPV\ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function portadaAction(){
        return $this->render('ProductoBundle:Default:poartada.html.twig');
    }
}
