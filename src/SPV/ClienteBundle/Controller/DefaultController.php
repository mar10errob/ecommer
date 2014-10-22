<?php

namespace SPV\ClienteBundle\Controller;

use SPV\ClienteBundle\Form\EditaClienteType;
use SPV\MovimientoBundle\Entity\DetalleMovimiento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use SPV\ClienteBundle\Entity\Cliente;
use SPV\ClienteBundle\Form\ClienteType;
use SPV\DireccionBundle\Entity\Direccion;
use SPV\DireccionBundle\Form\DireccionType;
use SPV\ClienteBundle\Entity\Carrito;
use SPV\MovimientoBundle\Entity\Movimiento;

class DefaultController extends Controller
{
    public function loginAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_CLIENTE')) {
            return $this->redirect($this->generateUrl('perfil'));
        }
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
        $cliente=$this->get('security.context')->getToken()->getUser();
        if($cliente->getStatus()){
            $this->get('session')->getFlashBag()->add(
                'info',
                'Ya puede realizar Pedidos'
            );
        }else{
            $this->get('session')->getFlashBag()->add(
                'info',
                'No puede realizar pedidos necesita autorizacion por parte de la empresa.'
            );
        }
        $this->get('session')->getFlashBag()->add(
            'info',
            'Bienvenido'
        );
        return $this->render('ClienteBundle:Default:perfil.html.twig');
    }

    public function registroAction(){
        if ($this->get('security.context')->isGranted('ROLE_CLIENTE')) {
            return $this->redirect($this->generateUrl('perfil'));
        }
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
                $cliente->setStatus(false);
                $cliente->setSalt(md5(time()));
                $encoder = $this->get('security.encoder_factory')->getEncoder($cliente);
                $passwordCodificado = $encoder->encodePassword($cliente->getPassword(), $cliente->getSalt());
                $cliente->setPassword($passwordCodificado);
                $em->persist($cliente);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'info',
                    'Ya puede inicar sesión con su e-mail y su contraseña'
                );
                return $this->redirect($this->generateUrl('cliente_login'));
            }
        }
        return $this->render(
            'ClienteBundle:Default:registro.html.twig',
            array(
                'accion'=>'crear',
                'formcliente'=>$formcliente->createView(),
                'formdireccion'=>$formdireccion->createView())
        );
    }

    public function nuevoPedidoAction(){
        $cliente=$this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $carProveedor=$this->get('sylius.cart_provider');
        $carritoActual=$carProveedor->getCart()->getItems();
        if(count($carritoActual)<=0){
            $this->get('session')->getFlashBag()->add(
                'info',
                'El carrito esta vacio!!!'
            );
            return $this->render('ClienteBundle:Default:pedido.html.twig');
        }else{
            $tipomovimiento=$em->getRepository('MovimientoBundle:TipoMovimiento')->findOneBy(array(
                'descripcion'=>'pedido'
            ));
            $total=$carProveedor->getCart()->getTotal();
            $saldo=$cliente->getSaldo();
            $pedido=new Movimiento();
            $pedido->setTipo($tipomovimiento);
            $pedido->setCliente($cliente);
            $pedido->setFechaCreacion(new \DateTime('now'));
            $pedido->setObservaciones($this->getRequest()->get('observaciones'));
            $pedido->setCosto($total);
            $pedido->setSaldo($total);
            $cliente->setSaldo($total + $saldo);
            $em->persist($pedido);
            $em->persist($cliente);
            foreach($carritoActual as $item){
                $detallePedido=new DetalleMovimiento();
                $detallePedido->setMovimiento($pedido);
                $detallePedido->setProducto($item->getProducto());
                $em->persist($detallePedido);
            }
            $em->flush();
            $carProveedor->abandonCart();
            $this->get('session')->getFlashBag()->add(
                'info',
                'Su pedido a sido registrado con exito!!!!'
            );
            return $this->redirect($this->generateUrl('perfil'));
        }

    }

    public function editarAction(){
        $em=$this->getDoctrine()->getManager();
        $cliente=$this->get('security.context')->getToken()->getUser();
        $direccion=$cliente->getDireccion();
        $peticion = $this->getRequest();
        $formcliente=$this->createForm(new EditaClienteType(), $cliente);
        $formdireccion=$this->createForm(new DireccionType(), $direccion);
        if ($peticion->getMethod() == 'POST') {
            $formdireccion->bind($peticion);
            $formcliente->bind($peticion);
            if($formdireccion->isValid() and $formcliente->isValid()){
                $em->persist($cliente);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'info',
                    'Su informacion ha sido modificada exitosamente!!!'
                );
                return $this->redirect(
                    $this->generateUrl('perfil')
                );
            }
        }

        return $this->render('ClienteBundle:Default:registro.html.twig',
            array(
                'accion'=>'editar',
                'cliente' => $cliente,
                'formcliente'=>$formcliente->createView(),
                'formdireccion'=>$formdireccion->createView()
            )
        );
    }
}
