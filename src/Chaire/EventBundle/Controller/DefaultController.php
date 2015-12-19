<?php

namespace Chaire\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chaire\EventBundle\Entity\EventRepository;

class DefaultController extends Controller
{
    public function evenementAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireEventBundle:Event');
        $events = $repository->findAll();


        $now=new \DateTime();
        $event_passe=array();
        $event_futur=array();


        foreach($events as $ev)
        {
            if($ev->getEventDate()<$now)
            {
                $event_passe[]=$ev;
            }
            else
            {
                $event_futur[]=$ev;
            }

        }

        $loc=$this->get('request')->getLocale();

        return $this->render('ChaireEventBundle:Default:event.html.twig',array('loc'=>$loc,'page_active'=>1,'event_passe'=>$event_passe,'event_futur'=>$event_futur));
    }

    public function addpagetoeventAction($id)
    {
        $this->get('session')->set('event',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_event'));
    }

    public function addpagetoeventEnAction($id)
    {
        $this->get('session')->set('event',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_eventEn'));
    }
}
