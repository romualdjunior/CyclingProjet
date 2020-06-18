<?php

namespace ReclamationUserBundle\Controller;

 use Symfony\Component\HttpFoundation\Request;

use ReclamationUserBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReclamationUserBundle:Default:index.html.twig');
    }


    public function ajoutReclamationMobileAction($nom,$prenom,$tel ,$adresse , $date, $raison , $details , $refVelo , $idClient , $email , $type){

    $Reclamation=new Reclamation();
    $Reclamation->setNomClient($nom);
    $Reclamation->setPrenomClient($prenom);
    $Reclamation->setTel($tel);
    $Reclamation->setAdresse($adresse);
    $Reclamation->setDate($date) ;
    $Reclamation->setRaison($raison) ;
    $Reclamation->setDetails($details) ;
    $Reclamation->setRefVelo($refVelo);
    $Reclamation->setIdClient($idClient);
    $Reclamation->setEmail($email);
    $Reclamation->setType($type);

    $em=$this->getDoctrine()->getManager();
    $em->persist($Reclamation);
    $em->flush();
    return new JsonResponse("Reclamation ajoutée avec succès",200);
}




    public function AfficherReclamationMobileAction( Request $request , $id)
    {
        $em = $this->getDoctrine();
        $tab = $em->getRepository(Reclamation::class)->Find($id);

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tab);
        return new JsonResponse($formatted);

    }



    public function UpdateReclamationMobileAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository(Reclamation::class)->find($id);
        $reclamation->setIdClient($reclamation->getIdClient()+1);
        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse($formatted);
    }



    }
