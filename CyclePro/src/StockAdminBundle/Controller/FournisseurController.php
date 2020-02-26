<?php

namespace StockAdminBundle\Controller;

use StockAdminBundle\Entity\Fournisseur;
use StockAdminBundle\Form\FournisseurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcher;

class FournisseurController extends Controller
{

    public function creatFAction(Request $request)
    {
        //1.a creation d'un objet vide
        $fournisseur=new \StockAdminBundle\Entity\Fournisseur();

        //2.a creation d'un formulaire7
        $form=$this->createForm(\StockAdminBundle\Form\FournisseurType::class,$fournisseur);

        //2.a recuperation des données
        $form=$form->handleRequest($request);
        //3.a test sur les données

        if($form->isSubmitted()){
            //4.a creation d'un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //4.b persister les données de ORM
            $em->persist($fournisseur);
            //5.b sauv les données dans la BD
            $em->flush();
            //6.redirect to rout
            return $this->redirectToRoute('readF');

        }
        //1.c envoi du form a l'utilisateur
        return $this->render('@StockAdmin/Fournisseur/creat_f.html.twig', array( 'form'=>$form->createView()
            // ...
        ));
    }


    public function readFAction(Request $request)
    {
        $em=$this->getDoctrine();


        $fournisseur=$em->getRepository(Fournisseur::class)->findAll();


        return $this->render('@StockAdmin/Fournisseur/read_f.html.twig', array('fournisseurs'=>$fournisseur
            // ...
        ));
    }


    public function updateFAction(Request $request,$id)
    {
        //1.a recu de notre objet selon id envoyé par l'user
        $em = $this->getDoctrine()->getManager();
        //1.a creation d'un objet vide
        $fournisseur = $em->getRepository(Fournisseur::class)->find($id);
        //2.a creation d'un formulaire7
        $form = $this->createForm(FournisseurType::class, $fournisseur);

        //2.a recuperation des données
        $form = $form->handleRequest($request);
        //3.a test sur les données
        if ($form->isValid()) {

            $em->flush();
            //6.redirect to rout
            return $this->redirectToRoute('readF');

        }
        return $this->render('@StockAdmin/Fournisseur/update_f.html.twig', array('form' => $form->createView()
            // ...
        ));
    }




    public function deleteFAction($id)
    {
        //1 recuperation de notre objet envoyé par user
        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $fournisseur=$em->getRepository(Fournisseur::class)->find($id);
        //supp
        $em->remove($fournisseur);
        $em->flush();
        return $this->redirectToRoute('readF');
    }

}
