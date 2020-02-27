<?php

namespace ReclamationUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReclamationUserBundle:Default:index.html.twig');
    }
}
