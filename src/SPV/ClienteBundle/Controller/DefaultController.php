<?php

namespace SPV\ClienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function loginAction()
    {
        return $this->render('ClienteBundle:Default:login.html.twig');
    }

    public function carritoAction(){
        return $this->render('ClienteBundle:Default:carrito.html.twig');
    }

    public function checkoutAction(){
        return $this->render('ClienteBundle:Default:checkout.html.twig');
    }
}
