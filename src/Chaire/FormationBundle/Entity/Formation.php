<?php

namespace Chaire\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\FormationBundle\Entity\FormationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Formation
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @var boolean
     *
     * @ORM\Column(name="student_escp", type="boolean",nullable=true)
     */
    private $student_escp;

    public function getStudentEscp()
    {
        return $this->student_escp;
    }

    public function setStudentEscp($student_escp)
    {
        $this->student_escp = $student_escp;
        return $this;
    }

    /**
     * @var boolean
     *
     * @ORM\Column(name="student_exte", type="boolean",nullable=true)
     */
    private $student_exte;

    public function getStudentExte()
    {
        return $this->student_exte;
    }

    public function setStudentExte($student_exte)
    {
        $this->student_exte = $student_exte;
        return $this;
    }

    /**
     * @var boolean
     *
     * @ORM\Column(name="executive", type="boolean",nullable=true)
     */
    private $executive;


    public function getExecutive()
    {
        return $this->executive;
    }

    public function setExecutive($exec)
    {
        $this->executive = $exec;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nameEn", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="concept", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $concept;

    /**
     * @var string
     *
     * @ORM\Column(name="conceptEn", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
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
     * @param string $concept
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;
    }

    /**
     * @return string
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * @param string $conceptEn
     */
    public function setConceptEn($conceptEn)
    {
        $this->conceptEn = $conceptEn;
    }

    /**
     * @return string
     */
    public function getConceptEn()
    {
        return $this->conceptEn;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $nameEn
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;
    }

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }




}
