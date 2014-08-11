<?php
namespace SPV\MovimientoBundle\Controller;

use SPV\MovimientoBundle\Entity\DetalleMovimiento;
use SPV\MovimientoBundle\Entity\Movimiento;
use SPV\MovimientoBundle\Form\CompraType;
use SPV\ProductoBundle\Entity\Producto;
use SPV\ProductoBundle\Form\ProductoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function nuevaCompraAction()
    {
        $em=$this->getDoctrine()->getManager();
        $proveedores=$em->getRepository('ProveedorBundle:Proveedor')->findAll();
        $peticion=$this->getRequest();
        $compra=new Movimiento();
        $usuario=$this->get('security.context')->getToken()->getUser();
        $formcompra=$this->createForm(new CompraType(), $compra);
        if($peticion->getMethod()=='POST'){
            $formcompra->bind($peticion);
            if($formcompra->isValid()){
                $tipo=$em->getRepository('MovimientoBundle:TipoMovimiento')->findOneBy(array('descripcion'=>'compra'));
                $proveedor=$em->getRepository('ProveedorBundle:Proveedor')->find($peticion->request->get('proveedor'));
                $compra->setProveedor($proveedor);
                $compra->setTipo($tipo);
                $compra->setUsuario($usuario);
                $compra->setFechaCreacion(new \DateTime('now'));
                $compra->setStatus(true);
                $em->persist($compra);
                $em->flush();
                return $this->redirect($this->generateUrl('registro_detalle',array('m'=>$compra->getId())));
            }
        }
        return $this->render('MovimientoBundle:Admin:compra.html.twig',
            array(
                'proveedores'=>$proveedores,
                'formcompra'=>$formcompra->createView()
            )
        );
    }

    public function listaComprasAction(){
        $em=$this->getDoctrine()->getManager();
        $tipo=$em->getRepository('MovimientoBundle:TipoMovimiento')->findOneBy(array('descripcion'=>'compra'));
        $compras=$em->getRepository('MovimientoBundle:Movimiento')->findBy(array('tipo'=>$tipo));
        return $this->render('MovimientoBundle:Admin:listacompras.html.twig',
            array(
            'compras'=>$compras
        ));
    }

    public function nuevoDetalleAction(){
        $em=$this->getDoctrine()->getManager();
        $peticion=$this->getRequest();
        $producto=new Producto();
        $detalle=new DetalleMovimiento();
        $mov=$peticion->query->get('m');
        $formproducto=$this->createForm(new ProductoType(), $producto);
        if($peticion->getMethod()=='POST'){
            $formproducto->bind($peticion);
            if($formproducto->isValid()){
                $movimiento=$peticion->request->get('movimiento');
                $producto->setStatus(true);
                $producto->setRanking(0);
                $producto->setFechaIngreso(new \DateTime('now'));
                $producto->subirImagen(
                    $this->container->getParameter('directorio.productos')
                );
                $em->persist($producto);
                $detalle->setMovimiento($em->getRepository('MovimientoBundle:Movimiento')->find($movimiento));
                $detalle->setProducto($producto);
                $em->persist($detalle);
                $em->flush();
                if($peticion->request->get('accion')=="Terminar"){
                    return $this->redirect($this->generateUrl('lista_compras'));
                }else{
                    return $this->redirect($this->generateUrl('registro_detalle',array('m'=>$movimiento)));
                }
            }
        }
        return $this->render('MovimientoBundle:Admin:formdetalle.html.twig',
            array(
                'movimiento'=>$mov,
                'formproducto'=>$formproducto->createView()
            )
        );
    }

    public function listaDetallesAction($id){
        $em=$this->getDoctrine()->getManager();
        $movimiento=$em->getRepository('MovimientoBundle:Movimiento')->find($id);
        $detalles=$em->getRepository('MovimientoBundle:DetalleMovimiento')->findBy(array('movimiento'=>$movimiento));
        return $this->render('MovimientoBundle:Admin:listadetalles.html.twig',
            array(
                'detalles'=>$detalles
            ));
    }

    public function listaPedidosAction(){
        $em=$this->getDoctrine()->getManager();
        $tipo=$em->getRepository('MovimientoBundle:TipoMovimiento')->findOneBy(array('descripcion'=>'pedido'));
        $pedidos=$em->getRepository('MovimientoBundle:Movimiento')->findBy(array('tipo'=>$tipo));
        return $this->render('MovimientoBundle:Admin:listapedidos.html.twig',
            array(
                'pedidos'=>$pedidos
            ));
    }
}
