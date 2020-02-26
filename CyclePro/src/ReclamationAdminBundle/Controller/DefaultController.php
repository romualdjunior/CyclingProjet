<?php

namespace ReclamationAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ReclamationAdmin/Default/index.html.twig');
    }
}
