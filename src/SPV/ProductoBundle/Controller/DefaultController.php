<?php

namespace SPV\ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function portadaAction(){
        return $this->render('ProductoBundle:Default:poartada.html.twig');
    }

    public function productosAction(){
        return $this->render('ProductoBundle:Default:productos.html.twig');
    }

    public function detalleproductoAction(){
        return $this->render('ProductoBundle:Default:detalle.html.twig');
    }
    public function errorAction(){
        return $this->render('ProductoBundle:Default:error.html.twig');
    }
    public function contactoAction(){
        return $this->render('ProductoBundle:Default:contacto.html.twig');
    }
}
