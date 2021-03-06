<?php

namespace ReclamationUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\NotifiableInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints  as Assert ;



/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="ReclamationUserBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @ORM\Column(name="idClient", type="integer")
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClient", type="string", length=255)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClient", type="string", length=255)
     */
    private $prenomClient;

    /**
     * @var int
     *
     * @ORM\Column(name="refVelo", type="integer")
     */
    private $refVelo;

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
     * @var Date
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
    private $Details;

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
     * Reclamation constructor.
     * @param int $idClient
     * @param string $nomClient
     * @param string $prenomClient
     * @param int $refVelo
     * @param string $tel
     * @param string $adresse
     * @param Date $date
     * @param string $raison
     * @param string $Details
     * @param string $email
     * @param string $type
     */



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
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Reclamation
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    
        return $this;
    }

    /**
     * Get idClient
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Reclamation
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;
    
        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient
     *
     * @param string $prenomClient
     *
     * @return Reclamation
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;
    
        return $this;
    }

    /**
     * Get prenomClient
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * Set refVelo
     *
     * @param integer $refVelo
     *
     * @return Reclamation
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Reclamation
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
     * Set addresse
     *
     * @param string $addresse
     *
     * @return Reclamation
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get addresse
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
     * @param Date $date
     *
     * @return Reclamation
     */
    public function setDate()
    {
        $this->date = new \DateTime('now') ;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return Date
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
     * @return Reclamation
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
     * @return Reclamation
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
        return $this->Details;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reclamation
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
     * @return Reclamation
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

    public function Reclamation ($id, $nom , $prenom , $tel  ,$adresse , $date, $raison , $details , $refVelo , $idClient , $email , $type) {
     $this->id = $id ;
     $this->nomClient = $nom  ;
     $this->prenomClient = $prenom ;
     $this->tel = $tel ;
     $this->adresse = $adresse ;
     $this->date = $date ;
        $this->raison = $raison ;
        $this->Details =$details ;
        $this->refVelo=$refVelo ;
        $this-> idClient = $idClient ;
        $this->email = $email ;
        $this-> type = $type ;





    }




}
