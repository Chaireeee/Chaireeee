<?php

namespace Chaire\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Chaire\FormationBundle\Entity\Formation;
use Chaire\FormationBundle\Form\FormationType;
use Chaire\FormationBundle\Form\FormationEditType;
use Chaire\FormationBundle\Entity\photo;




class FormationController extends Controller
{
    public function eventIndexAction()
    {

        return $this->render('ChaireAdminBundle:Event:indexFormation.html.twig');
    }


    public function addFormationAction(Request $request)
    {
        $formation = new Formation();

        $form = $this->get('form.factory')->create(new FormationType(), $formation);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $formation->upload();

            $formation->setSyllabus(new photo());

            $formation->setLogopage(new photo());
            $formation->setLogoblanc(new photo());
            $formation->setPourqui(new photo());
            $formation->setPointprogramme1(new photo());
            $formation->setPointprogramme2(new photo());
            $formation->setPointprogramme3(new photo());
            $formation->setPointprogramme4(new photo());
            $formation->setPointprogramme5(new photo());
            $formation->setIntensiteprogramme(new photo());
            $formation->setPourquoi1(new photo());
            $formation->setPourquoi2(new photo());
            $formation->setPourquoi3(new photo());
            $formation->setPourquoi4(new photo());
            $formation->setInscription1(new photo());
            $formation->setInscription2(new photo());
            $formation->setPhoto(new photo());
            $formation->setFondaccueil(new photo());
            $formation->setFond1(new photo());
            $formation->setFond2(new photo());
            $formation->setFond3(new photo());



            $em->flush();
            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_formation_homepage'));
        }

        return $this->render('ChaireAdminBundle:Formation:addFormation.html.twig', array(
            'form' => $form->createView()

        ));

    }

    public function viewFormationAction()
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireFormationBundle:Formation');
        $formations = $repository->findAll();

        return $this->render('ChaireAdminBundle:Formation:viewFormation.html.twig',array('formations'=>$formations));
    }

    public function modifyFormationAction($id,Request $request)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireFormationBundle:Formation');
        $formation = $repository->find($id);

        $form = $this->get('form.factory')->create(new FormationEditType(), $formation);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $formation->upload();
            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_admin_viewFormation'));
        }


        return $this->render('ChaireAdminBundle:Formation:modifyFormation.html.twig',array('formation'=>$formation,
            'form' => $form->createView()));
    }

    public function deleteFormationAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $repository = $em->getRepository('ChaireFormationBundle:Formation');
        $formation = $repository->find($id);

        if ($formation!==null)
        {
            $em->remove($formation);
            $em->flush();
        }



        return $this->redirect($this->generateUrl('chaire_admin_viewFormation'));
    }



}
