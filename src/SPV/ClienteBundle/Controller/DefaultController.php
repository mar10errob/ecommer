<?php

namespace SPV\ClienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use SPV\ClienteBundle\Entity\Cliente;
use SPV\ClienteBundle\Form\ClienteType;
use SPV\DireccionBundle\Entity\Direccion;
use SPV\DireccionBundle\Form\DireccionType;
use SPV\ClienteBundle\Entity\Carrito;
use SPV\ProductoBundle\Entity\Producto;
use SPV\MovimientoBundle\Entity\Movimiento;

class DefaultController extends Controller
{
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render('ClienteBundle:Default:login.html.twig', array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }

    public function pedidoAction(){
        return $this->render('ClienteBundle:Default:pedido.html.twig');
    }

    public function perfilAction(){
        return $this->render('ClienteBundle:Default:perfil.html.twig');
    }

    public function registroAction(){
        $peticion=$this->getRequest();
        $cliente=new Cliente();
        $direccion=new Direccion();
        $formcliente=$this->createForm(new ClienteType(), $cliente);
        $formdireccion=$this->createForm(new DireccionType(), $direccion);
        if($peticion->getMethod()=='POST'){
            $formdireccion->bind($peticion);
            $formcliente->bind($peticion);
            if($formdireccion->isValid() and $formcliente->isValid()){
                $em=$this->getDoctrine()->getEntityManager();
                $em->persist($direccion);
                $cliente->setDireccion($direccion);
                $cliente->setSaldo(0);
                $cliente->setStatus(true);
                $cliente->setSalt(md5(time()));
                $encoder = $this->get('security.encoder_factory')->getEncoder($cliente);
                $passwordCodificado = $encoder->encodePassword($cliente->getPassword(), $cliente->getSalt());
                $cliente->setPassword($passwordCodificado);
                $em->persist($cliente);
                $em->flush();
                return $this->redirect($this->generateUrl('cliente_login'));
            }
        }
        return $this->render(
            'ClienteBundle:Default:registro.html.twig',
            array('cliente'=>$formcliente->createView(),'direccion'=>$formdireccion->createView())
        );
    }

    public function confirmaAction(){
        $cliente=$this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $carrito=$em->getRepository('ClienteBundle:Carrito')->findBy(array(
            'cliente'=>$cliente,
            'fechaAdd'=>new \DateTime('today')
            ));
        $tipomovimiento=$em->getRepository('MovimientoBundle:TipoMovimiento')->findBy(array(
            'descripcion'=>'pedido'
            ));
        $movimiento =new Movimiento();

        foreach ($carrito as $producto) {
            

        }
    }
}
