<?php

namespace CommandeBundle\Controller;
use CommandeBundle\Entity\Produit;
use CommandeBundle\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Commande\shopSingle.html.twig');
    }

        public function ajoutPanierAction(SessionInterface $session,Request $request){
        $id=$request->get("id");
        $quantite=$request->get("quantite");
        $panier=$session->get('panier',[]);
        $panier[$id]=intval($quantite);
        $session->set('panier',$panier);
            return $this->redirectToRoute("afficherPanier");
    }

     public function afficherPanierAction(SessionInterface $session){
         $panier=$session->get('panier',[]);
         $em=$this->getDoctrine()->getManager();
         $panierWithData=[];
         foreach ($panier as $id=>$quantite) {
             if(!empty($id) ){
                 $panierWithData[]=[
                     "produit"=>$em->getRepository(Produit::class)->find($id),
                     "quantite"=>$quantite
                 ];
             }

         }
         $total=0;
         $nombre=0;
         foreach ( $panierWithData as $item) {
             if($item['produit']!=null){
                 if($item['produit']->getEtat()=="louer")
                 $totalItem=$item["produit"]->getPrixLocationHeure()*$item["quantite"];
                 else $totalItem=$item["produit"]->getPrix()*$item["quantite"];
                 $total+=$totalItem;
                 $nombre++;
             }

         }
         $session->set("panierWithData",$panierWithData);
         $session->set("total",$total);
         $session->set("nombre",$nombre);

         return $this->render("@Commande\cart.html.twig",array("items"=>$panierWithData,"total"=>$total));

     }
     public function supprimerPanierAction($id,SessionInterface $session){
        $panier=$session->get("panier",[]);
         if (!empty($panier[$id])) {
             unset($panier[$id]);
         }
         $session->set("panier",$panier);
         return $this->redirectToRoute("afficherPanier");
     }

     public function afficherProduitAction($quantite){
        return $this->render("@Commande\shopSingle.html.twig",array("quantite"=>$quantite));
     }


}
