<?php

namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items2
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Items2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="strBonus", type="integer")
     */
    private $strBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="hpBonus", type="integer")
     */
    private $hpBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="staminaBonus", type="integer")
     */
    private $staminaBonus;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

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
     * Set name
     *
     * @param string $name
     * @return Items2
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set strBonus
     *
     * @param integer $strBonus
     * @return Items2
     */
    public function setStrBonus($strBonus)
    {
        $this->strBonus = $strBonus;

        return $this;
    }

    /**
     * Get strBonus
     *
     * @return integer 
     */
    public function getStrBonus()
    {
        return $this->strBonus;
    }

    /**
     * Set hpBonus
     *
     * @param integer $hpBonus
     * @return Items2
     */
    public function setHpBonus($hpBonus)
    {
        $this->hpBonus = $hpBonus;

        return $this;
    }

    /**
     * Get hpBonus
     *
     * @return integer 
     */
    public function getHpBonus()
    {
        return $this->hpBonus;
    }

    /**
     * Set staminaBonus
     *
     * @param integer $staminaBonus
     * @return Items2
     */
    public function setStaminaBonus($staminaBonus)
    {
        $this->staminaBonus = $staminaBonus;

        return $this;
    }

    /**
     * Get staminaBonus
     *
     * @return integer 
     */
    public function getStaminaBonus()
    {
        return $this->staminaBonus;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Items2
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }
    public function __toString() {
        return ($this->getName());//.' Weight '. $this->getWeight());
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Items2
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
