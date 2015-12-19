<?php

namespace Chaire\ReserachBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Research
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\ReserachBundle\Entity\ResearchRepository")
 */
class Research
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
     * @var string
     *
     * @ORM\Column(name="nameEn", type="string", length=255)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="concept", type="string", length=255)
     */
    private $concept;

    /**
     * @var string
     *
     * @ORM\Column(name="conceptEn", type="string", length=255)
     */
    private $conceptEn;


    /**
     * @ORM\OneToOne(targetEntity="Chaire\FormationBundle\Entity\photo", cascade={"persist","remove"})
     */
    private $Logo;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Page", cascade={"persist","remove"})
     */
    private $page;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Page", cascade={"persist","remove"})
     */
    private $pageEn;

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
     * @param mixed $pageEn
     */
    public function setPageEn($pageEn)
    {
        $this->pageEn = $pageEn;
    }

    /**
     * @return mixed
     */
    public function getPageEn()
    {
        return $this->pageEn;
    }

    /**
     * @param mixed $Logo
     */
    public function setLogo($Logo)
    {
        $this->Logo = $Logo;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->Logo;
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
     * @return Research
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
     * Set nameEn
     *
     * @param string $nameEn
     * @return Research
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string 
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set concept
     *
     * @param string $concept
     * @return Research
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Get concept
     *
     * @return string 
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * Set conceptEn
     *
     * @param string $conceptEn
     * @return Research
     */
    public function setConceptEn($conceptEn)
    {
        $this->conceptEn = $conceptEn;

        return $this;
    }

    /**
     * Get conceptEn
     *
     * @return string 
     */
    public function getConceptEn()
    {
        return $this->conceptEn;
    }
}
