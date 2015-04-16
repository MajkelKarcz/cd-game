<?php

namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * testitem
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class testitem
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
     * @ORM\ManyToMany(targetEntity="testheroes", inversedBy="items", cascade={"persist"})
     * @ORM\JoinTable(name="testitem_testheroes",
     * joinColumns={@ORM\JoinColumn(name="testitem_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="testheroes_id", referencedColumnName="id")}
     * )
     */
    private $categories;

    
    public function addCategories(testheroes $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="strbonus", type="string", length=255)
     */
    private $strbonus;


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
     * @return testitem
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
     * Set strbonus
     *
     * @param string $strbonus
     * @return testitem
     */
    public function setStrbonus($strbonus)
    {
        $this->strbonus = $strbonus;

        return $this;
    }

    /**
     * Get strbonus
     *
     * @return string 
     */
    public function getStrbonus()
    {
        return $this->strbonus;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    
  

    /**
     * Add categories
     *
     * @param \My\GraBundle\Entity\testheroes $categories
     * @return testitem
     */
    public function addCategory(\My\GraBundle\Entity\testheroes $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \My\GraBundle\Entity\testheroes $categories
     */
    public function removeCategory(\My\GraBundle\Entity\testheroes $categories)
    {
        $this->categories->removeElement($categories);
    }
}
