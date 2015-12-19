<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stype1
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stype2 extends Slide
{



    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=3000)
     */
    private $texte;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Picture", cascade={"persist","remove"})
     */
    private $photo1;

    /**
     * @ORM\OneToOne(targetEntity="GenerateurBundle\Entity\Picture", cascade={"persist","remove"})
     */
    private $photo2;

    /**
     * @param mixed $photo1
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    /**
     * @return mixed
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * @param mixed $photo2
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @return mixed
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }




    /**
     * Set texte
     *
     * @param string $texte
     * @return Stype1
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    public function gethtml(){
        return false;
    }

    public function geteditpath(){
        return false;
    }
}