<?php

namespace Chaire\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Chaire\AdminBundle\Entity\Address;
use Chaire\EventBundle\Entity\Event;
use Chaire\EventBundle\Entity\EventFrise;
use Chaire\EventBundle\Form\EventType;
use Chaire\EventBundle\Form\EventEditType;
use Chaire\EventBundle\Form\EventFriseType;
use GenerateurBundle\Entity\Page;



class EventController extends Controller
{
    public function eventIndexAction()
    {

        return $this->render('ChaireAdminBundle:Event:indexevent.html.twig');
    }


    public function addEventAction(Request $request)
    {
        $event = new Event();
        $address = new Address();
        $form = $this->get('form.factory')->create(new EventType(), $event);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();



            //$event->setPage(new Page());
            $em->persist($event);
            $em->flush();
            $this->get('session')->set('event',$event->getId());

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('generateur_add_page_from_event'));
        }

        return $this->render('ChaireAdminBundle:Event:addEvent.html.twig', array(
            'form' => $form->createView()

        ));

    }

    public function viewEventAction()
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireEventBundle:Event');
        $events = $repository->findAll();

        return $this->render('ChaireAdminBundle:Event:viewevent.html.twig',array('events'=>$events));
    }

    public function modifyEventAction($id,Request $request)
    {

        $this->get('session')->set('precurl','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireEventBundle:Event');
        $event = $repository->find($id);

        $form = $this->get('form.factory')->create(new EventEditType(), $event);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);

            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_event_homepage'));
        }


        return $this->render('ChaireAdminBundle:Event:modifyEvent.html.twig',array('events'=>$event,
            'form' => $form->createView()));
    }

    public function deleteEventAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $repository = $em->getRepository('ChaireEventBundle:Event');
        $event = $repository->find($id);

        if ($event!==null)
        {
            $em->remove($event);
            $em->flush();
        }



        return $this->redirect($this->generateUrl('chaire_admin_viewEvent'));
    }


    public function addFriseAction(Request $request)
    {

        $frise = New EventFrise();

        $form = $this->get('form.factory')->create(new EventFriseType(), $frise);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($frise);
            $frise->upload();
            $em->flush();

            //$request->getSession()->getFlashBag()->add('notice', 'Event bien enregistrée.');

            return $this->redirect($this->generateUrl('chaire_event_homepage'));
            }

        return $this->render('ChaireAdminBundle:Event:addFrise.html.twig',array(
            'form' => $form->createView()));

   }
}
