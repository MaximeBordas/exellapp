<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offres
 *
 * @ORM\Table(name="offres")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\OffresRepository")
 */
class Offres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255 ,nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOffre", type="datetimetz",nullable=true)
     */
    private $dateOffre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Offres
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set dateOffre
     *
     * @param \DateTime $dateOffre
     *
     * @return Offres
     */
    public function setDateOffre($dateOffre)
    {
        $this->dateOffre = $dateOffre;

        return $this;
    }

    /**
     * Get dateOffre
     *
     * @return \DateTime
     */
    public function getDateOffre()
    {
        return $this->dateOffre;
    }

    public function __toString()
    {
        return $this->text;
    }
}
