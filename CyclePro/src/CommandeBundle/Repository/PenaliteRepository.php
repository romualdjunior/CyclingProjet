<?php

namespace CommandeBundle\Repository;

/**
 * PenaliteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PenaliteRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllPenalite()
    {
        $query=$this->getEntityManager()->createQuery("select a from CommandeBundle:Penalite a");

        return $query->getResult();
    }
    public function findPenaliteClient($id){
        $query=$this->getEntityManager()->createQuery("select u.id,p.duree,p.prix,l.dateDebut,l.dateFin from CommandeBundle\Entity\Location l left join AppBundle\Entity\User u with l.user=u.id left join
         CommandeBundle\Entity\Penalite p with l.id=p.location where  u.id like :key ")->setParameter("key","%".$id."%");
        return $query->getArrayResult();
    }

    public function findUser($user){
        $query=$this->getEntityManager()->createQuery("select u.id,p.duree,p.prix,l.dateDebut,l.dateFin from CommandeBundle\Entity\Location l left join AppBundle\Entity\User u with l.user=u.id left join
         CommandeBundle\Entity\Penalite p with l.id=p.location where  u.username like :key ")->setParameter("key","%".$user."%");
        return $query->getResult();
    }
}
