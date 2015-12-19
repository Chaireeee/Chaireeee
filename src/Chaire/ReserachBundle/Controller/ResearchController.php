<?php

namespace Chaire\ReserachBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chaire\ReserachBundle\Entity\Research;
use Chaire\ReserachBundle\Form\ResearchType;

/**
 * Research controller.
 *
 * @Route("/research")
 */
class ResearchController extends Controller
{

    /**
     * Lists all Research entities.
     *
     * @Route("/", name="research")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChaireReserachBundle:Research')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Research entity.
     *
     * @Route("/", name="research_create")
     * @Method("POST")
     * @Template("ChaireReserachBundle:Research:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Research();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('research_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Research entity.
     *
     * @param Research $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Research $entity)
    {
        $form = $this->createForm(new ResearchType(), $entity, array(
            'action' => $this->generateUrl('research_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Research entity.
     *
     * @Route("/new", name="research_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Research();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Research entity.
     *
     * @Route("/{id}", name="research_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireReserachBundle:Research')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Research entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Research entity.
     *
     * @Route("/{id}/edit", name="research_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireReserachBundle:Research')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Research entity.');
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
    * Creates a form to edit a Research entity.
    *
    * @param Research $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Research $entity)
    {
        $form = $this->createForm(new ResearchType(), $entity, array(
            'action' => $this->generateUrl('research_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Research entity.
     *
     * @Route("/{id}", name="research_update")
     * @Method("PUT")
     * @Template("ChaireReserachBundle:Research:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireReserachBundle:Research')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Research entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('research_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Research entity.
     *
     * @Route("/{id}", name="research_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChaireReserachBundle:Research')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Research entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('research'));
    }

    /**
     * Creates a form to delete a Research entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('research_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
