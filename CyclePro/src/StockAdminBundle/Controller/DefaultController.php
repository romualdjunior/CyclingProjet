<?php

namespace StockAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StockAdminBundle:Default:index.html.twig');
    }
}
