<?php

namespace ArticleAdminBundle\Controller;

use ArticleAdminBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommentaireAdminController extends Controller
{
    public function createAction()
    {
        return $this->render('@ArticleAdmin/CommentaireAdmin/create.html.twig', array(
            // ...
        ));
    }

    public function readAction($id)
    {  $em=$this->getDoctrine();
        $tab=$em->getRepository(Commentaire::class)->findComment($id);
        return $this->render('@ArticleAdmin/CommentaireAdmin/read.html.twig', array(
            'comt'=>$tab      ));
    }

    public function updateAction()
    {
        return $this->render('@ArticleAdmin/CommentaireAdmin/update.html.twig', array(
            // ...
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $comt=$em->getRepository(Commentaire::class)->find($id);
        $em->remove($comt);
        $em->flush();
        return $this->redirectToRoute("read_article");
    }

    public function searchcomtAction(Request $request){

        $input=$request->get("input");
        $em=$this->getDoctrine()->getManager();
        $comt=$em->getRepository(Commentaire::class)->mysearch($input);
        return new JsonResponse(array("comt"=>$comt));

    }




}
