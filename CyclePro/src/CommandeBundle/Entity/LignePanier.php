<?php

namespace CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LignePanier
 *
 * @ORM\Table(name="ligne_panier")
 * @ORM\Entity(repositoryClass="CommandeBundle\Repository\LignePanierRepository")
 */
class LignePanier
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
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity="CommandeBundle\Entity\Commande")
     * @ORM\JoinColumn(name="commande_id",referencedColumnName="id")
     */
    private  $commande;

    /**
     * @ORM\ManyToOne(targetEntity="CommandeBundle\Entity\Produit")
     * @ORM\JoinColumn(name="produit_id",referencedColumnName="id")
     */
    private  $produit;

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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return LignePanier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }


    /**
     * Set commande
     *
     * @param \CommandeBundle\Entity\Commande $commande
     *
     * @return LignePanier
     */
    public function setCommande(\CommandeBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;
    
        return $this;
    }

    /**
     * Get commande
     *
     * @return \CommandeBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }




    /**
     * Set produit
     *
     * @param \CommandeBundle\Entity\Produit $produit
     *
     * @return LignePanier
     */
    public function setProduit(\CommandeBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;
    
        return $this;
    }

    /**
     * Get produit
     *
     * @return \CommandeBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
