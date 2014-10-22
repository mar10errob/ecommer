<?php

namespace SPV\ProductoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\ProductoBundle\Entity\Producto;

/**
 * Producto controller.
 *
 */
class ProductoController extends Controller
{

    /**
     * Lists all Producto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductoBundle:Producto')->findAll();

        return $this->render('ProductoBundle:Producto:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Producto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductoBundle:Producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Producto entity.');
        }

        return $this->render('ProductoBundle:Producto:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ProductoBundle:Producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProveedor entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('producto'));
    }
}
