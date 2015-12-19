<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stype1
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stype3 extends Slide
{



    /**
     * @var string
     *
     * @ORM\Column(name="text1", type="string", length=3000)
     */
    private $texte1;

    /**
     * @var string
     *
     * @ORM\Column(name="text2", type="string", length=3000)
     */
    private $texte2;

    /**
     * @param string $texte1
     */
    public function setTexte1($texte1)
    {
        $this->texte1 = $texte1;
    }

    /**
     * @return string
     */
    public function getTexte1()
    {
        return $this->texte1;
    }

    /**
     * @param string $texte2
     */
    public function setTexte2($texte2)
    {
        $this->texte2 = $texte2;
    }

    /**
     * @return string
     */
    public function getTexte2()
    {
        return $this->texte2;
    }




}