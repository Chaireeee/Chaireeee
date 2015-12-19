<?php

namespace GenerateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  GenerateurBundle\Entity\Page;
use  GenerateurBundle\Form\PageType;
use  GenerateurBundle\Form\Stype3Type;
use  GenerateurBundle\Form\Stype3EditType;
use  GenerateurBundle\Entity\Stype3;

class Stype3Controller extends Controller
{

    public function addnewslideAction($idpage)
    {
        $slide = new Stype3();


        $form = $this->get('form.factory')->create(new Stype3Type(), $slide);

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


        $form = $this->get('form.factory')->create(new Stype3EditType(), $slide);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $page=$em->getRepository('GenerateurBundle\Entity\Page')->find($idpage);
            $slide->setPage($page);


            $em->persist($slide);
            $em->flush();



            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_edit_page',array('id'=>$idpage)));


        }

        return $this->render('GenerateurBundle:Page:editstype3.html.twig', array(
            'form' => $form->createView(),
            'slide'=>$slide,
            'page'=>$idpage

        ));
    }

    public function viewslideAction()
    {
        $em=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Stype3');
        $slide=$em->find(2);

        return $this->render('GenerateurBundle:Slide:viewstype2.html.twig', array(
            'slide' => $slide
        ));
    }
}
