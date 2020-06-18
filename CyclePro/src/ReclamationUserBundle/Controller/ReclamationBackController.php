<?php


namespace ReclamationUserBundle\Controller;


use Doctrine\ORM\Tools\Pagination\LimitSubqueryOutputWalker;
use ReclamationUserBundle\Entity\Reclamation;
use ReclamationUserBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ReclamationBackController extends  Controller

{
public function AjoutAction( Request $request)

{
$Reclamation = new Reclamation() ;
$form = $this-> createForm(ReclamationType::class, $Reclamation) ;
$form -> handleRequest($request) ;
if ( $form-> isSubmitted())
{
    $em =$this-> getDoctrine()-> getManager();
    $em -> persist($Reclamation) ;
    $em-> flush();
    return $this->redirectToRoute("reclamation_remerc") ;
}
return $this-> render("@ReclamationUser/Reclamation/ajout.html.twig" , array(
    'form'=>$form->createView()
));
}

    public function UpdateAction($idReclamation, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository("ReclamationUserBundle:Reclamation")->find($idReclamation);
        $formRespu = $this->createForm(ReclamationType::class, $reclamations);
        $formRespu->handleRequest($request);
        if ($formRespu->isSubmitted()) {
            $em->persist($reclamations);
            $em->flush();
            return $this->redirectToRoute('reclamation_remerc');
        }

        return $this->render('@ReclamationUser/Reclamation/update.html.twig', array(
            'form' => $formRespu->createView()
        ));
    }





public function ListerAction ()
{
    $em = $this-> getDoctrine()->getManager() ;
    $reclamations = $em->getRepository("ReclamationUserBundle:Reclamation") -> findAll() ;
    return $this -> render("@ReclamationUser/Responsable/listerRec.html.twig" , array ('reclamations' => $reclamations)) ;

}





public function  DeleteAction ( Request $request , $idReclamation)
{
    $reclamation = new Reclamation();
    $em = $this->getDoctrine()->getManager();
    $reclamation = $em->getRepository("ReclamationUserBundle:Reclamation")->find($idReclamation);
    $em->remove($reclamation);
    $em->flush();
    return $this->redirectToRoute("reclamation_remerc");







}



    public function AjoutRespAction( Request $request)

    {
        $Reclamation = new Reclamation() ;
        $form = $this-> createForm(ReclamationType::class, $Reclamation) ;
        $form -> handleRequest($request) ;
        if ( $form-> isSubmitted())
        {
            $em =$this-> getDoctrine()-> getManager();
            $em -> persist($Reclamation) ;
            $em-> flush();
            return $this->redirectToRoute("reclamation_lister_Resp") ;
        }
        return $this-> render("@ReclamationUser/Responsable/ajoutResp.html.twig" , array(
            'form'=>$form->createView()
        ));
    }






    public function RemercAction( )
    {   $myLimit =1;
        $myOffset=null ;

        $doctrine = $this-> getDoctrine() ;
        $repository =$doctrine -> getRepository('ReclamationUserBundle:Reclamation');
        $reclamation = $repository -> findBy( array(), array('id' => "Desc") , $myLimit,
            $myOffset);

        return $this-> render("@ReclamationUser/Reclamation/Remerciment.html.twig"  , array ('reclamations' => $reclamation))  ;
    }





    public function SearchAction(Request  $request) {

        $em =$this -> getDoctrine() -> getManager() ;
        $reclamation = $em ->getRepository(Reclamation::class) -> findAll() ;
        if($request ->  isMethod("POST")) {
            $nom = $request->get('nom');
            $reclamation = $em-> getRepository('ReclamationUserBundle:Reclamation') -> findBy(array ('nomClient' => $nom));

        }
        return $this->render("@ReclamationUser/Reclamation/Search.html.twig", array('reclamation' => $reclamation));



    }



    public function SearchTypeAction(Request  $request) {

        $em =$this -> getDoctrine() -> getManager() ;
        $reclamation = $em ->getRepository(Reclamation::class) -> findAll() ;
        if($request ->  isMethod("POST")) {
            $type = $request->get('type');
            $reclamation = $em-> getRepository('ReclamationUserBundle:Reclamation') -> findBy(array ('type' => $type));

        }
        return $this->render("@ReclamationUser/Reclamation/SearchType.html.twig", array('reclamation' => $reclamation));



    }








}










