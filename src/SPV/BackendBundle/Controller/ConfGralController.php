<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\DireccionBundle\Entity\ConfGral;
use SPV\BackendBundle\Form\ConfGralType;

/**
 * ConfGral controller.
 *
 */
class ConfGralController extends Controller
{

    /**
     * Lists all ConfGral entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DireccionBundle:ConfGral')->findAll();

        return $this->render('BackendBundle:ConfGral:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ConfGral entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ConfGral();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('confgral_show', array('id' => $entity->getId())));
        }

        return $this->render('BackendBundle:ConfGral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ConfGral entity.
     *
     * @param ConfGral $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ConfGral $entity)
    {
        $form = $this->createForm(new ConfGralType(), $entity, array(
            'action' => $this->generateUrl('confgral_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConfGral entity.
     *
     */
    public function newAction()
    {
        $entity = new ConfGral();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:ConfGral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConfGral entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:ConfGral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfGral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:ConfGral:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConfGral entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:ConfGral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfGral entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:ConfGral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConfGral entity.
    *
    * @param ConfGral $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConfGral $entity)
    {
        $form = $this->createForm(new ConfGralType(), $entity, array(
            'action' => $this->generateUrl('confgral_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing ConfGral entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:ConfGral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfGral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('confgral'));
        }

        return $this->render('BackendBundle:ConfGral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConfGral entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DireccionBundle:ConfGral')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfGral entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('confgral'));
    }

    /**
     * Creates a form to delete a ConfGral entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('confgral_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
