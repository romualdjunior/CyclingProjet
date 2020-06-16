<?php

namespace StockAdminBundle\Controller;

use AppBundle\Entity\User;
use StockAdminBundle\Entity\Offre;
use StockAdminBundle\Entity\Velo;
use StockAdminBundle\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OffreController extends Controller
{public function createOAction(Request $request)
{
    //1.a creation d'un objet vide
    $offre=new \StockAdminBundle\Entity\Offre();

    //2.a creation d'un formulaire7
    $form=$this->createForm(\StockAdminBundle\Form\OffreType::class,$offre);

    //2.a recuperation des données
    $form=$form->handleRequest($request);
    //3.a test sur les données

    if($form->isSubmitted()){

        //4.a creation d'un objet doctrine
        $em=$this->getDoctrine()->getManager();
        //4.b persister les données de ORM
        $em->persist($offre);
        $id=$offre->getVelo();
        $velo=$em->getRepository(Velo::class)->find($id);
        $nvPrix=$velo->getPrixAchat()-($velo->getPrixAchat()*$offre->getPourcentage()/100);
        $offre->setNvPrix($nvPrix);
        $velo->setSoldee($nvPrix);

        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('consulter la liste de promotion');
        $notif->setMessage('');

        $users = $em->getRepository(User::class)->findAll();
        foreach ($users as $us)
        {
            $manager->addNotification(array($us), $notif, true);
        }




        //5.b sauv les données dans la BD
        $em->flush();
        //6.redirect to rout
        return $this->redirectToRoute('readO');

    }
    //1.c envoi du form a l'utilisateur
    return $this->render('@StockAdmin/Offre/ajout_Offre.html.twig', array( 'form'=>$form->createView()

        // ...
    ));
}
    public function readOAction(Request $request)
    {
        $em=$this->getDoctrine();
        $offre = new Offre();

        $offre=$em->getRepository(Offre::class)->findAll();
        $velo=$em->getRepository(Velo::class)->findAll();


        return $this->render('@StockAdmin/Offre/read_o.html.twig', array('offres'=>$offre, 'velos'=>$velo
            // ...
        ));
    }

    public function deleteOAction($id)
    {
        //1 recuperation de notre objet envoyé par user

        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $offre=$em->getRepository(Offre::class)->find($id);


        $idV=$offre->getVelo();

        $velo=$em->getRepository(Velo::class)->find($idV);

        $velo->setSoldee(0);

        //supp


        $em->remove($offre);

        $em->flush();
        return $this->redirectToRoute('readO');
    }
    public function updateOAction(Request $request,$id)
    {
        //1.a recu de notre objet selon id envoyé par l'user
        $em = $this->getDoctrine()->getManager();
        //1.a creation d'un objet vide
        $offre = $em->getRepository(Offre::class)->find($id);
        //2.a creation d'un formulaire7
        $form = $this->createForm(OffreType::class, $offre);

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
            return $this->redirectToRoute('readO');

        }

        return $this->render('@StockAdmin/Offre/update_o.html.twig', array('form' => $form->createView()
            // ...
        ));
    }



    public function readFRONTOFFREAction(Request $request)
    {
        $em=$this->getDoctrine();


        $offre=$em->getRepository(Offre::class)->findAll();



        return $this->render('@StockAdmin/Offre/front_o.html.twig', array('offres'=>$offre
            // ...
        ));}





}
