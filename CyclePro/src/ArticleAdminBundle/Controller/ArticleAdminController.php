<?php

namespace ArticleAdminBundle\Controller;

use ArticleAdminBundle\Entity\Article;
use ArticleAdminBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleAdminController extends Controller
{
    public function createAction(Request $request)
    {
        $article=new Article();
        $category=$request->get('category');
        $photo=$request->get('photo');

        $form=$this->createForm(ArticleType::class,$article);
        $form=$form->handleRequest($request);
        if( $form->isSubmitted()&& $form->isValid()){
            $article->setCategory($category);
            $article->setPhoto($photo);
                $em=$this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
                return $this->redirectToRoute('read_article');
        }
        return $this->render('@ArticleAdmin/ArticleAdmin/create.html.twig', array(
            "form"=>$form->createView()  ));
    }

    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Article::class)->FindAll();
        return $this->render('@ArticleAdmin/ArticleAdmin/read.html.twig', array(
            "articles"=>$tab        ));
    }

    public function updateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$article);
        $form=$form->handleRequest($request);
        if($form->isValid()){
            $em->flush();
            return $this->redirectToRoute("read_article");
        }
        return $this->render('@ArticleAdmin/ArticleAdmin/create.html.twig', array(
            "form"=>$form->createView()  ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute("read_article");
    }
}
