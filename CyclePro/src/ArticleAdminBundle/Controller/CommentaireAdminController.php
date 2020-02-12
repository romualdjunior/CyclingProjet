<?php

namespace ArticleAdminBundle\Controller;

use ArticleAdminBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentaireAdminController extends Controller
{
    public function createAction()
    {
        return $this->render('@ArticleAdmin/CommentaireAdmin/create.html.twig', array(
            // ...
        ));
    }

    public function readAction()
    {   $em=$this->getDoctrine();
        $tab=$em->getRepository(Commentaire::class)->FindAll();
        return $this->render('@ArticleAdmin/CommentaireAdmin/read.html.twig', array(
          'commentaire'=>$tab      ));
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
        return $this->redirectToRoute("read_comt");
    }

}
