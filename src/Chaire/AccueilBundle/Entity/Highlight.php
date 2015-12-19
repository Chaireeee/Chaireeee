<?php

namespace Chaire\AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Highlight
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chaire\AccueilBundle\Entity\HighlightRepository")
 */
class Highlight
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="base_line", type="string", length=255)
     */
    private $baseLine;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activated", type="boolean")
     */
    private $activated;


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
     * Set title
     *
     * @param string $title
     * @return Highlight
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
     * Set baseLine
     *
     * @param string $baseLine
     * @return Highlight
     */
    public function setBaseLine($baseLine)
    {
        $this->baseLine = $baseLine;

        return $this;
    }

    /**
     * Get baseLine
     *
     * @return string 
     */
    public function getBaseLine()
    {
        return $this->baseLine;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Highlight
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set activated
     *
     * @param boolean $activated
     * @return Highlight
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated
     *
     * @return boolean 
     */
    public function getActivated()
    {
        return $this->activated;
    }

    //@Assert\NotNull
    //@Assert\File(maxSize="6000000")
    /**
     *
     *
     */
    private $filephoto;

    public function getFilephoto()
    {
        return $this->filephoto;
    }

    public function setFilephoto(UploadedFile $file = null)
    {
        $this->filephoto = $file;
    }


    //@Assert\NotNull
    //@Assert\Length(max=255)
    /**
     * @ORM\Column(name="photolink", type="string", length=255,nullable=true)
     *
     *
     */
    private $photolink;

    public function getPhotolink()
    {
        return $this->photolink;
    }

    public function setPhotolink($photo)
    {
        return $this->photolink=$photo;
    }

    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->filephoto) {
            return;
        }

        // On récupère le nom original du fichier de l'internaute
        $name = $this->filephoto->getClientOriginalName();

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->filephoto->move($this->getUploadRootDir(), $name);

        // On sauvegarde le nom de fichier dans notre attribut $url
        $this->photolink = $name;

    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'uploads/img/highlight';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
}
