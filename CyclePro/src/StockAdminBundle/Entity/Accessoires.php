<?php

namespace StockAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accessoires
 *
 * @ORM\Table(name="accessoires")
 * @ORM\Entity(repositoryClass="StockAdminBundle\Repository\AccessoiresRepository")
 */
class Accessoires
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
     * @var string
     *
     * @ORM\Column(name="photoA", type="string", length=255)
     */
    private $photoA;
    /**
     * @return string
     */
    public function getPhotoA()
    {
        return $this->photoA;
    }

    /**
     * @param string $photoA
     */
    public function setPhotoA($photoA)
    {
        $this->photoA = $photoA;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="photoA1", type="string", length=255)
     */
    private $photoA1;
    /**
     * @var string
     *
     * @ORM\Column(name="photoA2", type="string", length=255)
     */
    private $photoA2;
    /**
     * @var string
     *
     * @ORM\Column(name="photoA3", type="string", length=255)
     */
    private $photoA3;

    /**
     * @return string
     */
    public function getPhotoA1()
    {
        return $this->photoA1;
    }

    /**
     * @param string $photoA1
     */
    public function setPhotoA1($photoA1)
    {
        $this->photoA1 = $photoA1;
    }

    /**
     * @return string
     */
    public function getPhotoA2()
    {
        return $this->photoA2;
    }

    /**
     * @param string $photoA2
     */
    public function setPhotoA2($photoA2)
    {
        $this->photoA2 = $photoA2;
    }

    /**
     * @return string
     */
    public function getPhotoA3()
    {
        return $this->photoA3;
    }

    /**
     * @param string $photoA3
     */
    public function setPhotoA3($photoA3)
    {
        $this->photoA3 = $photoA3;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="soldee", type="integer")
     */
    private $soldee;

    /**
     * @return int
     */
    public function getSoldee()
    {
        return $this->soldee;
    }

    /**
     * @param int $soldee
     */
    public function setSoldee($soldee)
    {
        $this->soldee = $soldee;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Accessoires
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Accessoires
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    
        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set type
     *
     * @param string $categorie
     *
     * @return Accessoires
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Accessoires
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Accessoires
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="Caracteristiques", type="string", length=255)
     */
    private $Caracteristiques;

    /**
     * @var int
     *
     * @ORM\Column(name="qtEnStock", type="integer")
     */
    private $qtEnStock;

    /**
     * @return string
     */
    public function getCaracteristiques()
    {
        return $this->Caracteristiques;
    }

    /**
     * @param string $Caracteristiques
     */
    public function setCaracteristiques($Caracteristiques)
    {
        $this->Caracteristiques = $Caracteristiques;
    }

    /**
     * @return int
     */
    public function getQtEnStock()
    {
        return $this->qtEnStock;
    }

    /**
     * @param int $qtEnStock
     */
    public function setQtEnStock($qtEnStock)
    {
        $this->qtEnStock = $qtEnStock;
    }
}
