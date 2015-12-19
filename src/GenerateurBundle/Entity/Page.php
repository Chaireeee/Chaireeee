<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Baseline", type="string", length=500)
     */
    private $baseline;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Picture", cascade={"persist","remove"})
     */
    private $logo;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Picture", cascade={"persist","remove"})
     */
    private $homie;

    /**
     * @param mixed $homie
     */
    public function setHomie($homie)
    {
        $this->homie = $homie;
    }

    /**
     * @return mixed
     */
    public function getHomie()
    {
        return $this->homie;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
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
     * @return Page
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
     * Set baseline
     *
     * @param string $baseline
     * @return Page
     */
    public function setBaseline($baseline)
    {
        $this->baseline = $baseline;

        return $this;
    }

    /**
     * Get baseline
     *
     * @return string 
     */
    public function getBaseline()
    {
        return $this->baseline;
    }
}
