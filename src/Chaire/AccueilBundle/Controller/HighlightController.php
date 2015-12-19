<?php

namespace Chaire\AccueilBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chaire\AccueilBundle\Entity\Highlight;
use Chaire\AccueilBundle\Form\HighlightType;

/**
 * Highlight controller.
 *
 * @Route("/highlight")
 */
class HighlightController extends Controller
{

    /**
     * Lists all Highlight entities.
     *
     * @Route("/", name="highlight")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChaireAccueilBundle:Highlight')->findAll();


        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Highlight entity.
     *
     * @Route("/", name="highlight_create")
     * @Method("POST")
     * @Template("ChaireAccueilBundle:Highlight:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Highlight();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('highlight_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Highlight entity.
     *
     * @param Highlight $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Highlight $entity)
    {
        $form = $this->createForm(new HighlightType(), $entity, array(
            'action' => $this->generateUrl('highlight_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Highlight entity.
     *
     * @Route("/new", name="highlight_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Highlight();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Highlight entity.
     *
     * @Route("/{id}", name="highlight_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Highlight')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Highlight entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Highlight entity.
     *
     * @Route("/{id}/edit", name="highlight_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Highlight')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Highlight entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Highlight entity.
    *
    * @param Highlight $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Highlight $entity)
    {
        $form = $this->createForm(new HighlightType(), $entity, array(
            'action' => $this->generateUrl('highlight_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Highlight entity.
     *
     * @Route("/{id}", name="highlight_update")
     * @Method("PUT")
     * @Template("ChaireAccueilBundle:Highlight:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Highlight')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Highlight entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('highlight_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Highlight entity.
     *
     * @Route("/{id}", name="highlight_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChaireAccueilBundle:Highlight')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Highlight entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('highlight'));
    }

    /**
     * Creates a form to delete a Highlight entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('highlight_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
