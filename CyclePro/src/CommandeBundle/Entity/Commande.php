<?php

namespace CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="CommandeBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string")
     */
    private $date;
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private  $user;

    /**
     * @ORM\ManyToOne(targetEntity="CommandeBundle\Entity\Adresse")
     * @ORM\JoinColumn(name="adresse_id",referencedColumnName="id")
     */
    private  $adresse;

    /**
     * Commande constructor.
     * @param int $total
     * @param string $etat
     * @param string $date
     * @param $user
     * @param $adresse
     */
    public function __construct($total, $etat, $date, $user, $adresse)
    {
        $this->total = $total;
        $this->etat = $etat;
        $this->date = $date;
        $this->user = $user;
        $this->adresse = $adresse;
    }

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
     * Set total
     *
     * @param integer $total
     *
     * @return Commande
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     *@return string
     */
    public function getDate()
    {
        return $this->date;
    }



    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Commande
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set adresse
     *
     * @param \CommandeBundle\Entity\Adresse $adresse
     *
     * @return Commande
     */
    public function setAdresse(\CommandeBundle\Entity\Adresse $adresse = null)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return \CommandeBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}
