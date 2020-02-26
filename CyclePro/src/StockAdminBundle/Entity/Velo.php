<?php

namespace StockAdminBundle\Entity;
use Mgilet\NotificationBundle\Annotation\Notifiable;

use Doctrine\ORM\Mapping as ORM;

/**
 * Velo
 *
 * @ORM\Table(name="velo")
 * @ORM\Entity(repositoryClass="StockAdminBundle\Repository\VeloRepository")
 */
class Velo
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
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumn(name="Fournisseur",referencedColumnName="id")
     **/

    private $Fournisseur;
    /**
     * Set fournisseur
     *
     * @param \StockAdminBundle\Entity\Fournisseur $fournisseur
     *
     * @return Velo
     */
    public function setFournisseur(\StockAdminBundle\Entity\Fournisseur $fournisseur = null)
    {
        $this->Fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \StockAdminBundle\Entity\Fournisseur
     */
    public function getFournisseur()
    {
        return $this->Fournisseur;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="photoV", type="string", length=255)
     */
    private $photoV;
    /**
     * @var string
     *
     * @ORM\Column(name="photoV1", type="string", length=255)
     */
    private $photoV1;
    /**
     * @var string
     *
     * @ORM\Column(name="photoV2", type="string", length=255)
     */
    private $photoV2;
    /**
     * @var string
     *
     * @ORM\Column(name="photoV3", type="string", length=255)
     */
    private $photoV3;

    /**
     * @return string
     */
    public function getPhotoV3()
    {
        return $this->photoV3;
    }

    /**
     * @param string $photoV3
     */
    public function setPhotoV3($photoV3)
    {
        $this->photoV3 = $photoV3;
    }

    /**
     * @return string
     */
    public function getPhotoV1()
    {
        return $this->photoV1;
    }

    /**
     * @param string $photoV1
     */
    public function setPhotoV1($photoV1)
    {
        $this->photoV1 = $photoV1;
    }

    /**
     * @return string
     */
    public function getPhotoV2()
    {
        return $this->photoV2;
    }

    /**
     * @param string $photoV2
     */
    public function setPhotoV2($photoV2)
    {
        $this->photoV2 = $photoV2;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="Caracteristiques", type="string", length=255)
     */
    private $Caracteristiques;

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
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;
    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */

    private $couleur;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrDePlace", type="integer")
     */
    private $nbrDePlace;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=255)
     */
    private $taille;
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
     * @var int
     *
     * @ORM\Column(name="qtEnStock", type="integer")
     */
    private $qtEnStock;

    /**
     * @var int
     *
     * @ORM\Column(name="qtStockSecurite", type="integer")
     */
    private $qtStockSecurite;

    /**
     * @var float
     *
     * @ORM\Column(name="prixAchat", type="float")
     */
    private $prixAchat;

    /**
     * @var float
     *
     * @ORM\Column(name="prixLocH", type="float")
     */
    private $prixLocH;


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
     * Set photoV
     *
     * @param string $photoV
     *
     * @return Velo
     */
    public function setPhotoV($photoV)
    {
        $this->photoV = $photoV;
    
        return $this;
    }

    /**
     * Get photoV
     *
     * @return string
     */
    public function getPhotoV()
    {
        return $this->photoV;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Velo
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
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Velo
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    
        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set nbrDePlace
     *
     * @param integer $nbrDePlace
     *
     * @return Velo
     */
    public function setNbrDePlace($nbrDePlace)
    {
        $this->nbrDePlace = $nbrDePlace;
    
        return $this;
    }

    /**
     * Get nbrDePlace
     *
     * @return integer
     */
    public function getNbrDePlace()
    {
        return $this->nbrDePlace;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Velo
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set qtEnStock
     *
     * @param integer $qtEnStock
     *
     * @return Velo
     */
    public function setQtEnStock($qtEnStock)
    {
        $this->qtEnStock = $qtEnStock;
    
        return $this;
    }

    /**
     * Get qtEnStock
     *
     * @return integer
     */
    public function getQtEnStock()
    {
        return $this->qtEnStock;
    }

    /**
     * Set qtStockSecurite
     *
     * @param integer $qtStockSecurite
     *
     * @return Velo
     */
    public function setQtStockSecurite($qtStockSecurite)
    {
        $this->qtStockSecurite = $qtStockSecurite;
    
        return $this;
    }

    /**
     * Get qtStockSecurite
     *
     * @return integer
     */
    public function getQtStockSecurite()
    {
        return $this->qtStockSecurite;
    }

    /**
     * Set prixAchat
     *
     * @param float $prixAchat
     *
     * @return Velo
     */
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;
    
        return $this;
    }

    /**
     * Get prixAchat
     *
     * @return float
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set prixLocH
     *
     * @param float $prixLocH
     *
     * @return Velo
     */
    public function setPrixLocH($prixLocH)
    {
        $this->prixLocH = $prixLocH;
    
        return $this;
    }

    /**
     * Get prixLocH
     *
     * @return float
     */
    public function getPrixLocH()
    {
        return $this->prixLocH;
    }
}
