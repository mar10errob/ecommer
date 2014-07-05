<?php

namespace SPV\ClienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use SPV\ClienteBundle\Entity\Cliente;
use SPV\ClienteBundle\Form\ClienteType;
use SPV\DireccionBundle\Entity\Direccion;
use SPV\DireccionBundle\Form\DireccionType;

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

    public function carritoAction(){
        return $this->render('ClienteBundle:Default:carrito.html.twig');
    }

    public function pedidoAction(){
        return $this->render('ClienteBundle:Default:pedido.html.twig');
    }

    public function perfilAction(){
        return $this->render('ClienteBundle:Default:perfil.html.twig');
    }

    public function resgistroAction(){
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
}
