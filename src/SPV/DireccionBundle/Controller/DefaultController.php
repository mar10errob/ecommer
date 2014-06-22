<?php

namespace SPV\DireccionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DireccionBundle:Default:index.html.twig', array('name' => $name));
    }
}
