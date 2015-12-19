<?php

namespace Chaire\TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\TeamBundle\Entity\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
 * @var string
 *
 * @ORM\Column(name="title", type="string", length=255)
 */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="titleEn", type="string", length=255)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=500)
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="bioEn", type="string", length=500)
     */
    private $bioEn;



    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=500)
     */
    private $twitter;


    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=500)
     */
    private $linkedin;

    /**
     * @ORM\OneToOne(targetEntity="Chaire\FormationBundle\Entity\photo", cascade={"persist","remove"})
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
     * @param string $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    /**
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param string $bioEn
     */
    public function setBioEn($bioEn)
    {
        $this->bioEn = $bioEn;
    }

    /**
     * @return string
     */
    public function getBioEn()
    {
        return $this->bioEn;
    }

    /**
     * @param string $titleEn
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;
    }

    /**
     * @return string
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }





    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }




    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
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
     * @return Team
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
     * Set firstname
     *
     * @param string $firstname
     * @return Team
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Team
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set bio
     *
     * @param string $bio
     * @return Team
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string 
     */
    public function getBio()
    {
        return $this->bio;
    }



}
