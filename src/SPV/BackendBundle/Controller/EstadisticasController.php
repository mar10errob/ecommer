<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SPV\ProductoBundle\Entity\Producto;
use SPV\MovimientoBundle\Entity\Movimiento;
/**
 * Colonia controller.
 *
 */
class EstadisticasController extends Controller
{
	public function indexAction()
	{
		return $this->render('BackendBundle:Default:index.html.twig');
	}

	public function crearAction(Request $request)
	{
		$finicial=$request->get('inicial');
		$ffinal=$request->get('final');
		$em = $this->getDoctrine()->getManager();
        $productos = $em->getRepository('ProductoBundle:Producto')->findRango($finicial,$ffinal);
        $count=0;
        $fechas=array('inicial'=>$finicial,'final'=>$ffinal);
        foreach ($productos as $producto) {
        	$ventas=0;
        	$compras=0;
        	$detalles=$em->getRepository('MovimientoBundle:DetalleMovimiento')->findBy(array('producto'=>$producto->getId()));
        	foreach ($detalles as $detalle) {
        		if($detalle->getMovimiento()->getTipo()->getDescripcion()=='pedido'){
        			$ventas+=$detalle->getCantidad();
        		}
        		if($detalle->getMovimiento()->getTipo()->getDescripcion()=='compra'){
        			$compras+=$detalle->getCantidad();
        		}
        	}
        	$datos[$count]=array('producto'=>$producto,'ventas'=>$ventas,'compras'=>$compras);
        	$count++;
        }
		return $this->render('BackendBundle:Default:estadisticas.html.twig',array(
			'datos'=> $datos,
			'fechas'=>$fechas
			));
		// $html = $finicial." ".$ffinal;
		// return new Response(print_r($datos), 200, array('Content-Type' => 'text/html'));
	}
}