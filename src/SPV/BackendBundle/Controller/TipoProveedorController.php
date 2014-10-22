<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\ProveedorBundle\Entity\TipoProveedor;
use SPV\BackendBundle\Form\TipoProveedorType;

/**
 * TipoProveedor controller.
 *
 */
class TipoProveedorController extends Controller
{

    /**
     * Lists all TipoProveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProveedorBundle:TipoProveedor')->findAll();

        return $this->render('BackendBundle:TipoProveedor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoProveedor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoProveedor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproveedor'));
        }

        return $this->render('BackendBundle:TipoProveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoProveedor entity.
     *
     * @param TipoProveedor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoProveedor $entity)
    {
        $form = $this->createForm(new TipoProveedorType(), $entity, array(
            'action' => $this->generateUrl('tipoproveedor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new TipoProveedor entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoProveedor();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:TipoProveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoProveedor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProveedorBundle:TipoProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProveedor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:TipoProveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoProveedor entity.
    *
    * @param TipoProveedor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoProveedor $entity)
    {
        $form = $this->createForm(new TipoProveedorType(), $entity, array(
            'action' => $this->generateUrl('tipoproveedor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing TipoProveedor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProveedorBundle:TipoProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproveedor'));
        }

        return $this->render('BackendBundle:TipoProveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoProveedor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ProveedorBundle:TipoProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoProveedor entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('tipoproveedor'));
    }

    /**
     * Creates a form to delete a TipoProveedor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoproveedor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar','attr'=>array('class'=>'btn btn-primary')))
            ->getForm()
        ;
    }
}
