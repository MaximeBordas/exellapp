<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 *
 * @ORM\Table(name="presentation")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\PresentationRepository")
 */
class Presentation
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
     * @ORM\Column(name="nom_presentation", type="string", length=255)
     */
    private $nomPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="dispositifFiscal", type="string", length=255)
     */
    private $dispositifFiscal;

    /**
     * @var string
     *
     * @ORM\Column(name="normes", type="string", length=255,nullable=true)
     */
    private $normes;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrLots", type="integer",nullable=true)
     */
    private $nbrLots;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraison", type="date",nullable=true)
     */
    private $dateLivraison;





    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $desciption;


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
     * Set dispositifFiscal
     *
     * @param string $dispositifFiscal
     *
     * @return Presentation
     */
    public function setDispositifFiscal($dispositifFiscal)
    {
        $this->dispositifFiscal = $dispositifFiscal;

        return $this;
    }

    /**
     * Get dispositifFiscal
     *
     * @return string
     */
    public function getDispositifFiscal()
    {
        return $this->dispositifFiscal;
    }

    /**
     * Set normes
     *
     * @param string $normes
     *
     * @return Presentation
     */
    public function setNormes($normes)
    {
        $this->normes = $normes;

        return $this;
    }

    /**
     * Get normes
     *
     * @return string
     */
    public function getNormes()
    {
        return $this->normes;
    }

    /**
     * Set nbrLots
     *
     * @param integer $nbrLots
     *
     * @return Presentation
     */
    public function setNbrLots($nbrLots)
    {
        $this->nbrLots = $nbrLots;

        return $this;
    }

    /**
     * Get nbrLots
     *
     * @return int
     */
    public function getNbrLots()
    {
        return $this->nbrLots;
    }

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Presentation
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    public function __toString()
    {
        return $this->nomPresentation;
    }


    /**
     * Set nomPresentation
     *
     * @param string $nomPresentation
     *
     * @return Presentation
     */
    public function setNomPresentation($nomPresentation)
    {
        $this->nomPresentation = $nomPresentation;

        return $this;
    }

    /**
     * Get nomPresentation
     *
     * @return string
     */
    public function getNomPresentation()
    {
        return $this->nomPresentation;
    }

    /**
     * Set desciption
     *
     * @param string $desciption
     *
     * @return Presentation
     */
    public function setDesciption($desciption)
    {
        $this->desciption = $desciption;

        return $this;
    }

    /**
     * Get desciption
     *
     * @return string
     */
    public function getDesciption()
    {
        return $this->desciption;
    }
}
