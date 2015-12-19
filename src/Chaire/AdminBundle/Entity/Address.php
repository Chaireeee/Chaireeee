<?php

namespace Chaire\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\AdminBundle\Entity\AddressRepository")
 */
class Address
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
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     * @Assert\Type(type="int")
     * @Assert\NotNull
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="road", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $road;

    /**
     * @var integer
     * @Assert\Type(type="int")
     * @Assert\Length(min=5)
     * @Assert\Length(max=5)
     * @Assert\NotNull
     *
     * @ORM\Column(name="postalCode", type="integer")
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $city;


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
     * Set numero
     *
     * @param integer $numero
     * @return Address
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set road
     *
     * @param string $road
     * @return Address
     */
    public function setRoad($road)
    {
        $this->road = $road;

        return $this;
    }

    /**
     * Get road
     *
     * @return string 
     */
    public function getRoad()
    {
        return $this->road;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
}
