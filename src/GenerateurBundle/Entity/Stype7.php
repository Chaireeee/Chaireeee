<?php

namespace GenerateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Stype7
*
* @ORM\Table()
* @ORM\Entity
*/
class Stype7 extends Slide
{




/**
* @var string
*
* @ORM\Column(name="url", type="string", length=3000)
*/
private $event;

    /**
     * @param string $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }













}