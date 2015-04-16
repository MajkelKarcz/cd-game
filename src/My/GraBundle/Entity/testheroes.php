<?php

namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * testheroes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class testheroes
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
     * @ORM\ManyToMany(targetEntity="testitem", mappedBy="categories", cascade={"persist"})
     */
    private $items;

    
    public function addItems(testitem $items)
    {
        //$items_h = $items->getCategories();
        
        $items->addCategories($this);
        $this->items[0] = $items;
    }

    
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="item2", type="string", length=255)
     */
    private $item2;


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
     * @return testheroes
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
     * Set item2
     *
     * @param string $item2
     * @return testheroes
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
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Remove items
     *
     * @param \My\GraBundle\Entity\testitem $items
     */
    public function removeItem(\My\GraBundle\Entity\testitem $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Add items
     *
     * @param \My\GraBundle\Entity\testitem $items
     * @return testheroes
     */
    public function addItem(\My\GraBundle\Entity\testitem $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items2
     *
     * @param \My\GraBundle\Entity\testitem $items2
     */
    public function removeItems2(\My\GraBundle\Entity\testitem $items2)
    {
        $this->items2->removeElement($items2);
    }
}
