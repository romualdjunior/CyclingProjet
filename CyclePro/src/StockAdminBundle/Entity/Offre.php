<?php

namespace StockAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="StockAdminBundle\Repository\OffreRepository")
 */
class Offre
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
     * @ORM\ManyToOne(targetEntity="Velo")
     * @ORM\JoinColumn(name="Velo",referencedColumnName="id")
     **/

    private $Velo;
    /**
     * Set velo
     *
     * @param \StockAdminBundle\Entity\Velo $velo
     *
     * @return Velo
     */
    public function setVelo(\StockAdminBundle\Entity\Velo $velo = null)
    {
        $this->Velo = $velo;

        return $this;
    }

    /**
     * Get velo
     *
     * @return \StockAdminBundle\Entity\Velo
     */
    public function getVelo()
    {
        return $this->Velo;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;

    /**
     * @var int
     *
     * @ORM\Column(name="pourcentage", type="integer")
     */
    private $pourcentage;

    /**
     * @return float
     */
    public function getNvPrix()
    {
        return $this->nvPrix;
    }

    /**
     * @param float $nvPrix
     */
    public function setNvPrix($nvPrix)
    {
        $this->nvPrix = $nvPrix;
    }
    /**
     * @var float
     *
     * @ORM\Column(name="nvPrix", type="float")
     */
    private $nvPrix;

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Offre
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set pourcentage
     *
     * @param integer $pourcentage
     *
     * @return Offre
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;
    
        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return integer
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }
}
