<?php

namespace ArticleAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="ArticleAdminBundle\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="likes", type="integer")
     */
    private $likes;

    /**
     * @var string
     *
     * @ORM\Column(name="contenue", type="text")
     */
    private $contenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_comt", type="date")
     */
    private $dateComt;

    /**
     * @ORM\ManyToOne(targetEntity="ArticleAdminBundle\Entity\Article")
     * @ORM\JoinColumn(name="article",referencedColumnName="id")
     */
    private  $article;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenue
     *
     * @param string $contenue
     *
     * @return Commentaire
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;
    
        return $this;
    }

    /**
     * Get contenue
     *
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     *
     * @return Commentaire
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    
        return $this;
    }

    /**
     * Get likes
     *
     * @return integer
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set dateComt
     *
     * @param \DateTime $dateComt
     *
     * @return Commentaire
     */
    public function setDateComt($dateComt)
    {
        $this->dateComt = $dateComt;
    
        return $this;
    }

    /**
     * Get dateComt
     *
     * @return \DateTime
     */
    public function getDateComt()
    {
        return $this->dateComt;
    }

    /**
     * Set article
     *
     * @param \ArticleAdminBundle\Entity\Article $article
     *
     * @return Commentaire
     */
    public function setArticle(\ArticleAdminBundle\Entity\Article $article = null)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return \ArticleAdminBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
