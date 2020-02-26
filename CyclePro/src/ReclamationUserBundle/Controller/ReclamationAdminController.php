<?php


namespace ReclamationUserBundle\Controller;


use ReclamationUserBundle\Entity\Reclamation;
use ReclamationUserBundle\Entity\Responsable;
use ReclamationUserBundle\Entity\Traitement;
use ReclamationUserBundle\Form\ResponsableType;
use ReclamationUserBundle\Form\TraitementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationAdminController extends Controller
{
    public function AjoutRespAction( Request  $request)

    {
        $Reclamation = new Responsable();
        $formResp = $this->createForm(ResponsableType::class, $Reclamation);
        $formResp->handleRequest($request);
        if ($formResp->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Reclamation);
            $em->flush();
            return $this->redirectToRoute("reclamation_listerResp");
        }
        return $this->render("@ReclamationUser/Responsable/ajoutResp.html.twig", array(
            'formResp' => $formResp->createView()
        ));
    }


    public function ListerRespAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository("ReclamationUserBundle:Responsable")->findAll();
        return $this->render("@ReclamationUser/Responsable/listerResp.html.twig", array('responsables' => $reclamations));

    }


    public function DeleteRespAction(Request $request, $idResponsable)
    {
        $reclamation = new Responsable();
        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository("ReclamationUserBundle:Responsable")->find($idResponsable);
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute("reclamation_listerResp");


    }


    public function UpdateRespAction($idResponsable, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository("ReclamationUserBundle:Responsable")->find($idResponsable);
        $formRespu = $this->createForm(ResponsableType::class, $reclamations);
        $formRespu->handleRequest($request);
        if ($formRespu->isSubmitted()) {
            $em->persist($reclamations);
            $em->flush();
            return $this->redirectToRoute('reclamation_listerResp');
        }

        return $this->render('@ReclamationUser/Responsable/updateResp.html.twig', array(
            'form' => $formRespu->createView()
        ));
    }

    public function TraitementAction($idResponsable, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository("ReclamationUserBundle:Traitement")->find($idResponsable);
        $formT = $this->createForm(TraitementType::class, $reclamations);
        $formT->handleRequest($request);
        if ($formT->isSubmitted() && $formT->isValid()) {
            $em->persist($reclamations);
            $em->flush();
            return $this->redirectToRoute('reclamation_traitement');
        }

        return $this->render('@ReclamationUser/Responsable/Traitement.html.twig', array(
            'formT' => $formT->createView()
        ));
    }



    public function AjoutTraitAction( Request  $request)

    {
        $traitement = new Traitement();
        $formT = $this->createForm(TraitementType::class, $traitement);
        $formT->handleRequest($request);
        if ($formT->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traitement);
            $em->flush();
            return $this->redirectToRoute("reclamation_listerRec");
        }
        return $this->render("@ReclamationUser/Responsable/Traitement.html.twig", array(
            'formT' => $formT->createView()
        ));
    }






}