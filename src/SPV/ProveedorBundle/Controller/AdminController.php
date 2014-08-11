<?php
namespace SPV\ProveedorBundle\Controller;

use SPV\DireccionBundle\Entity\Direccion;
use SPV\DireccionBundle\Form\DireccionType;
use SPV\ProveedorBundle\Entity\Proveedor;
use SPV\ProveedorBundle\Form\ProveedorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller{
    public function registroAction(){
        $peticion=$this->getRequest();
        $proveedor=new Proveedor();
        $direccion=new Direccion();
        $formproveedor=$this->createForm(new ProveedorType(), $proveedor);
        $formdireccion=$this->createForm(new DireccionType(), $direccion);
        if($peticion->getMethod()=='POST'){
            $formdireccion->bind($peticion);
            $formproveedor->bind($peticion);
            if($formdireccion->isValid() and $formproveedor->isValid()){
                $em=$this->getDoctrine()->getEntityManager();
                $em->persist($direccion);
                $proveedor->setDireccion($direccion);
                $proveedor->setStatus(true);
                $em->persist($proveedor);
                $em->flush();
//                return $this->redirect($this->generateUrl('admin'));
            }
        }
        return $this->render('ProveedorBundle:Admin:registro.html.twig',
            array(
                'accion'=>'crear',
                'formproveedor'=>$formproveedor->createView(),
                'formdireccion'=>$formdireccion->createView()
            )
        );
    }

    public function editarAction($id){
        $em=$this->getDoctrine()->getManager();
        $proveedor=$em->getRepository('ProveedorBundle:Proveedor')->find($id);
        if (!$proveedor) {
            throw $this->createNotFoundException('No existe el proveedor');
        }
        $direccion=$proveedor->getDireccion();
        $peticion = $this->getRequest();
        $formproveedor=$this->createForm(new ProveedorType(), $proveedor);
        $formdireccion=$this->createForm(new DireccionType(), $direccion);
        if ($peticion->getMethod() == 'POST') {
            $formdireccion->bind($peticion);
            $formproveedor->bind($peticion);
            if($formdireccion->isValid() and $formproveedor->isValid()){
                $em->persist($proveedor);
                $em->flush();
                return $this->redirect(
                    $this->generateUrl('lista_proveedores')
                );
            }
        }
        return $this->render('ProveedorBundle:Admin:registro.html.twig',
            array(
                'accion'=>'editar',
                'proveedor' => $proveedor,
                'formproveedor'=>$formproveedor->createView(),
                'formdireccion'=>$formdireccion->createView()
            )
        );
    }
    
    public function listaAction(){
        $em=$this->getDoctrine()->getManager();
        $proveedores=$em->getRepository('ProveedorBundle:Proveedor')->findAll();
        return $this->render('ProveedorBundle:Admin:lista.html.twig',array(
            'proveedores'=>$proveedores
        ));
    }
}