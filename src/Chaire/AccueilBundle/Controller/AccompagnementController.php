<?php

namespace Chaire\AccueilBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chaire\AccueilBundle\Entity\Accompagnement;
use Chaire\AccueilBundle\Form\AccompagnementType;
use Chaire\AccueilBundle\Form\AccompagnementEditType;


/**
 * Accompagnement controller.
 *
 * @Route("/accompagnement")
 */
class AccompagnementController extends Controller
{




    /**
     * Lists all Accompagnement entities.
     *
     * @Route("/", name="accompagnement")
     * @Method("GET")
     * @Template("ChaireAccueilBundle:Accompagnement:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChaireAccueilBundle:Accompagnement')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Accompagnement entity.
     *
     * @Route("/addacc", name="accompagnement_create")
     * @Method("POST")
     * @Template("ChaireAccueilBundle:Accompagnement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Accompagnement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->set('accompagnement',$entity->getId());

            return $this->redirect($this->generateUrl('generateur_add_page_from_accompagnement'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Accompagnement entity.
     *
     * @param Accompagnement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Accompagnement $entity)
    {
        $form = $this->createForm(new AccompagnementType(), $entity, array(
            'action' => $this->generateUrl('accompagnement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Accompagnement entity.
     *
     * @Route("/new", name="accompagnement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Accompagnement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Accompagnement entity.
     *
     * @Route("/{id}", name="accompagnement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Accompagnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accompagnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Accompagnement entity.
     *
     * @Route("/{id}/edit", name="accompagnement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Accompagnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accompagnement entity.');
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
    * Creates a form to edit a Accompagnement entity.
    *
    * @param Accompagnement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Accompagnement $entity)
    {
        $form = $this->createForm(new AccompagnementEditType(), $entity, array(
            'action' => $this->generateUrl('accompagnement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Accompagnement entity.
     *
     * @Route("/{id}", name="accompagnement_update")
     * @Method("PUT")
     * @Template("ChaireAccueilBundle:Accompagnement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChaireAccueilBundle:Accompagnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accompagnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accompagnement_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Accompagnement entity.
     *
     * @Route("/{id}", name="accompagnement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChaireAccueilBundle:Accompagnement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Accompagnement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accompagnement'));
    }

    /**
     * Creates a form to delete a Accompagnement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accompagnement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
