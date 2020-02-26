<?php

namespace ReclamationAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReclamationAdminBundle:Default:index.html.twig');
    }
}
