<?php

namespace Chaire\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireTeamBundle:Team');
        $members = $repository->findAll();


        $team=array();
        $club=array();
        $board=array();


        $i=0;
        foreach($members as $member)
        {
            if ($member->getCategory()=='0')
            {
                $team[]=$member;
            }
            if ($member->getCategory()=='1')
            {
                $club[]=$member;
            }
            if ($member->getCategory()=='2')
            {
                $board[]=$member;
            }

            $i++;
        }

        $loc=$this->get('request')->getLocale();


        return $this->render('ChaireTeamBundle:Default:index.html.twig',array('loc'=>$loc,'page_active'=>2,'team'=>$team,'club'=>$club,'board'=>$board));
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireTeamBundle:Team');
        $member = $repository->findOneById($id);

        if ($member ==null)
        {
            return $this->redirect($this->generateUrl('chaire_team_homepage'));
        }

        return $this->render('ChaireTeamBundle:Default:viewteammember.html.twig',array('member'=>$member,'page_active'=>2));
    }

}
