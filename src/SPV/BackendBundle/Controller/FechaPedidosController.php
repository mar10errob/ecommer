<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\DireccionBundle\Entity\FechaPedidos;
use SPV\BackendBundle\Form\FechaPedidosType;

/**
 * FechaPedidos controller.
 *
 */
class FechaPedidosController extends Controller
{

    /**
     * Lists all FechaPedidos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DireccionBundle:FechaPedidos')->findAll();

        return $this->render('BackendBundle:FechaPedidos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new FechaPedidos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FechaPedidos();
        $form = $this->createCreateForm($entity,$request->query->get('id'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $pedido=$em->getRepository('MovimientoBundle:Movimiento')->find($request->query->get('id'));
            $entity->setPedido($pedido);
            $pedido->setFechaEntrega($entity->getFecha());
            $em->persist($entity);
            $em->persist($pedido);
            $em->flush();

            return $this->redirect($this->generateUrl('fechapedidos'));
        }

        return $this->render('BackendBundle:FechaPedidos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FechaPedidos entity.
     *
     * @param FechaPedidos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FechaPedidos $entity, $id)
    {
        $form = $this->createForm(new FechaPedidosType(), $entity, array(
            'action' => $this->generateUrl('fechapedidos_create',array('id'=>$id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Agendar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new FechaPedidos entity.
     *
     */
    public function newAction($id)
    {
        $entity = new FechaPedidos();
        $form   = $this->createCreateForm($entity, $id);

        return $this->render('BackendBundle:FechaPedidos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FechaPedidos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:FechaPedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FechaPedidos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:FechaPedidos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FechaPedidos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:FechaPedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FechaPedidos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:FechaPedidos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FechaPedidos entity.
    *
    * @param FechaPedidos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FechaPedidos $entity)
    {
        $form = $this->createForm(new FechaPedidosType(), $entity, array(
            'action' => $this->generateUrl('fechapedidos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing FechaPedidos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:FechaPedidos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FechaPedidos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $pedido=$em->getRepository('MovimientoBundle:Movimiento')->find($entity->getPedido()->getId());
            $pedido->setFechaEntrega($entity->getFecha());
            $em->persist($pedido);
            $em->flush();

            return $this->redirect($this->generateUrl('fechapedidos'));
        }

        return $this->render('BackendBundle:FechaPedidos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FechaPedidos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DireccionBundle:FechaPedidos')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FechaPedidos entity.');
            }

            $pedido=$em->getRepository('MovimientoBundle:Movimiento')->find($entity->getPedido()->getId());
            $pedido->setFechaEntrega(NULL);
            $em->persist($pedido);
            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('fechapedidos'));
    }

    /**
     * Creates a form to delete a FechaPedidos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fechapedidos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
