<?php

namespace SPV\ClienteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\ClienteBundle\Entity\Cliente;

/**
 * Cliente controller.
 *
 */
class ClienteController extends Controller
{

    /**
     * Lists all Cliente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClienteBundle:Cliente')->findAll();

        return $this->render('ClienteBundle:Cliente:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Cliente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        return $this->render('ClienteBundle:Cliente:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    public function activarAction($id){

        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('ClienteBundle:Cliente')->find($id);
        $cliente->setStatus(true);
        $em->persist($cliente);
        $em->flush();
        return $this->redirect($this->generateUrl('cliente'));
    }

    public function desactivarAction($id){

        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('ClienteBundle:Cliente')->find($id);
        $cliente->setStatus(false);
        $em->persist($cliente);
        $em->flush();
        return $this->redirect($this->generateUrl('cliente'));
    }
}
