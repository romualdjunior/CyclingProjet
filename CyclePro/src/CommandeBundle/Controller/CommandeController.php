<?php

namespace CommandeBundle\Controller;
use CommandeBundle\Entity\Payment;
use CommandeBundle\Entity\Produit;
use CommandeBundle\Entity\Penalite;
use CommandeBundle\Entity\Location;
use CommandeBundle\Entity\Adresse;
use CommandeBundle\Entity\Commande;
use CommandeBundle\Entity\LignePanier;
use CommandeBundle\Form\AdresseType;
use CommandeBundle\Form\CommandeType;
use Monolog\Processor\UidProcessor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ReclamationUserBundle\Entity\Mail;

class CommandeController extends Controller
{
    public function afficherAdresseAction(){

        return $this->render('@Commande/checkout.html.twig');
    }

    public function ajouterAdresseAction(Request $request){
        $Adresse=new Adresse();
        $form=$this->createForm(AdresseType::class,$Adresse);
        $form=$form->handleRequest($request);
        if ($form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Adresse);
            $em->flush();
            $session=$request->getSession();
            $session->set("etat","non paye");
            $session->set("idAdresse",$Adresse->getId());
            return $this->redirectToRoute("ajouterCommande");
        }

        return $this->render('@Commande/checkout.html.twig', array(
            "form"=>$form->createView()
            // ...
        ));
    }
    public function ajouterCommandeAction(Request $request){
        //1.a Créer un objet vide
            $commande=new Commande();
            //4.a Création d'un obet doctrin
            $em=$this->getDoctrine()->getManager();
            $commande->setEtat("non paye");
            $session=$request->getSession();
        $adresse=$em->getRepository(Adresse::class)->find($session->get("idAdresse"));
            $commande->setAdresse($adresse);
            $commande->setUser($this->getUser());
            $commande->setTotal($request->getSession()->get("total"));
            $commande->setDate(date("Y-m-d"));
            $em->persist($commande);
            $em->flush();
            $commande2=new Commande();
            $commande2=$em->getRepository(Commande::class)->findOneBy(['adresse' =>$adresse,"user"=>$this->getUser(),"total"=>$commande->getTotal(),"date"=>$commande->getDate()]);
            $session->set('idCommande',$commande2->getId());

        //6.a redirect to route
            return $this->redirectToRoute("ajouterLignePanier");

    }
    public function ajouterLignePanierAction(Request $request){
        //1.a Créer un objet vide
        $lignePanier=new LignePanier();
        //4.a Création d'un obet doctrin
        $em=$this->getDoctrine()->getManager();
        $session=$request->getSession();
        $commande=$em->getRepository(Commande::class)->find($session->get("idCommande"));
        $lignePanier->setCommande($commande);
        $panierWithData=$request->getSession()->get("panierWithData");
        $produit=new Produit();
        foreach ( $panierWithData as $item) {
            if($item['produit']!=null){
                $produit=$em->getRepository(Produit::class)->find($item['produit']->getId());
                $lignePanier->setProduit($produit);
                $lignePanier->setQuantite(($item["produit"]->getQuantite()));
                $em->persist($lignePanier);
                $em->flush();
            }
        }

        return $this->redirectToRoute("preparerPaiement");

    }

    public function afficherCommandePanierAction(Request $request){
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Commande::class)->findAllCommandePanier();
        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate(
            $tab,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',8)

        );
        return $this->render("@Commande/commandePanier.html.twig",array("lignePaniers"=>$result));

    }
    public function supprimerAdresseAction($id){
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $Adresse=$em->getRepository(Adresse::class)->find($id);
        $em->remove($Adresse);
        $em->flush();
        return $this->redirectToRoute("afficherCommandePanier");
    }
    public function ajouterLocationAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $dateDebut=$request->get("dateDebut");
        $dateFin=$request->get("dateFin");
        $idProduit=$request->get("idProduit");
        $quantite=$request->get("quantite");
        $produit=new produit();
        $produit=$em->getRepository(Produit::class)->find($idProduit);
        $location=new Location();
        $location->setQuantite($quantite);
        $location->setProduit($produit);
        $location->setDateDebut($dateDebut);
        $location->setDateFin($dateFin);
        $location->setUser($this->getUser());
        $em->persist($location);
        $em->flush();
        return $this->redirectToRoute("ajouterPenalite");
   }
   public function ajouterPenaliteAction(){
       date_default_timezone_set('Africa/Douala');
       $em=$this->getDoctrine()->getManager();
       $tab=$em->getRepository(Location::class)->findAll();
       $penalite=new Penalite();
       foreach ($tab as $location ){
           if (strtotime($location->getDateFin())-strtotime($location->getDateDebut())<0){
               $duree=abs((strtotime($location->getDateFin())-strtotime($location->getDateDebut()))/3600000);
               $penalite->setDuree($duree);
               $penalite->setPrix($location->getQuantite()*$location->getProduit()->getPrixLocationHeure()*$duree);
               $penalite->setLocation($location);
               $em->persist($penalite);
               $em->flush();
           }
       }
       return new JsonResponse("effectué avec succès");
   }


    public function afficherPaiementAction(){
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Commande::class)->findAllPaiement();
        return $this->render("@Commande/paiement.html.twig",array("paiements"=>$tab));

    }

    public function afficherPenaliteAction(){
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Penalite::class)->findAllPenalite();
        return $this->render("@Commande/penalite.html.twig",array("penalites"=>$tab));

    }
    public function filtreCommandePanierAction(Request $request){
        $em=$this->getDoctrine();
        $mot=$request->get("mot");
        $tab=$em->getRepository(Commande::class)->findCommandePanier($mot);
       return new JsonResponse(array("lignePanier"=>$tab));
    }

    public function UtilisateurBloqueAction(Request $request){
        $id=$request->get("id");
        $em=$this->getDoctrine();
        $locations=$em->getRepository(Penalite::class)->findPenaliteClient($id);
        if(count($locations)>0)
            return new JsonResponse("true");
        else  return new JsonResponse("false");
    }

    public function imprimerFactureAction($id){
        $em=$this->getDoctrine()->getManager();
        $commande=$em->getRepository(Commande::class)->find($id);
        $snappy = $this->get('knp_snappy.pdf');

        $html = $this->renderView('@Commande/facture.html.twig', array(
            //..Send some data to your view if you need to //
            'commande' => $commande

        ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
public function afficherReceiptAction(){
        return $this->redirectToRoute("sendMail");
}

public function sendMailAction(){
        $mail=new Mail();
        $objet="Commande de produits";
        $username="romuald.motchehokamguia@esprit.tn";
        $message=\Swift_Message::newInstance()
            ->setSubject("Validation de commande")
            ->setFrom($username)
            ->setTo($username)
            ->setBody("votre comamnde a été validée avec succès");
        $this->get("mailer")->send($message);
    return $this->render("@Commande/receipt.html.twig");
}



}
