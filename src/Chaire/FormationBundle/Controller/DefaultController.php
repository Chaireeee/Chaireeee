<?php

namespace Chaire\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chaire\FormationBundle\Entity\photo;
use Chaire\FormationBundle\Form\photoType;
use Chaire\FormationBundle\Form\photoEditType;

class DefaultController extends Controller
{

    public function addpagetoformationAction($id)
    {
        $this->get('session')->set('formation',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_formation'));
    }

    public function addpagetoformationEnAction($id)
    {
        $this->get('session')->set('formation',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_formationEn'));
    }


    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireFormationBundle:Formation');
        $formations = $repository->findAll();


        $executive=array();
        $studentescp=array();
        $studentexte=array();

        foreach($formations as $form)
        {
            if ($form->getExecutive())
            {
                $executive[]=$form;
            }
            if ($form->getStudentExte())
            {
                $studentexte[]=$form;
            }
            if ($form->getStudentEscp())
            {
                $studentescp[]=$form;
            }








        }
        $loc=$this->get('request')->getLocale();
        return $this->render('ChaireFormationBundle:Default:index.html.twig',array( 'loc'=>$loc,'page_active'=>3,'executive'=>$executive,'studentexte'=>$studentexte,'studentescp'=>$studentescp));
    }

    public function viewformationAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireFormationBundle:Formation');
        $formation = $repository->find($id);

        if ($formation!=null)
        {

            $base=$formation->getCanonicalname();
            $text=$this->getText($base);
            return $this->render('ChaireFormationBundle:Default:viewformation.html.twig',array('formation'=>$formation,'text'=>$text));

        }




        return $this->indexAction();
      }

    private function getText($base)
    {

        $translator = $this->get('translator');

        $text['0'] = $translator->trans($base.'.metapagetitle');
        $text['1'] = $translator->trans($base.'.who');
        $text['2'] = $translator->trans($base.'.program');
        $text['3'] = $translator->trans($base.'.why');
        $text['4'] = $translator->trans($base.'.inscription');
        $text['5'] = $translator->trans($base.'.infoprat');
        $text['6'] = $translator->trans($base.'.description');
        $text['7'] = $translator->trans($base.'.date');
        $text['8'] = $translator->trans($base.'.campus');
        $text['9'] = $translator->trans($base.'.bouttonjetente');
        $text['10'] = $translator->trans($base.'.pourquititre');
        $text['11'] = $translator->trans($base.'.pourquiresume');
        $text['12'] = $translator->trans($base.'.pourquipedagogie');
        $text['13'] = $translator->trans($base.'.programme');
        $text['14'] = $translator->trans($base.'.programmedescription');
        $text['15'] = $translator->trans($base.'.programmepedagogie');
        $text['16'] = $translator->trans($base.'.telechargersyllabus');
        $text['17'] = $translator->trans($base.'.programmeresume');
        $text['18'] = $translator->trans($base.'.programmeintesite');
        $text['19'] = $translator->trans($base.'.pourquoi');
        $text['20'] = $translator->trans($base.'.pourquoiraison1titre');
        $text['21'] = $translator->trans($base.'.pourquoiraison1');
        $text['22'] = $translator->trans($base.'.pourquoiraison2titre');
        $text['23'] = $translator->trans($base.'.pourquoiraison2');
        $text['24'] = $translator->trans($base.'.pourquoiraison3titre');
        $text['25'] = $translator->trans($base.'.pourquoiraison3');
        $text['26'] = $translator->trans($base.'.pourquoiraison4titre');
        $text['27'] = $translator->trans($base.'.pourquoiraison4');
        $text['28'] = $translator->trans($base.'.inscription');
        $text['29'] = $translator->trans($base.'.infopratique');
        $text['30'] = $translator->trans($base.'.infopratiquewhere');
        $text['31'] = $translator->trans($base.'.infopratiquewherecampus');
        $text['32'] = $translator->trans($base.'.infopratiquewhereadresse');
        $text['33'] = $translator->trans($base.'.infopratiquewherecampustrip');
        $text['34'] = $translator->trans($base.'.infopratiquewheretripdate');
        $text['35'] = $translator->trans($base.'.infopratiquewho');
        $text['36'] = $translator->trans($base.'.infopratiquewhosince');
        $text['37'] = $translator->trans($base.'.infopratiquewhonetwork');
        $text['38'] = $translator->trans($base.'.infopratiquequestion');
        $text['39'] = $translator->trans($base.'.infopratiquecontact');
        $text['40'] = $translator->trans($base.'.infopratiquecontactrole');
        $text['41'] = $translator->trans($base.'.infopratiquecontactmail');
        $text['42'] = $translator->trans($base.'.infopratiquecontactrealmail');
        $text['43'] = $translator->trans($base.'.infopratiquecontacttel');
        $text['44'] = $translator->trans($base.'.list1');
        $text['45'] = $translator->trans($base.'.list2');
        $text['46'] = $translator->trans($base.'.list3');
        $text['47'] = $translator->trans($base.'.list4');
        $text['48'] = $translator->trans($base.'.list5');
        $text['49'] = $translator->trans($base.'.list6');
        $text['50'] = $translator->trans($base.'.list7');
        $text['51'] = $translator->trans($base.'.list8');
        $text['52'] = $translator->trans($base.'.metadesc');
        $text['53'] = $translator->trans($base.'.metapaauthor');
        $text['54'] = $translator->trans($base.'.telechargersyllabuslink');
        $text['55'] = $translator->trans($base.'.candidaturelink');
        $text['56'] = $translator->trans($base.'.chaireeelink');




        return $text;

    }

    public function addphotoAction()
    {
        $photo = new photo();


        $form = $this->get('form.factory')->create(new photoType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_event_homepage'));
        }

        return $this->render('ChaireFormationBundle:Default:addphoto.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function modifyphotoAction($id,$idformation)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\photo')->find($id);


        $form = $this->get('form.factory')->create(new photoType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_admin_modifyFormation',array('id'=>$idformation)));
        }

        return $this->render('ChaireFormationBundle:Default:addphoto.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function modifyphotoreturnAction($id)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\photo')->find($id);


        $form = $this->get('form.factory')->create(new photoEditType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->get('session')->get('precurl'));
        }

        return $this->render('ChaireFormationBundle:Default:addphoto.html.twig', array(
            'form' => $form->createView()

        ));
    }




    public function modifyphotoeventAction($id,$idformation)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\photo')->find($id);


        $form = $this->get('form.factory')->create(new photoType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_admin_modifyEvent',array('id'=>$idformation)));
        }

        return $this->render('ChaireFormationBundle:Default:modifyphoto.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function modifyphotoaccompagnementAction($id,$idaccompagnement)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\photo')->find($id);


        $form = $this->get('form.factory')->create(new photoEditType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('accompagnement_edit',array('id'=>$idaccompagnement)));
        }

        return $this->render('ChaireFormationBundle:Default:modifyphoto.html.twig', array(
            'form' => $form->createView()

        ));
    }



}
