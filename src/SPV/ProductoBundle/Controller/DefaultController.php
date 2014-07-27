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

    public function productosAction($categoria){
        $em = $this->getDoctrine()->getManager();
        if($categoria=='todos'){
            $productos=$em->getRepository('ProductoBundle:Producto')->findAll();
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
            $productos,
            $this->get('request')->query->get('page', 1),/*page number*/
            12);/*limit per page*/
            

            return $this->render('ProductoBundle:Default:productos.html.twig',array(
                'pagination'=>$pagination
                ));
        }else{
            $productos=$em->getRepository('ProductoBundle:Producto')->findCategorias($categoria);
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
            $productos,
            $this->get('request')->query->get('page', 1),/*page number*/
            12);/*limit per page*/
            

            return $this->render('ProductoBundle:Default:productos.html.twig',array(
                'pagination'=>$pagination
                ));
        }
        
    }

    public function detalleproductoAction($id){
        
        $em = $this->getDoctrine()->getManager();
        $producto=$em->getRepository('ProductoBundle:Producto')->find($id);

        $producto->setRanking($producto->getRanking() + 1);

        $em->persist($producto);
        $em->flush();

        $p=$em->getRepository('ProductoBundle:Producto')->find($id);

        return $this->render('ProductoBundle:Default:detalle.html.twig',array(
            'producto'=>$p
            ));
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
        return $this->render('ProductoBundle:Default:filtros.html.twig',
        array(
            'categorias'=>$categorias
        ));
    }
}
