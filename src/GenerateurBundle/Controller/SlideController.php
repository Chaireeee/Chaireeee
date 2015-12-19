<?php

namespace GenerateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  GenerateurBundle\Entity\Page;
use  GenerateurBundle\Form\PageType;
use  GenerateurBundle\Form\Stype1Type;
use  GenerateurBundle\Form\PictureEditType;
use  GenerateurBundle\Entity\Stype1;
use  GenerateurBundle\Entity\Stype2;
use  GenerateurBundle\Entity\Stype3;
use  GenerateurBundle\Entity\Stype4;
use  GenerateurBundle\Entity\Stype5;
use  GenerateurBundle\Entity\Stype6;
use  GenerateurBundle\Entity\Stype7;
use  GenerateurBundle\Entity\Stype8;

class SlideController extends Controller
{

    public function deleteslideAction($id,$idpage)
    {
        $slide=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->find($id);
        $this->getDoctrine()->getManager()->remove($slide);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirect($this->generateUrl('generateur_edit_page',array('id'=>$idpage)));
    }

    public function editslideAction($idslide,$idpage)
    {
        $slide=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->find($idslide);

        if ($slide instanceof Stype1)
        {
            return $this->redirect($this->generateUrl('generateur_edit1_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }
        if ($slide instanceof Stype2)
        {
            return $this->redirect($this->generateUrl('generateur_edit2_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }
        if ($slide instanceof Stype3)
        {
            return $this->redirect($this->generateUrl('generateur_edit3_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }

        if ($slide instanceof Stype4)
        {
            return $this->redirect($this->generateUrl('generateur_edit4_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }

        if ($slide instanceof Stype5)
        {
            return $this->redirect($this->generateUrl('generateur_edit5_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }
        if ($slide instanceof Stype6)
        {
            return $this->redirect($this->generateUrl('generateur_edit6_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }
        if ($slide instanceof Stype7)
        {
            return $this->redirect($this->generateUrl('generateur_edit7_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }
        if ($slide instanceof Stype8)
        {
            return $this->redirect($this->generateUrl('generateur_edit8_slide',array('idslide'=>$idslide,'idpage'=>$idpage)));
        }


        return $this->redirect($this->generateUrl('generateur_edit_page',array('id'=>$idpage)));
    }


    public function editphotoAction($idpicture,$idpage,$idslide)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Picture')->find($idpicture);


        $form = $this->get('form.factory')->create(new PictureEditType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();



            $em->persist($photo);
            $em->flush();


            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_edit_slide',array('idpage'=>$idpage,'idslide'=>$idslide)));

        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));


    }



    public function editphotofrompageAction($idpicture,$idpage)
    {

        $photo = $this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Picture')->find($idpicture);


        $form = $this->get('form.factory')->create(new PictureEditType(), $photo);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();



            $em->persist($photo);
            $em->flush();


            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_modify_info_page',array('id'=>$idpage)));

        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));


    }





}
