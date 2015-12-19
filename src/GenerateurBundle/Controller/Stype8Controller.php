<?php

namespace GenerateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  GenerateurBundle\Entity\Page;
use  GenerateurBundle\Form\PageType;
use  GenerateurBundle\Form\Stype8Type;
use  GenerateurBundle\Form\Stype8EditType;
use  GenerateurBundle\Entity\Stype8;

class Stype8Controller extends Controller
{

    public function addnewslideAction($idpage)
    {
        $slide = new Stype8();


        $form = $this->get('form.factory')->create(new Stype8Type(), $slide);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $page=$em->getRepository('GenerateurBundle\Entity\Page')->find($idpage);
            $slide->setPage($page);
            $em->persist($slide);
            $em->flush();

            $slide->setOrdre($slide->getId());
            $em->flush();





            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_edit_page',array('id'=>$idpage)));
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function editslideAction($idslide,$idpage)
    {
        $slide = $this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->find($idslide);


        $form = $this->get('form.factory')->create(new Stype8EditType(), $slide);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $page=$em->getRepository('GenerateurBundle\Entity\Page')->find($idpage);
            $slide->setPage($page);


            $em->persist($slide);
            $em->flush();



            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_edit_page',array('id'=>$idpage)));


        }

        return $this->render('GenerateurBundle:Page:editstype8.html.twig', array(
            'form' => $form->createView(),
            'slide'=>$slide,
            'page'=>$idpage

        ));
    }

    public function viewslideAction()
    {
        $em=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Stype8');
        $slide=$em->find(2);

        return $this->render('GenerateurBundle:Slide:viewstype8.html.twig', array(
            'slide' => $slide
        ));
    }
}
