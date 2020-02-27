<?php

namespace CommandeBundle\Repository;

/**
 * CommandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllCommandePanier()
    {
        $query=$this->getEntityManager()->createQuery("select a from CommandeBundle:LignePanier a");

        return $query->getResult();
    }

    public function findAllPaiement()
    {
        $query=$this->getEntityManager()->createQuery("select a from CommandeBundle:Payment a");

        return $query->getResult();
    }

    public  function
    findCommandePanier($mot){
        $query=$this->getEntityManager()->createQuery("select l.id,c.id as idCommande,c.etat as etat,p.nom,p.image,a.adresseLivraison,l.quantite,u.username from CommandeBundle\Entity\LignePanier l left join CommandeBundle\Entity\Commande c with l.commande=c.id left join
         CommandeBundle\Entity\Produit p with l.produit=p.id left join CommandeBundle\Entity\Adresse a with c.adresse=a.id left join AppBundle\Entity\User u with c.user=u.id
         where l.id like :key or c.id like :key or c.etat like :key or p.nom like :key or p.image like :key or a.adresseLivraison like :key or u.username like :key")->setParameter("key","%".$mot."%");
        return $query->getResult();
    }


}