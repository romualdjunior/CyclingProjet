<?php
namespace CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\Payment as BasePayment;

/**
 * @ORM\Table
 * @ORM\Entity
 */
class Payment extends BasePayment
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var integer $id
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="cardHolderName", type="string", length=255)
     */
    private $cardHolderName;

    /**
     * @var int
     *
     * @ORM\Column(name="cardNumber", type="integer")
     */
    private $cardNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="securityCode", type="integer")
     */
    private $securityCode;

    /**
     * @var int
     *
     * @ORM\Column(name="moisExpiration", type="integer")
     */
    private $moiExpiration;

    /**
     * @var int
     *
     * @ORM\Column(name="anneeExpiration", type="integer")
     */
    private $anneeExpiration;

    /**
     * @ORM\ManyToOne(targetEntity="CommandeBundle\Entity\Commande")
     * @ORM\JoinColumn(name="commande_id",referencedColumnName="id")
     */
    private  $commande;


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
     * Set cardHolderName
     *
     * @param string $cardHolderName
     *
     * @return Payment
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    
        return $this;
    }

    /**
     * Get cardHolderName
     *
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * Set cardNumber
     *
     * @param integer $cardNumber
     *
     * @return Payment
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    
        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return integer
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set securityCode
     *
     * @param integer $securityCode
     *
     * @return Payment
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
    
        return $this;
    }

    /**
     * Get securityCode
     *
     * @return integer
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * Set moiExpiration
     *
     * @param integer $moiExpiration
     *
     * @return Payment
     */
    public function setMoiExpiration($moiExpiration)
    {
        $this->moiExpiration = $moiExpiration;
    
        return $this;
    }

    /**
     * Get moiExpiration
     *
     * @return integer
     */
    public function getMoiExpiration()
    {
        return $this->moiExpiration;
    }

    /**
     * Set anneeExpiration
     *
     * @param integer $anneeExpiration
     *
     * @return Payment
     */
    public function setAnneeExpiration($anneeExpiration)
    {
        $this->anneeExpiration = $anneeExpiration;
    
        return $this;
    }

    /**
     * Get anneeExpiration
     *
     * @return integer
     */
    public function getAnneeExpiration()
    {
        return $this->anneeExpiration;
    }



    /**
     * Set commande
     *
     * @param \CommandeBundle\Entity\Commande $commande
     *
     * @return Payment
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
}
