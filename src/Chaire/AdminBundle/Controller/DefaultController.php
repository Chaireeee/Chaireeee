<?php

namespace Chaire\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChaireAdminBundle:Default:index.html.twig');
    }
}
