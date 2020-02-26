<?php

namespace StockAdminBundle\Controller;


use StockAdminBundle\Entity\Accessoires;
use StockAdminBundle\Entity\OffreA;
use StockAdminBundle\Form\AccessoiresType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AccessoiresController extends Controller
{
    public function createAAction(Request $request)
    {
        //1.a creation d'un objet vide
        $AC=new \StockAdminBundle\Entity\Accessoires();
        $photoA=$request->get('photoA');
        $photoA1=$request->get('photoA1');
        $photoA2=$request->get('photoA2');
        $photoA3=$request->get('photoA3');
        //2.a creation d'un formulaire7
        $form=$this->createForm(\StockAdminBundle\Form\AccessoiresType::class,$AC);

        //2.a recuperation des données
        $form=$form->handleRequest($request);
        //3.a test sur les données

        if($form->isSubmitted()){

            $AC->setPhotoA($photoA);
            $AC->setPhotoA($photoA1);
            $AC->setPhotoA($photoA2);
            $AC->setPhotoA($photoA3);
            //4.a creation d'un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //4.b persister les données de ORM
            $em->persist($AC);
            //5.b sauv les données dans la BD
            $em->flush();
            //6.redirect to rout
            return $this->redirectToRoute('readA');

        }
        //1.c envoi du form a l'utilisateur
        return $this->render('@StockAdmin/Accessoires/creat_a.html.twig', array( 'form'=>$form->createView()

            // ...
        ));
    }
    public function readAAction(Request $request)
    {
        $em=$this->getDoctrine();
        $AC=$em->getRepository(Accessoires::class)->findAll();
        return $this->render('@StockAdmin/Accessoires/read_a.html.twig', array('ACs'=>$AC
            // ...
        ));
    }

    public function deleteAAction($id)
    {
        //1 recuperation de notre objet envoyé par user
        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $AC=$em->getRepository(Accessoires::class)->find($id);
        //supp
        $em->remove($AC);
        $em->flush();
        return $this->redirectToRoute('readA');
    }
    public function updateAAction(Request $request,$id)
    {
        //1.a recu de notre objet selon id envoyé par l'user
        $em = $this->getDoctrine()->getManager();
        //1.a creation d'un objet vide
        $AC = $em->getRepository(Accessoires::class)->find($id);
        //2.a creation d'un formulaire7
        $form = $this->createForm(AccessoiresType::class, $AC);

        //2.a recuperation des données
        $form = $form->handleRequest($request);
        //3.a test sur les données
        if ($form->isValid()) {
            //4.a creation d'un objet doctrine
            // $em=$this->getDoctrine()->getManager();
            //4.b persister les données de ORM
            //$em->persist($club);
            //5.b sauv les données dans la BD
            $em->flush();
            //6.redirect to rout
            return $this->redirectToRoute('readA');

        }

        return $this->render('@StockAdmin/Accessoires/update_a.html.twig', array('form' => $form->createView()
            // ...
        ));
    }
    public function listeACAction(Request $request)
    {
        $em=$this->getDoctrine();


        $AC=$em->getRepository(Accessoires::class)->findAll();

        $offreA=$em->getRepository(OffreA::class)->findAll();
        $paginator=$this->get('knp_paginator');
        $result = $paginator->paginate(
            $AC,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)
        );
        return $this->render('@StockAdmin/Accessoires/liste_a.html.twig', array('ACs'=>$result, 'offresA'=>$offreA
            // ...
        ));}

    public function ShowACAction($id)
    {
        $em=$this->getDoctrine()->getManager();;


        $AC=$em->getRepository(Accessoires::class)->find($id);
        $ACs = $em->getRepository(Accessoires::class)->findAll();

        return $this->render('@StockAdmin/Accessoires/shop_single_a.html.twig', array('AC'=>$AC,
            'ACs' => $ACs
            // ...
        ));
    }
}
