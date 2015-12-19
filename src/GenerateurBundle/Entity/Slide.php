<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slide
 *
 * @ORM\Table()
 * @ORM\Entity
 *
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"Slide" = "Slide", "Stype1" = "Stype1","Stype2" = "Stype2","Stype3" = "Stype3","Stype4" = "Stype4","Stype5" = "Stype5","Stype6" = "Stype6","Stype7" = "Stype7","Stype8" = "Stype8"})
 */

class Slide
{



    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    public function gethtml(){
        return true;
    }

    public function geteditpath(){
        return null;
    }

    /**
     * @ORM\ManyToOne(targetEntity="GenerateurBundle\Entity\Page")
     * @ORM\JoinColumn(nullable=false)
     */
    private $page;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer",nullable=true)
     */
    protected $ordre;

    /**
     * @param int $ordre
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    /**
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }





    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Picture", cascade={"persist","remove"})
     */
    private $fond;

    /**
     * @param mixed $fond
     */
    public function setFond($fond)
    {
        $this->fond = $fond;
    }

    /**
     * @return mixed
     */
    public function getFond()
    {
        return $this->fond;
    }



    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
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
     * @return Slide
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
}
