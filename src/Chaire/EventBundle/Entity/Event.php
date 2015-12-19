<?php

namespace Chaire\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Chaire\AdminBundle\Entity\Address;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Chaire\FormationBundle\Entity\photo;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\EventBundle\Entity\EventRepository")
 */
class Event
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
     * @ORM\Column(name="eventName", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="eventNameEn", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\NotNull
     */
    private $eventNameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="eventDescription", type="string", length=400)
     * @Assert\Length(max=400)
     * @Assert\NotNull
     */
    private $eventDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="eventDescriptionEn", type="string", length=400)
     * @Assert\Length(max=400)
     * @Assert\NotNull
     */
    private $eventDescriptionEn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventDate", type="datetime")
     *
     * @Assert\NotNull
     */
    private $eventDate;

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
     * @param string $eventDescriptionEn
     */
    public function setEventDescriptionEn($eventDescriptionEn)
    {
        $this->eventDescriptionEn = $eventDescriptionEn;
    }

    /**
     * @return string
     */
    public function getEventDescriptionEn()
    {
        return $this->eventDescriptionEn;
    }




    /**
     * @param string $eventNameEn
     */
    public function setEventNameEn($eventNameEn)
    {
        $this->eventNameEn = $eventNameEn;
    }

    /**
     * @return string
     */
    public function getEventNameEn()
    {
        return $this->eventNameEn;
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
     * @ORM\OneToOne(targetEntity="Chaire\AdminBundle\Entity\Address", cascade={"persist"})
     * @Assert\Valid()
     */
    private $eventAddress;

    public function setEventAddress(Address $address = null)
    {
        $this->eventAddress = $address;
    }

    public function getEventAddress()
    {
        return $this->eventAddress;
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
     * Set eventName
     *
     * @param string $eventName
     * @return Event
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get eventName
     *
     * @return string 
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set eventDescription
     *
     * @param string $eventDescription
     * @return Event
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;

        return $this;
    }

    /**
     * Get eventDescription
     *
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     * @return Event
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime 
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }





}
