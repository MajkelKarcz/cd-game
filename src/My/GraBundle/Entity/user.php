<?php


namespace My\GraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * user
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class user
{
   

     /**
   * Many-To-Many, Unidirectional
   *
   * @var ArrayCollection $groups
   *
   * @ORM\ManyToMany(targetEntity="Group")
   * @ORM\JoinTable(name="user_has_group",
   *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
   * )
   */
  protected $groups;

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


    public function __construct() {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return user
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
     * Add groups
     *
     * @param \My\GraBundle\Entity\group $groups
     * @return user
     */
    public function addGroup(\My\GraBundle\Entity\group $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \My\GraBundle\Entity\group $groups
     */
    public function removeGroup(\My\GraBundle\Entity\group $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
