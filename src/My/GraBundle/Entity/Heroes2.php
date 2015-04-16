<?php

namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Heroes2
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Heroes2
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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hp", type="integer")
     */
    private $hp;

    /**
     * @var integer
     *
     * @ORM\Column(name="exp", type="integer")
     */
    private $exp;

    /**
     * @var integer
     *
     * @ORM\Column(name="str", type="integer")
     */
    private $str;

    /**
     * @var integer
     *
     * @ORM\Column(name="stamina", type="integer")
     */
    private $stamina;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="integer")
     */
    private $gold;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;
    /**
     * @var string
     *
     * @ORM\Column(name="item1", type="string", length=255, nullable = true)
     */
    private $item1;

    /**
     * @var string
     *
     * @ORM\Column(name="item2", type="string", length=255, nullable = true)
     */
    private $item2;

    /**
     * @var string
     *
     * @ORM\Column(name="item3", type="string", length=255, nullable = true)
     */
    private $item3;

    /**
     * @var string
     *
     * @ORM\Column(name="itemtemp", type="string", length=255, nullable = true)
     */
    private $itemtemp;

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
     * @return Heroes2
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
     * Set hp
     *
     * @param integer $hp
     * @return Heroes2
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get hp
     *
     * @return integer 
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set exp
     *
     * @param integer $exp
     * @return Heroes2
     */
    public function setExp($exp)
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * Get exp
     *
     * @return integer 
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * Set str
     *
     * @param integer $str
     * @return Heroes2
     */
    public function setStr($str)
    {
        $this->str = $str;

        return $this;
    }

    /**
     * Get str
     *
     * @return integer 
     */
    public function getStr()
    {
        return $this->str;
    }

    /**
     * Set stamina
     *
     * @param integer $stamina
     * @return Heroes2
     */
    public function setStamina($stamina)
    {
        $this->stamina = $stamina;

        return $this;
    }

    /**
     * Get stamina
     *
     * @return integer 
     */
    public function getStamina()
    {
        return $this->stamina;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Heroes2
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

    /**
     * Set item1
     *
     * @param string $item1
     * @return Heroes2
     */
    public function setItem1($item1)
    {
        $this->item1 = $item1;

        return $this;
    }

    /**
     * Get item1
     *
     * @return string 
     */
    public function getItem1()
    {
        return $this->item1;
    }

    /**
     * Set item2
     *
     * @param string $item2
     * @return Heroes2
     */
    public function setItem2($item2)
    {
        $this->item2 = $item2;

        return $this;
    }

    /**
     * Get item2
     *
     * @return string 
     */
    public function getItem2()
    {
        return $this->item2;
    }

    /**
     * Set item3
     *
     * @param string $item3
     * @return Heroes2
     */
    public function setItem3($item3)
    {
        $this->item3 = $item3;

        return $this;
    }

    /**
     * Get item3
     *
     * @return string 
     */
    public function getItem3()
    {
        return $this->item3;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Heroes2
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    

    /**
     * Set itemtemp
     *
     * @param string $itemtemp
     * @return Heroes2
     */
    public function setItemtemp($itemtemp)
    {
        $this->itemtemp = $itemtemp;

        return $this;
    }

    /**
     * Get itemtemp
     *
     * @return string 
     */
    public function getItemtemp()
    {
        return $this->itemtemp;
    }

    /**
     * Set gold
     *
     * @param integer $gold
     * @return Heroes2
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get gold
     *
     * @return integer 
     */
    public function getGold()
    {
        return $this->gold;
    }
}
