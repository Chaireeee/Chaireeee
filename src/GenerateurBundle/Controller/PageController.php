<?php

namespace GenerateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  GenerateurBundle\Entity\Page;
use  GenerateurBundle\Form\PageType;
use GenerateurBundle\Entity\Slide;
use GenerateurBundle\Entity\Stype1;
use GenerateurBundle\Entity\Stype2;
use GenerateurBundle\Entity\Stype3;
use GenerateurBundle\Entity\Stype4;
use GenerateurBundle\Entity\Stype5;
use GenerateurBundle\Entity\Stype6;
use GenerateurBundle\Entity\Stype7;
use GenerateurBundle\Entity\Stype8;
use  GenerateurBundle\Form\PageEditType;

class PageController extends Controller
{

    public function addnewPagefromeventEnAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('event');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\EventBundle\Entity\Event');
            $event=$em->find($eventid);
            $event->setPageEn($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPagefromeventAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('event');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\EventBundle\Entity\Event');
            $event=$em->find($eventid);
            $event->setPage($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }



    public function addnewPagefromaccompagnementAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('accompagnement');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\AccueilBundle\Entity\Accompagnement');
            $event=$em->find($eventid);
            $event->setPage($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPagefromaccompagnementEnAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('accompagnement');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\AccueilBundle\Entity\Accompagnement');
            $event=$em->find($eventid);
            $event->setPageEn($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPagefromformationAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('formation');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\Formation');
            $event=$em->find($eventid);
            $event->setPage($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPagefromformationEnAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('formation');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\FormationBundle\Entity\Formation');
            $event=$em->find($eventid);
            $event->setPageEn($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }


    public function addnewPagefromresearchAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('research');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\ReserachBundle\Entity\Research');
            $event=$em->find($eventid);
            $event->setPage($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPagefromresearchEnAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $eventid=$this->get('session')->get('research');
            $em=$this->getDoctrine()->getManager()->getRepository('Chaire\ReserachBundle\Entity\Research');
            $event=$em->find($eventid);
            $event->setPageEn($page);

            $em=$this->getDoctrine()->getManager();
            $em->persist($page);
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function addnewPageAction()
    {
        $page = new Page();


        $form = $this->get('form.factory')->create(new PageType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:addpage.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function modifyPageinfoAction($id)
    {
        $em=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Page');
        $page=$em->find($id);



        $form = $this->get('form.factory')->create(new PageEditType(), $page);

        if ($form->handleRequest($this->getRequest())->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->editPageAction($page->getId());
        }

        return $this->render('GenerateurBundle:Page:modifypage.html.twig', array(
            'form' => $form->createView(),
            'page'=>$page

        ));
    }

    public function viewPageAction($id)
    {

        $r= $this->getparam($id);


        return $this->render('GenerateurBundle:Page:viewpage.html.twig', array(
            'page' => $r['page'],
            'slides'=>$r['render'],
            'title'=>$r['title'],
            'link'=>$r['link'],
            'idslide'=>$r['idslide']
        ));
    }

    public function editPageAction($id)
    {


       $r= $this->getparam($id);


        return $this->render('GenerateurBundle:Page:editpage.html.twig', array(
            'page' => $r['page'],
            'slides'=>$r['render'],
            'title'=>$r['title'],
            'link'=>$r['link'],
            'idslide'=>$r['idslide'],
            'ordre'=>$r['ordre']
        ));
    }

    public function chooseslideAction($id)
    {
        return $this->render('GenerateurBundle:Slide:choose.html.twig', array(
        'id'=>$id
        ));
    }

    public function baisserslideAction($idslide,$idpage)
    {
        $page=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Page')->find($idpage);

        $listslide=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->findByPage($page);

        $change=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->find($idslide);

        $justinf=null;
        foreach($listslide as $slide)
        {
            if ($slide->getOrdre()>$change->getOrdre())
            {
                if ($justinf==null)
                {
                    $justinf=$slide;
                }
                else{
                    if ($slide->getOrdre()<$justinf->getOrdre())
                    {
                        $justinf=$slide;
                    }
                }
            }
        }

        if ($justinf!=null)
        {
            $temp=$change->getOrdre();
            $change->setOrdre($justinf->getOrdre());
            $justinf->SetOrdre($temp);
            $this->getDoctrine()->getManager()->flush();
        }



        return $this->editPageAction($idpage);




    }

    public function monterslideAction($idslide,$idpage)
    {

        $page=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Page')->find($idpage);

        $listslide=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->findByPage($page);

        $change=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide')->find($idslide);

        $justinf=null;
        foreach($listslide as $slide)
        {
            if ($slide->getOrdre()<$change->getOrdre())
            {
                if ($justinf==null)
                {
                    $justinf=$slide;
                }
                else{
                    if ($slide->getOrdre()>$justinf->getOrdre())
                    {
                        $justinf=$slide;
                    }
                }
            }
        }

        if ($justinf!=null)
        {
            $temp=$change->getOrdre();
            $change->setOrdre($justinf->getOrdre());
            $justinf->SetOrdre($temp);
            $this->getDoctrine()->getManager()->flush();
        }



        return $this->editPageAction($idpage);


    }

    private function getparam($id)
    {
        $em=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Page');
        $page=$em->find($id);

        $em=$this->getDoctrine()->getManager()->getRepository('GenerateurBundle\Entity\Slide');
        $slides=$em->findByPage($page, array('ordre' => 'ASC'));


        $render=array();
        $title=array();
        $link=array();
        $idslide=array();
        $order=array();

        foreach($slides as $slide )
        {

            if ($slide instanceof Stype1)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype1.html.twig', array(
                    'slide'=>$slide
                ))->getContent();
                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype2)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype2.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype3)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype3.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype4)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype4.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype5)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype5.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype6)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype6.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }
            if ($slide instanceof Stype7)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype7.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }

            if ($slide instanceof Stype8)
            {
                $render[]=$this->render('GenerateurBundle:Slide:viewstype8.html.twig', array(
                    'slide'=>$slide
                ))->getContent();

                $title[]=$slide->getName();
                $link[]=$slide->getId();
                $idslide[]=$slide->getId();
                $order[]=$slide->getOrdre();

            }


        }

        return array('title'=>$title,'link'=>$link,'idslide'=>$idslide,'render'=>$render,'page'=>$page,'ordre'=>$order);
    }

}
