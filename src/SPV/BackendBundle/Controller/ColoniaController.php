<?php

namespace SPV\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SPV\DireccionBundle\Entity\Colonia;
use SPV\BackendBundle\Form\ColoniaType;

/**
 * Colonia controller.
 *
 */
class ColoniaController extends Controller
{

    /**
     * Lists all Colonia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DireccionBundle:Colonia')->findAll();

        return $this->render('BackendBundle:Colonia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Colonia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Colonia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('colonia'));
        }

        return $this->render('BackendBundle:Colonia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Colonia entity.
     *
     * @param Colonia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Colonia $entity)
    {
        $form = $this->createForm(new ColoniaType(), $entity, array(
            'action' => $this->generateUrl('colonia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Agregar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Colonia entity.
     *
     */
    public function newAction()
    {
        $entity = new Colonia();
        $form   = $this->createCreateForm($entity);

        return $this->render('BackendBundle:Colonia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing Colonia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:Colonia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Colonia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:Colonia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Colonia entity.
    *
    * @param Colonia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Colonia $entity)
    {
        $form = $this->createForm(new ColoniaType(), $entity, array(
            'action' => $this->generateUrl('colonia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar','attr'=>array('class'=>'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Colonia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DireccionBundle:Colonia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Colonia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('colonia'));
        }

        return $this->render('BackendBundle:Colonia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Colonia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DireccionBundle:Colonia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Colonia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('colonia'));
    }

    /**
     * Creates a form to delete a Colonia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('colonia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
