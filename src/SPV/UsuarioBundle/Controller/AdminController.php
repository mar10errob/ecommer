<?php

namespace SPV\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use SPV\UsuarioBundle\Entity\Usuario;
use SPV\UsuarioBundle\Form\UsuarioType;
use SPV\DireccionBundle\Entity\Direccion;
use SPV\DireccionBundle\Form\DireccionType;

class AdminController extends Controller
{
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render('UsuarioBundle:Default:login.html.twig', array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }

    public function principalAction()
    {
        $this->get('session')->getFlashBag()->add(
            'info',
            'Bienvenido'
        );
        return $this->render('UsuarioBundle:Admin:principal.html.twig');
    }

    public function registroAction(){
        $peticion=$this->getRequest();
        $usuario=new Usuario();
        $direccion=new Direccion();
        $formusuario=$this->createForm(new UsuarioType(), $usuario);
        $formdireccion=$this->createForm(new DireccionType(), $direccion);
        if($peticion->getMethod()=='POST'){
            $formdireccion->bind($peticion);
            $formusuario->bind($peticion);
            if($formdireccion->isValid() and $formusuario->isValid()){
                $em=$this->getDoctrine()->getEntityManager();
                $em->persist($direccion);
                $usuario->setDireccion($direccion);
                $usuario->setStatus(true);
                $usuario->setSalt(md5(time()));
                $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
                $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword($passwordCodificado);
                $em->persist($usuario);
                $em->flush();
                return $this->redirect($this->generateUrl('usuario'));
            }
        }
        return $this->render(
            'UsuarioBundle:Admin:registro.html.twig',
            array('usuario'=>$formusuario->createView(),'direccion'=>$formdireccion->createView())
        );
    }
}
