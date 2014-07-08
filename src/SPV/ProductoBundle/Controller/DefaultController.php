<?php

namespace SPV\ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function portadaAction(){
        $em=$this->getDoctrine()->getManager();
        $recientes=$em->getRepository('ProductoBundle:Producto')->findRecientes();
        return $this->render('ProductoBundle:Default:portada.html.twig',array(
            'productos'=>$recientes
        ));
    }

    public function productosAction(){
        $em = $this->getDoctrine()->getManager();
        $productos=$em->getRepository('ProductoBundle:Producto')->findRecientes();
        return $this->render('ProductoBundle:Default:productos.html.twig',array(
            'productos'=>$productos
            ));
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
    public function adiosAction(){
        return $this->render('ProductoBundle:Default:adios.html.twig');
    }
    public function filtrosAction(){
        $em=$this->getDoctrine()->getManager();
        $categorias=$em->getRepository('ProductoBundle:TipoProducto')->findAll();
        $marcas=$em->getRepository('ProveedorBundle:Proveedor')->findAll();
        return $this->render('ProductoBundle:Default:filtros.html.twig',
        array(
            'categorias'=>$categorias,
            'marcas'=>$marcas
        ));
    }
}
