<?php
namespace SPV\BackendBundle\Controller;

use SPV\BackendBundle\Form\TipoUnidadType;
use SPV\ProductoBundle\Entity\TipoUnidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TipoUnidadController extends Controller{

    public function indexAction(){
        $em=$this->getDoctrine()->getManager();
        $tipounidades=$em->getRepository('ProductoBundle:TipoUnidad')->findAll();

        return $this->render('BackendBundle:TipoUnidad:index.html.twig',array(
            'tipounidades'=>$tipounidades
        ));
    }

    public function crearAction(){
        $peticion=$this->getRequest();

        $tipounidad=new TipoUnidad();
        $formulario=$this->createForm(new TipoUnidadType(),$tipounidad);
        if($peticion->getMethod()=='POST'){
            $formulario->bind($peticion);

            if($formulario->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($tipounidad);
                $em->flush();

                return $this->redirect($this->generateUrl('backend_tipounidad'));
            }
        }
        return $this->render('BackendBundle:TipoUnidad:crear.html.twig',array(
            'formulario'=>$formulario->createView()
        ));
    }

    public function actualizarAction($id){
        $em=$this->getDoctrine()->getManager();

        $tipounidad=$em->getRepository('ProductoBundle:TipoUnidad')->find($id);

        if(!$tipounidad){
            throw $this->createNotFoundException('No existe el Tipo de Unidad');
        }

        $formulario=$this->createForm(new TipoUnidadType(),$tipounidad);

        $peticion=$this->getRequest();
        if($peticion->getMethod()=='POST'){
            $formulario->bind($peticion);
            if($formulario->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($tipounidad);
                $em->flush();

                return $this->redirect($this->generateUrl('backend_tipounidad'));
            }
        }

        return $this->render('BackendBundle:TipoUnidad:actualizar.html.twig',array(
            'formulario'=>$formulario->createView(),
            'tipounidad'=>$tipounidad
        ));
    }

    public function borrarAction($id){
        $em=$this->getDoctrine()->getManager();
        $tipounidad=$em->getRepository('ProductoBundle:TipoUnidad')->find($id);

        if(!$tipounidad){
            throw $this->createNotFoundException('No existe ese Tipo de Unidad');
        }

        $em->remove($tipounidad);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_tipounidad'));
    }
}