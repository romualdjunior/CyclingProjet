<?php

namespace StockAdminBundle\Repository;

/**
 * VeloRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VeloRepository extends \Doctrine\ORM\EntityRepository
{public function findASC(){
    $qb = $this->createQueryBuilder('p')
        ->orderBy('p.prixAchat', 'ASC');
    $query = $qb->getQuery();

    return $query->execute();
}

    public function findDESC(){
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.prixAchat', 'DESC');
        $query = $qb->getQuery();

        return $query->execute();
    }
    public function findVelo($tab){
    $dql="select a from StockAdminBundle:Velo a WHERE";
            $val=0;
        foreach ($tab as $key=>$critere) {
            if(!empty($critere) and $key=="categorie")
            {
                $dql.=" a.categorie like '%$critere%'";
                $val=1;
            }
            if(!empty($critere)and $key=="taille"){
                if($val==1)
                    $dql.="and";
                $dql.=" a.taille like '%$critere%'";
                $val=1;
            }
            if(!empty($critere) and $key=="couleur"){
                if($val==1)
                    $dql.="and";
                $dql.=" a.couleur like '%$critere%'";
            }

        }
        $query=$this->getEntityManager()->createQuery($dql);
        return $query->getArrayResult();
    }
}
