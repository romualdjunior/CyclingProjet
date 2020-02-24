<?php

namespace StockFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StockFrontBundle:Default:index.html.twig');
    }
}
