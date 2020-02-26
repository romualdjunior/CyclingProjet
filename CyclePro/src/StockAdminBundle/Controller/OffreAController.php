<?php

namespace StockAdminBundle\Controller;

use AppBundle\Entity\User;
use StockAdminBundle\Entity\Accessoires;
use StockAdminBundle\Entity\OffreA;
use StockAdminBundle\Form\OffreAType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OffreAController extends Controller
{public function createOAAction(Request $request)
{
    //1.a creation d'un objet vide
    $offreA=new \StockAdminBundle\Entity\OffreA();

    //2.a creation d'un formulaire7
    $form=$this->createForm(\StockAdminBundle\Form\OffreAType::class,$offreA  );

    //2.a recuperation des données
    $form=$form->handleRequest($request);
    //3.a test sur les données

    if($form->isSubmitted()){

        //4.a creation d'un objet doctrine
        $em=$this->getDoctrine()->getManager();
        //4.b persister les données de ORM
        $em->persist($offreA);
        $id=$offreA->getAccessoires();
        $AC=$em->getRepository(Accessoires::class)->find($id);
        $nvPrix=$AC->getPrix()-($AC->getPrix()*$offreA->getPoucentage()/100);
        $offreA->setNvPrix($nvPrix);
        $AC->setSoldee($nvPrix);

        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('consulter la liste de promotion');
        $notif->setMessage('This a notification.');

        $users = $em->getRepository(User::class)->findAll();

        foreach ($users as $us)
        {
            $manager->addNotification(array($us), $notif, true);
        }




        //5.b sauv les données dans la BD
        $em->flush();
        //6.redirect to rout
        return $this->redirectToRoute('readOA');

    }
    //1.c envoi du form a l'utilisateur
    return $this->render('@StockAdmin/OffreA/ajout_OffreA.html.twig', array( 'form'=>$form->createView()

        // ...
    ));
}
    public function readOAAction(Request $request)
    {
        $em=$this->getDoctrine();
        $offreA = new OffreA();

        $offreA=$em->getRepository(OffreA::class)->findAll();
        $AC=$em->getRepository(Accessoires::class)->findAll();

        return $this->render('@StockAdmin/OffreA/read_oA.html.twig', array('offresA'=>$offreA, 'ACs'=>$AC
            // ...
        ));
    }

    public function deleteOAAction($id)
    {
        //1 recuperation de notre objet envoyé par user

        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $offreA=$em->getRepository(OffreA::class)->find($id);


        $idA=$offreA->getAccessoires();

        $AC=$em->getRepository(Accessoires::class)->find($idA);

        $AC->setSoldee(0);

        //supp


        $em->remove($offreA);

        $em->flush();
        return $this->redirectToRoute('readOA');
    }
    public function updateOAAction(Request $request,$id)
    {
        //1.a recu de notre objet selon id envoyé par l'user
        $em = $this->getDoctrine()->getManager();
        //1.a creation d'un objet vide
        $offreA = $em->getRepository(OffreA::class)->find($id);
        //2.a creation d'un formulaire7
        $form = $this->createForm(OffreAType::class, $offreA);

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
            return $this->redirectToRoute('readOA');

        }

        return $this->render('@StockAdmin/OffreA/update_oA.html.twig', array('form' => $form->createView()
            // ...
        ));
    }



    public function readFRONTOFFREAAction(Request $request)
    {
        $em=$this->getDoctrine();


        $offreA=$em->getRepository(OffreA::class)->findAll();



        return $this->render('@StockAdmin/OffreA/front_oA.html.twig', array('offresA'=>$offreA
            // ...
        ));}


}
