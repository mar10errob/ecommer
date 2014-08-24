<?php

namespace SPV\ProveedorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\ProveedorBundle\Entity\Proveedor;

/**
 * Proveedor controller.
 *
 */
class ProveedorController extends Controller
{

    /**
     * Lists all Proveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProveedorBundle:Proveedor')->findAll();

        return $this->render('ProveedorBundle:Proveedor:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Proveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProveedorBundle:Proveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedor entity.');
        }

        return $this->render('ProveedorBundle:Proveedor:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
