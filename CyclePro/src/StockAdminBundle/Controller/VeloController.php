<?php

namespace StockAdminBundle\Controller;

use StockAdminBundle\Entity\Fournisseur;
use StockAdminBundle\Entity\Offre;
use StockAdminBundle\Entity\Velo;
use StockAdminBundle\Form\VeloType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class VeloController extends Controller
{
    public function createVAction(Request $request)
{
    //1.a creation d'un objet vide
    $velo=new \StockAdminBundle\Entity\Velo();
    $photoV=$request->get('photoV');
    //2.a creation d'un formulaire7
    $form=$this->createForm(\StockAdminBundle\Form\VeloType::class,$velo);

    //2.a recuperation des données
    $form=$form->handleRequest($request);
    //3.a test sur les données

    if($form->isSubmitted()){
        $velo->setSoldee(0);
        $velo->setPhotoV($photoV);
        //4.a creation d'un objet doctrine
        $em=$this->getDoctrine()->getManager();
        //4.b persister les données de ORM
        $em->persist($velo);



        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('un velo a été ajouté');
        $notif->setMessage('This a notification.');


        $manager->addNotification(array($this->getUser()), $notif, true);






        //5.b sauv les données dans la BD
        $em->flush();
        //6.redirect to rout
        return $this->redirectToRoute('readV');

    }
    //1.c envoi du form a l'utilisateur
    return $this->render('@StockAdmin/Velo/creat_v.html.twig', array( 'form'=>$form->createView()

        // ...
    ));
}
    public function readVAction(Request $request)
    {
        $em=$this->getDoctrine();
        $fournisseur = new Fournisseur();

        $velo=$em->getRepository(Velo::class)->findAll();
        $fournisseur=$em->getRepository(Fournisseur::class)->findAll();

        return $this->render('@StockAdmin/Velo/read_v.html.twig', array('velos'=>$velo, 'fournisseurs'=>$fournisseur
            // ...
        ));
    }

    public function deleteVAction($id)
    {
        //1 recuperation de notre objet envoyé par user
        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $velo=$em->getRepository(Velo::class)->find($id);
        //supp
        $em->remove($velo);
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('un velo a été suprimé');
        $notif->setMessage('This a notification.');


        $manager->addNotification(array($this->getUser()), $notif, true);


        $em->flush();
        return $this->redirectToRoute('readV');
    }
    public function updateVAction(Request $request,$id)
    {
        //1.a recu de notre objet selon id envoyé par l'user
        $em = $this->getDoctrine()->getManager();
        //1.a creation d'un objet vide
        $velo = $em->getRepository(Velo::class)->find($id);
        //2.a creation d'un formulaire7
        $form = $this->createForm(VeloType::class, $velo);

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
            return $this->redirectToRoute('readV');

        }

        return $this->render('@StockAdmin/Velo/update_v.html.twig', array('form' => $form->createView()
            // ...
        ));
    }



    public function readFRONTAction(Request $request)
    {
        $em=$this->getDoctrine();


        $velo=$em->getRepository(Velo::class)->findAll();


        return $this->render('@StockAdmin/Velo/front.html.twig', array('velos'=>$velo
            // ...
        ));}

    public function listeVelosAction(Request $request)
    {
        $em=$this->getDoctrine();


        $velo=$em->getRepository(Velo::class)->findAll();

        $offre=$em->getRepository(Offre::class)->findAll();
        $paginator=$this->get('knp_paginator');
        $result = $paginator->paginate(
            $velo,
            $request->query->getInt('page',1),
        $request->query->getInt('limit',6)
        );
        return $this->render('@StockAdmin/Velo/liste_v.html.twig', array('velos'=>$result, 'offres'=>$offre
            // ...
        ));}

        public function descAction(Request $request)
    {
        $em=$this->getDoctrine();


        $velo=$em->getRepository(Velo::class)->findDESC();

        $paginator=$this->get('knp_paginator');
        $result = $paginator->paginate(
            $velo,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)
        );
        return $this->render('@StockAdmin/Velo/liste_v.html.twig', array('velos'=>$result
            // ...
        ));



    }

    public function ascAction(Request $request)
    {
        $em=$this->getDoctrine();


        $velo=$em->getRepository(Velo::class)->findASC();

        $paginator=$this->get('knp_paginator');
        $result = $paginator->paginate(
            $velo,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)
        );
        return $this->render('@StockAdmin/Velo/liste_v.html.twig', array('velos'=>$result
            // ...
        ));
}
    public function shopSAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();;


        $velo=$em->getRepository(Velo::class)->findAll();

        return $this->render('@StockAdmin/Velo/shop_single.html.twig', array('velos'=>$velo
            // ...
        ));}

    public function ShowVeloAction($id)
    {
        $em=$this->getDoctrine()->getManager();;


        $velo=$em->getRepository(Velo::class)->find($id);
        $velos = $em->getRepository(Velo::class)->findAll();

        return $this->render('@StockAdmin/Velo/shop_single.html.twig', array('velo'=>$velo,
            'velos' => $velos
            // ...
        ));
    }


}