<?php

namespace ExellBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\BienRepository")
 */
class Bien
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
     * @ORM\Column(name="nomBien", type="string", length=255)
     */
    private $nomBien;



    /**
     * @var string
     *
     * @ORM\Column(name="nomTypeBien", type="string", length=255)
     */
    private $nomTypeBien;




    /**
     * @ORM\ManyToMany(targetEntity="ExellBundle\Entity\Images",cascade={"persist"})
     *
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="ExellBundle\Entity\Categorie",cascade={"persist"})
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="ExellBundle\Entity\Presentation",cascade={"persist"})
     */
    private $presentation;

    /**
     * @ORM\ManyToOne(targetEntity="ExellBundle\Entity\Adresse",cascade={"persist"})
     */
    private $adress;

    /**
     * @ORM\ManyToMany(targetEntity="ExellBundle\Entity\Prix",cascade={"persist"})
     */
    private $prix;


    /**
     * @ORM\ManyToOne(targetEntity="ExellBundle\Entity\Agence",cascade={"persist"})
     */
    private $agence;


    /**
     * @ORM\ManyToOne(targetEntity="ExellBundle\Entity\Offres",cascade={"persist"})
     */
    private $offres;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->prix = new ArrayCollection();
    }

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
     * Set nomBien
     *
     * @param string $nomBien
     *
     * @return Bien
     */
    public function setNomBien($nomBien)
    {
        $this->nomBien = $nomBien;

        return $this;
    }

    /**
     * Get nomBien
     *
     * @return string
     */
    public function getNomBien()
    {
        return $this->nomBien;
    }

   

    /**
     * Add image
     *
     * @param \ExellBundle\Entity\Images $image
     *
     * @return Bien
     */
    public function addImage(\ExellBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \ExellBundle\Entity\Images $image
     */
    public function removeImage(\ExellBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add category
     *
     * @param \ExellBundle\Entity\Categorie $category
     *
     * @return Bien
     */
    public function addCategory(\ExellBundle\Entity\Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \ExellBundle\Entity\Categorie $category
     */
    public function removeCategory(\ExellBundle\Entity\Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set presentation
     *
     * @param \ExellBundle\Entity\Presentation $presentation
     *
     * @return Bien
     */
    public function setPresentation(\ExellBundle\Entity\Presentation $presentation = null)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return \ExellBundle\Entity\Presentation
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set adress
     *
     * @param \ExellBundle\Entity\Adresse $adress
     *
     * @return Bien
     */
    public function setAdress(\ExellBundle\Entity\Adresse $adress = null)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return \ExellBundle\Entity\Adresse
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Add prix
     *
     * @param \ExellBundle\Entity\Prix $prix
     *
     * @return Bien
     */
    public function addPrix(\ExellBundle\Entity\Prix $prix)
    {
        $this->prix[] = $prix;

        return $this;
    }

    /**
     * Remove prix
     *
     * @param \ExellBundle\Entity\Prix $prix
     */
    public function removePrix(\ExellBundle\Entity\Prix $prix)
    {
        $this->prix->removeElement($prix);
    }

    /**
     * Get prix
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrix()
    {
        return $this->prix;
    }

    public function __toString()
    {
        return $this->nomBien;
    }

    /**
     * Set nomTypeBien
     *
     * @param string $nomTypeBien
     *
     * @return Bien
     */
    public function setNomTypeBien($nomTypeBien)
    {
        $this->nomTypeBien = $nomTypeBien;

        return $this;
    }

    /**
     * Get nomTypeBien
     *
     * @return string
     */
    public function getNomTypeBien()
    {
        return $this->nomTypeBien;
    }

    /**
     * Set agence
     *
     * @param \ExellBundle\Entity\Agence $agence
     *
     * @return Bien
     */
    public function setAgence(\ExellBundle\Entity\Agence $agence = null)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \ExellBundle\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    


    /**
     * Set offres
     *
     * @param \ExellBundle\Entity\Offres $offres
     *
     * @return Bien
     */
    public function setOffres(\ExellBundle\Entity\Offres $offres = null)
    {
        $this->offres = $offres;

        return $this;
    }

    /**
     * Get offres
     *
     * @return \ExellBundle\Entity\Offres
     */
    public function getOffres()
    {
        return $this->offres;
    }
}
