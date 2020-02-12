<?php

namespace ArticleUserBundle\Controller;

use ArticleAdminBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function readAction()
    {   $em=$this->getDoctrine();
        $tab=$em->getRepository(Article::class)->FindAll();
        return $this->render('@ArticleUser/Default/readArticle.html.twig',array(
            "articles"=>$tab        ));
    }

    public function readsingleAction($id)
    {  $em=$this->getDoctrine();
        $tab=$em->getRepository(Article::class)->findbyid($id);
        return $this->render('@ArticleUser/Default/blog_single.html.twig',array(
            "article"=>$tab
        ));

    }


}
