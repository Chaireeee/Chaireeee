<?php

namespace Chaire\AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accompagnement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Accompagnement
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
     * @ORM\Column(name="name_lg", type="string", length=255)
     */
    private $nameLg;

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=255)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="baseline_lg", type="string", length=1000)
     */
    private $baselineLg;

    /**
     * @var string
     *
     * @ORM\Column(name="baseline_en", type="string", length=1000)
     */
    private $baselineEn;

    /**
     * @ORM\OneToOne(targetEntity="Chaire\FormationBundle\Entity\photo", cascade={"persist","remove"})
     */
    private $Logo;

    /**
     * @ORM\OneToOne(targetEntity="Chaire\FormationBundle\Entity\photo", cascade={"persist","remove"})
     */
    private $Imageentete;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Page", cascade={"persist","remove"})
     */
    private $page;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Page", cascade={"persist","remove"})
     */
    private $pageEn;

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
     * @param mixed $Imageentete
     */
    public function setImageentete($Imageentete)
    {
        $this->Imageentete = $Imageentete;
    }

    /**
     * @return mixed
     */
    public function getImageentete()
    {
        return $this->Imageentete;
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
     * Set nameLg
     *
     * @param string $nameLg
     * @return Accompagnement
     */
    public function setNameLg($nameLg)
    {
        $this->nameLg = $nameLg;

        return $this;
    }

    /**
     * Get nameLg
     *
     * @return string 
     */
    public function getNameLg()
    {
        return $this->nameLg;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     * @return Accompagnement
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
     * Set baselineLg
     *
     * @param string $baselineLg
     * @return Accompagnement
     */
    public function setBaselineLg($baselineLg)
    {
        $this->baselineLg = $baselineLg;

        return $this;
    }

    /**
     * Get baselineLg
     *
     * @return string 
     */
    public function getBaselineLg()
    {
        return $this->baselineLg;
    }

    /**
     * Set baselineEn
     *
     * @param string $baselineEn
     * @return Accompagnement
     */
    public function setBaselineEn($baselineEn)
    {
        $this->baselineEn = $baselineEn;

        return $this;
    }

    /**
     * Get baselineEn
     *
     * @return string 
     */
    public function getBaselineEn()
    {
        return $this->baselineEn;
    }
}
