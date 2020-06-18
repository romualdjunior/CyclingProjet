<?php

namespace ArticleUserBundle\Controller;


use AppBundle\Entity\User;
use ArticleAdminBundle\Entity\Article;
use ArticleAdminBundle\Entity\Commentaire;
use ArticleAdminBundle\Entity\Favorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    public function readAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->FindAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $tab,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)

        );
        dump(get_class($paginator));


        return $this->render('@ArticleUser/Default/readArticle.html.twig', array(
            "articles" => $result));
    }
    //readArticlejson
    public function readjsonAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->FindAll();

        $serializer= new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($tab);
        return new JsonResponse($formatted);

    }

    public function readsingleAction($id)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->findbyid($id);
        $recent=$em->getRepository(Article::class)->recentArticle();
        $fav=$em->getRepository(Favorie::class)->favArticle();
        return $this->render('@ArticleUser/Default/blog_single.html.twig', array(
            "article" => $tab,
            "recent" =>$recent,
            "fav" =>$fav,
        ));

    }
    //readSingleJson
    public function readsinglejsonAction($id)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->findbyid($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function readSportAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('sport');
        return $this->render('@ArticleUser/Default/readArticleCategory.html.twig', array(
            "articles" => $tab));

    }
    //readSportJson
    public function readSportjsonAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('sport');
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function readNutritionAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('nutrition');
        return $this->render('@ArticleUser/Default/readArticleCategory.html.twig', array(
            "articles" => $tab));
    }
//Nutritionjson
    public function readNutritionjsonAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('nutrition');
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function readCyclismeAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('cyclisme');
        return $this->render('@ArticleUser/Default/readArticleCategory.html.twig', array(
            "articles" => $tab));
    }
//cyclismeJson
    public function readCyclismejsonAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('cyclisme');
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function readBienAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('Bien etre');
        return $this->render('@ArticleUser/Default/readArticleCategory.html.twig', array(
            "articles" => $tab));
    }
    //BienJson
    public function readBienjsonAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Article::class)->articleCategory('Bien etre');
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function searchWordAction(Request $request)
    {
        $em = $this->getDoctrine();
        $contenue = $request->query->get('s');
        $tab = $em->getRepository(Article::class)->search($contenue);
        return $this->render('@ArticleUser/Default/blog_single.html.twig', array(
            "article" => $tab
        ));

    }

    public function pdfArticleAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $singlearticle = $em->getRepository('ArticleAdminBundle:Article')->find($id);

        $snappy = $this->get("knp_snappy.pdf");

        $html = $this->renderView("@ArticleUser/Default/singleArticlePDf.html.twig", array(
            "title" => "Article choisie",
            'SingleArticle' => $singlearticle
        ));
        $filename = "articleSingle";


        return new  Response(
            $snappy->getOutputFromHtml($html),
            200,

            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename"' . $filename . '.pdf"',
            )
        );


    }

    public function createcomtAction(Request $request, $id){
      $em=$this->getDoctrine()->getManager();
      $article=$em->getRepository("ArticleAdminBundle:Article")->find($id);
                $comment=new Commentaire();
                $contenue=$request->get('contenue');
                $comment->setContenue($contenue);
                $comment->setDateComt(new \DateTime('now'));
                $comment->setLikes(0);
                $comment->setArticle($article);
                $em->persist($comment);
                $user = $em->getRepository(User::class)->find($this->getUser());
                $comment->setUser($user);
                $em->flush();

      return $this->redirectToRoute("single_article_user", array("id"=>$id));

  }

    public function searchuserAction(Request $request){
        $em = $this->getDoctrine();
        $word=$request->get('s');
        $result=$em->getRepository(Article::class)->searchword($word);
        return $this->render('@ArticleUser/ArticleUser/search.html.twig', array(
            "articles"=>$result ));

    }
    public function aimeplusAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $article->setLikes($article->getLikes()+1);
        $em->flush();
        return $this->redirectToRoute("single_article_user",array("id"=>$id));
    }
    //LikeJson
    public function likejsonAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $article->setLikes($article->getLikes()+1);
        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($article);
        return new JsonResponse($formatted);
    }
    public function createfavoritAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)->find($id);
        $fav=new Favorie();
        $fav->setArticle($article);

        $fav->setDateAjout(new \Datetime('now'));
        $user = $em->getRepository(User::class)->find($this->getUser());
        $fav->setUser($user);
        $em->persist($fav);
        $em->flush();
        return $this->redirectToRoute("single_article_user",array("id"=>$id));
    }


    //json favorit
    public function createfavoritjsonAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $fav=new Favorie();
        $user = $em->getRepository(User::class)->find($request->get('user'));
        $article=$em->getRepository("ArticleAdminBundle:Article")->find($request->get('article'));
        $fav->setArticle($article);
        $fav->setUser($user);
        $em->persist($fav);
        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($fav);
        return new JsonResponse($formatted);

    }





    public function readfavoritAction(Request $request){
        $em=$this->getDoctrine();
        $user=$this->getUser()->getId();
        $tab=$em->getRepository(Favorie::class)->findfav($user);
        return $this->render('@ArticleUser/Default/favourite.html.twig', array(
            "fav"=>$tab ));
    }

    //json
    public function findFavoritAction(Request $request)
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Favorie::class)->findfav($request->get('id'));

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);
    }

    public function deletefavoritAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $fav=$em->getRepository(Favorie::class)->find($id);
        $em->remove($fav);
        $em->flush();

        return $this->redirectToRoute("read_favorit");
    }



    //json
    public function createCommentaireAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = new Commentaire();
        $user = $em->getRepository(User::class)->find($request->get('user'));

        $contenue=$request->get('contenue');
        $article=$em->getRepository("ArticleAdminBundle:Article")->find($request->get('article'));
        // $user=$request->get('user');
        // $user=$this->container->get(‘idUser’)->getToken()->getUser()->getId();

        $comment->setContenue($contenue);
        $comment->setDateComt(new \DateTime('now'));
        $comment->setLikes(0);
        $comment->setArticle($article);
        $comment->setUser($user);
        $em->persist($comment);
        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($comment);
        return new JsonResponse($formatted);
    }

}
