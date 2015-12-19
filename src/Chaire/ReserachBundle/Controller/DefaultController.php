<?php

namespace Chaire\ReserachBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireReserachBundle:Research');
        $res = $repository->findAll();


        $loc=$this->get('request')->getLocale();

        return $this->render('ChaireReserachBundle:Default:index.html.twig',array('page_active'=>5,'loc'=>$loc,'ress'=>$res));






    }


    public function addpagetoresearchAction($id)
    {
        $this->get('session')->set('research',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_research'));
    }

    public function addpagetoresearchEnAction($id)
    {
        $this->get('session')->set('research',$id);

        return $this->redirect($this->generateUrl('generateur_add_page_from_researchEn'));
    }


}
