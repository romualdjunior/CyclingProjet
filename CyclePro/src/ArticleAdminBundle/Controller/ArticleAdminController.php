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
        $dat=$request->get('datecre');

        $datte=$this->availableDate = new \DateTime();

        $form=$this->createForm(ArticleType::class,$article);
        $form=$form->handleRequest($request);
        if( $form->isSubmitted()&& $form->isValid()){
            $article->setLikes(0);
            $article->setCategory($category);
            $article->setPhoto($photo);
            $article->setDateArt($datte);
                $em=$this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
            $this->addFlash('success', 'Article ajouté!');
                return $this->redirectToRoute('read_article');
        }
        return $this->render('@ArticleAdmin/ArticleAdmin/create.html.twig', array(
            "form"=>$form->createView()  ));
    }

    public function readAction(Request $request)
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Article::class)->FindAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */

        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate(
            $tab,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)

        );
        dump(get_class($paginator));


        return $this->render('@ArticleAdmin/ArticleAdmin/read.html.twig', array(
            "articles"=>$result        ));
    }

    public function updateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$article);
        $form=$form->handleRequest($request);
        if($form->isValid()){
            $em->flush();
            $this->addFlash('success', 'Article modifié!');
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
        $this->addFlash('success', 'Article suprimé!');
        return $this->redirectToRoute("read_article");
    }

    public function searchAction(Request $request){
        $em = $this->getDoctrine();
        $word=$request->get('search');
        $result=$em->getRepository(Article::class)->searchword($word);
        return $this->render('@ArticleAdmin/ArticleAdmin/search.html.twig', array(
            "articles"=>$result ));

    }

   /* public function searchligneAction(Request $request){
        $em = $this->getDoctrine();
        $nbrl=$request->get('nbrl');
        $result=$em->getRepository(Article::class)->searchnbrl($nbrl);
        return $this->render('@ArticleAdmin/ArticleAdmin/search.html.twig', array(
            "articles"=>$result ));

    }*/

}
