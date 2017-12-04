<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agence
 *
 * @ORM\Table(name="agence")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\AgenceRepository")
 */
class Agence
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
     * @ORM\Column(name="nomAgence", type="string", length=255)
     */
    private $nomAgence;

    /**
     * @ORM\ManyToOne(targetEntity="ExellBundle\Entity\Adresse",cascade={"persist"})
     */
    private $adress;


    /**
     * @ORM\ManyToMany(targetEntity="ExellBundle\Entity\Bien",cascade={"persist"})
     */
    private $lots;


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
     * Set nomAgence
     *
     * @param string $nomAgence
     *
     * @return Agence
     */
    public function setNomAgence($nomAgence)
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    /**
     * Get nomAgence
     *
     * @return string
     */
    public function getNomAgence()
    {
        return $this->nomAgence;
    }

    /**
     * Set adress
     *
     * @param \ExellBundle\Entity\Adresse $adress
     *
     * @return Agence
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
     * Constructor
     */
    public function __construct()
    {
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lot
     *
     * @param \ExellBundle\Entity\Bien $lot
     *
     * @return Agence
     */
    public function addLot(\ExellBundle\Entity\Bien $lot)
    {
        $this->lots[] = $lot;

        return $this;
    }

    /**
     * Remove lot
     *
     * @param \ExellBundle\Entity\Bien $lot
     */
    public function removeLot(\ExellBundle\Entity\Bien $lot)
    {
        $this->lots->removeElement($lot);
    }

    /**
     * Get lots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLots()
    {
        return $this->lots;
    }

    public function __toString()
    {
        return $this->nomAgence;
    }
}
