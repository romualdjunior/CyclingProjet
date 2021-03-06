<?php

namespace ArticleAdminBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findbyid($id)
    {   $query=$this->getEntityManager()
        ->createQuery("select c from ArticleAdminBundle:Article c where  c.id='$id'");//affiche la liste des objets
        return $query->getResult();
    }

    public function articleCategory($cat)
    {   $query=$this->getEntityManager()
        ->createQuery("select c from ArticleAdminBundle:Article c where  c.category='$cat'");//affiche la liste des objets
        return $query->getResult();
    }

    public function searchword($word){
        $query=$this->getEntityManager()
            ->createQuery("select c from ArticleAdminBundle:Article c where  c.titre like '%$word%' 
            or c.category like '%$word% ' or c.auteur like '%$word%' or c.contenue like '%$word%'");
        return $query->getResult();
    }

  /*  public function searchnbrl($nbrl){
        $query=$this->getEntityManager()
            ->createQuery("select c from ArticleAdminBundle:Article c LIMIT '$nbrl' ");
        return $query->getResult();
    }*/

    public function search($contenue){
        $query=$this->getEntityManager()
            ->createQuery("select c from ArticleAdminBundle:Article c where  c.contenue like % '$contenue' %");//affiche la liste des objets
        return $query->getResult();
    }


    public function recentArticle(){
        $query=$this->getEntityManager()
            ->createQuery("select c from ArticleAdminBundle:Article c ORDER BY c.dateArt DESC ");
        $query->setMaxResults(2);
        return $query->getResult();
    }

    public function trie(){
        $query=$this->getEntityManager()
            ->createQuery("select c from ArticleAdminBundle:Article c ORDER BY c.likes DESC ");
        return $query->getResult();
    }


}
