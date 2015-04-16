<?php

namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monsters
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Monsters
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
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @var integer
     *
     * @ORM\Column(name="exp", type="integer")
     */
    private $exp;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="reqStamina", type="integer")
     */
    private $reqStamina;

    /**
     * @var string
     *
     * @ORM\Column(name="item", type="string", length=255)
     */
    private $item;


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
     * @return Monsters
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
     * Set lvl
     *
     * @param integer $lvl
     * @return Monsters
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set reqStamina
     *
     * @param integer $reqStamina
     * @return Monsters
     */
    public function setReqStamina($reqStamina)
    {
        $this->reqStamina = $reqStamina;

        return $this;
    }

    /**
     * Get reqStamina
     *
     * @return integer 
     */
    public function getReqStamina()
    {
        return $this->reqStamina;
    }

    /**
     * Set item
     *
     * @param string $item
     * @return Monsters
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set exp
     *
     * @param integer $exp
     * @return Monsters
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
}
