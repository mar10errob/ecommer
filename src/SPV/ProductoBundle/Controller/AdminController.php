<?php
namespace SPV\ProductoBundle\Controller;

use SPV\ProductoBundle\Entity\Producto;
use SPV\ProductoBundle\Form\ProductoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function registroAction(){
        $peticion=$this->getRequest();
        $producto=new Producto();
        $formproducto=$this->createForm(new ProductoType(), $producto);
        if($peticion->getMethod()=='POST'){
            $formproducto->bind($peticion);
            if($formproducto->isValid()){
                $producto->setStatus(true);
                $producto->setRanking(0);
                $producto->setFechaIngreso(new \DateTime('now'));
                $producto->subirImagen(
                    $this->container->getParameter('directorio.productos')
                );
                $em=$this->getDoctrine()->getManager();
                $em->persist($producto);
                $em->flush();
                return $this->redirect($this->generateUrl('lista_productos'));
            }
        }
        return $this->render('ProductoBundle:Admin:registro.html.twig',
            array(
                'accion'=>'crear',
                'formproducto'=>$formproducto->createView()
            )
        );
    }
    public function editarAction($id){
        $em=$this->getDoctrine()->getManager();
        $producto=$em->getRepository('ProductoBundle:Producto')->find($id);
        if(!$producto){
            throw $this->createNotFoundException('No existe el producto');
        }
        $formproducto=$this->createForm(new ProductoType(), $producto);
        $peticion=$this->getRequest();
        if($peticion->getMethod()=='POST'){
            $imagenOriginal=$formproducto->getData()->getImagen();
            $formproducto->bind($peticion);
            if($formproducto->isValid()){
                if(null == $producto->getImagen()){
                    $producto->setImagen($imagenOriginal);
                }else{
                    $directorioImagenes=$this->container->getParameter('directorio.productos');
                    $producto->subirImagen($directorioImagenes);
                    unlink($directorioImagenes.$imagenOriginal);
                }
                $em->persist($producto);
                $em->flush();
                return $this->redirect($this->generateUrl('lista_productos'));
            }
        }
        return $this->render('ProductoBundle:Admin:registro.html.twig',
            array(
                'accion'=>'editar',
                'producto'=>$producto,
                'formproducto'=>$formproducto->createView()
            )
        );
    }
    public function listaAction(){
        $em=$this->getDoctrine()->getManager();
        $productos=$em->getRepository('ProductoBundle:Producto')->findAll();
        return $this->render('ProductoBundle:Admin:lista.html.twig',array(
            'productos'=>$productos
        ));
    }
}