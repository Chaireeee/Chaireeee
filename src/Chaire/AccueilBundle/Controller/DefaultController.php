<?php

namespace Chaire\AccueilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ChaireAccueilBundle:Highlight')->findByActivated(1);

        $loc=$this->get('request')->getLocale();

        return $this->render('ChaireAccueilBundle:Default:index.html.twig',array('highlights'=>$entities,'loc'=>$loc));
    }

    public function setlangageenAction($path)
    {
        $this->get('session')->set('_locale', 'en_UK');




        return $this->redirect($this->generateUrl($path));
    }

    public function setlangagenativeAction($path)
    {
        $this->get('session')->set('_locale', 'fr_FR');
       return $this->redirect($this->generateUrl($path ));
    }

    public function accompagnementAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ChaireAccueilBundle:Accompagnement');
        $accompagnement = $repository->findAll();

        $loc=$this->get('request')->getLocale();



        return $this->render('ChaireAccueilBundle:Accompagnement:viewacc.html.twig',array('loc'=>$loc,'accompagnement'   => $accompagnement,'page_active'=>4));





    }

    public function addpagetoaccompagnementAction($id)
    {


        $this->get('session')->set('accompagnement',$id);


    return $this->redirect( $this->generateUrl('generateur_add_page_from_accompagnement'));



    }

    public function addpagetoaccompagnementEnAction($id)
    {


        $this->get('session')->set('accompagnement',$id);


        return $this->redirect( $this->generateUrl('generateur_add_page_from_accompagnementEn'));



    }



}
