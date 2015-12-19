<?php

namespace Chaire\AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocialNetwork
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SocialNetwork
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
     * @ORM\Column(name="fb_link", type="string", length=255)
     */
    private $fbLink;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_link", type="string", length=255)
     */
    private $twitterLink;


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
     * Set fbLink
     *
     * @param string $fbLink
     * @return SocialNetwork
     */
    public function setFbLink($fbLink)
    {
        $this->fbLink = $fbLink;

        return $this;
    }

    /**
     * Get fbLink
     *
     * @return string 
     */
    public function getFbLink()
    {
        return $this->fbLink;
    }

    /**
     * Set twitterLink
     *
     * @param string $twitterLink
     * @return SocialNetwork
     */
    public function setTwitterLink($twitterLink)
    {
        $this->twitterLink = $twitterLink;

        return $this;
    }

    /**
     * Get twitterLink
     *
     * @return string 
     */
    public function getTwitterLink()
    {
        return $this->twitterLink;
    }
}
