<?php

namespace ReclamationUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints  as Assert ;

/**
 * Traitement
 *
 * @ORM\Table(name="traitement")
 * @ORM\Entity(repositoryClass="ReclamationUserBundle\Repository\TraitementRepository")
 */
class Traitement
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
     * @ORM\Column(name="idReclamation", type="integer")
     */
    private $idReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCli", type="string", length=255)
     *
     * @Assert\NotBlank(message =" Le nom est obligatoir ")
     */
    private $nomCli;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomcli", type="string", length=255)
     */
    private $prenomcli;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255)
     */
    private $raison;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255)
     */
    private $details;

    /**
     * @var int
     *
     * @ORM\Column(name="refVelo", type="integer")
     */
    private $refVelo;

    /**
     * @var string
     *
     * @ORM\Column(name="idCli", type="string", length=255)
     */
    private $idCli;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(checkMX=true)

     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="Responsable")
     * ORM\JoinColumn(name= "id" , referencedColumnName ="id")
     */
    private $Responsable;

    /**
     * @var int
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;

    /**
     * @return mixed
     */
    public function getResponsable()
    {
        return $this->Responsable;
    }

    /**
     * @param mixed $Responsable
     */
    public function setResponsable($Responsable)
    {
        $this->Responsable = $Responsable;
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
     * Set idReclamation
     *
     * @param integer $idReclamation
     *
     * @return Traitement
     */
    public function setIdReclamation($idReclamation)
    {
        $this->idReclamation = $idReclamation;
    
        return $this;
    }

    /**
     * Get idReclamation
     *
     * @return integer
     */
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * Set nomCli
     *
     * @param string $nomCli
     *
     * @return Traitement
     */
    public function setNomCli($nomCli)
    {
        $this->nomCli = $nomCli;
    
        return $this;
    }

    /**
     * Get nomCli
     *
     * @return string
     */
    public function getNomCli()
    {
        return $this->nomCli;
    }

    /**
     * Set prenomcli
     *
     * @param string $prenomcli
     *
     * @return Traitement
     */
    public function setPrenomcli($prenomcli)
    {
        $this->prenomcli = $prenomcli;
    
        return $this;
    }

    /**
     * Get prenomcli
     *
     * @return string
     */
    public function getPrenomcli()
    {
        return $this->prenomcli;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Traitement
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Traitement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Traitement
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return Traitement
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
    
        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Traitement
     */
    public function setDetails($details)
    {
        $this->details = $details;
    
        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set refVelo
     *
     * @param integer $refVelo
     *
     * @return Traitement
     */
    public function setRefVelo($refVelo)
    {
        $this->refVelo = $refVelo;
    
        return $this;
    }

    /**
     * Get refVelo
     *
     * @return integer
     */
    public function getRefVelo()
    {
        return $this->refVelo;
    }

    /**
     * Set idCli
     *
     * @param string $idCli
     *
     * @return Traitement
     */
    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;
    
        return $this;
    }

    /**
     * Get idCli
     *
     * @return string
     */
    public function getIdCli()
    {
        return $this->idCli;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Traitement
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Traitement
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Traitement
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
     * Set idResponsable
     *
     * @param integer $idResponsable
     *
     * @return Traitement
     */
    public function setIdResponsable($idResponsable)
    {
        $this->idResponsable = $idResponsable;
    
        return $this;
    }

    /**
     * Get idResponsable
     *
     * @return integer
     */
    public function getIdResponsable()
    {
        return $this->idResponsable;
    }

    /**
     * Set cout
     *
     * @param integer $cout
     *
     * @return Traitement
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    
        return $this;
    }

    /**
     * Get cout
     *
     * @return integer
     */
    public function getCout()
    {
        return $this->cout;
    }
}

