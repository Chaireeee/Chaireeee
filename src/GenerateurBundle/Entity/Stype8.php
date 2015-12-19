<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stype1
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stype8 extends Slide
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
     * @ORM\Column(name="url", type="string", length=3000)
     */
    private $url;

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }





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




}