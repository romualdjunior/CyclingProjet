<?php

namespace StockAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreA
 *
 * @ORM\Table(name="offre_a")
 * @ORM\Entity(repositoryClass="StockAdminBundle\Repository\OffreARepository")
 */
class OffreA
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
     * @ORM\ManyToOne(targetEntity="Accessoires")
     * @ORM\JoinColumn(name="Accessoires",referencedColumnName="id")
     **/

    private $Accessoires;

    /**
     * Set accessoires
     *
     * @param \StockAdminBundle\Entity\Accessoires $accessoires
     *
     * @return accessoires
     */
    public function setAccessoires(\StockAdminBundle\Entity\Accessoires $accessoires = null)
    {
        $this->Accessoires = $accessoires;

        return $this;
    }

    /**
     * Get accessoires
     *
     * @return \StockAdminBundle\Entity\Accessoires
     */
    public function getAccessoires()
    {
        return $this->Accessoires;
    }
    /**
     * @var float
     *
     * @ORM\Column(name="nvPrix", type="float")
     */
    private $nvPrix;

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
     * @ORM\Column(name="poucentage", type="integer")
     */
    private $poucentage;


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
     * @return OffreA
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
     * @return OffreA
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
     * Set poucentage
     *
     * @param integer $poucentage
     *
     * @return OffreA
     */
    public function setPoucentage($poucentage)
    {
        $this->poucentage = $poucentage;
    
        return $this;
    }

    /**
     * Get poucentage
     *
     * @return integer
     */
    public function getPoucentage()
    {
        return $this->poucentage;
    }
}

