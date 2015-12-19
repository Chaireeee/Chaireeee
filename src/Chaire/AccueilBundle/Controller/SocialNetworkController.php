<?php

namespace Chaire\AccueilBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chaire\AccueilBundle\Entity\SocialNetwork;
use Chaire\AccueilBundle\Form\SocialNetworkType;

/**
 * SocialNetwork controller.
 *
 * @Route("/socialnetwork")
 */
class SocialNetworkController extends Controller
{

    /**
     * Lists all SocialNetwork entities.
     *
     * @Route("/", name="socialnetwork")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChaireAccueilBundle:SocialNetwork')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SocialNetwork entity.
     *
     * @Route("/", name="socialnetwork_create")
     * @Method("POST")
     * @Template("ChaireAccueilBundle:SocialNetwork:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SocialNetwork();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('socialnetwork_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a SocialNetwork entity.
     *
     * @param SocialNetwork $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SocialNetwork $entity)
    {
        $form = $this->createForm(new SocialNetworkType(), $entity, array(
            'action' => $this->generateUrl('socialnetwork_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SocialNetwork entity.
     *
     * @Route("/new", name="socialnetwork_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SocialNetwork();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SocialNetwork entity.
     *
     * @Route("/{id}", name="socialnetwork_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SocialNetwork entity.
     *
     * @Route("/{id}/edit", name="socialnetwork_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
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
    * Creates a form to edit a SocialNetwork entity.
    *
    * @param SocialNetwork $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SocialNetwork $entity)
    {
        $form = $this->createForm(new SocialNetworkType(), $entity, array(
            'action' => $this->generateUrl('socialnetwork_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SocialNetwork entity.
     *
     * @Route("/{id}", name="socialnetwork_update")
     * @Method("PUT")
     * @Template("ChaireAccueilBundle:SocialNetwork:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('socialnetwork_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SocialNetwork entity.
     *
     * @Route("/{id}", name="socialnetwork_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChaireAccueilBundle:SocialNetwork')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('socialnetwork'));
    }

    /**
     * Creates a form to delete a SocialNetwork entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socialnetwork_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
