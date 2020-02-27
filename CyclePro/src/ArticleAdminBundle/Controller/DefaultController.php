<?php

namespace ArticleAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ArticleAdmin/Default/index.html.twig');
    }
    public function ajouterAction()
    {
        return $this->render('@ArticleAdmin/Default/ajouterArticle.html.twig');
    }
    public function deleteAction()
    {
        return $this->render('@ArticleAdmin/Default/delete.html.twig');
    }

}
