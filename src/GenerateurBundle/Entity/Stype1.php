<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stype1
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stype1 extends Slide
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
    private $photo;

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
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
