<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\AdresseRepository")
 */
class Adresse
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
     * @var int
     *
     * @ORM\Column(name="numeroVoie", type="integer")
     */
    private $numeroVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="typeVoie", type="string", length=255)
     */
    private $typeVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;


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
     * Set numeroVoie
     *
     * @param integer $numeroVoie
     *
     * @return Adresse
     */
    public function setNumeroVoie($numeroVoie)
    {
        $this->numeroVoie = $numeroVoie;

        return $this;
    }

    /**
     * Get numeroVoie
     *
     * @return int
     */
    public function getNumeroVoie()
    {
        return $this->numeroVoie;
    }

    /**
     * Set typeVoie
     *
     * @param string $typeVoie
     *
     * @return Adresse
     */
    public function setTypeVoie($typeVoie)
    {
        $this->typeVoie = $typeVoie;

        return $this;
    }

    /**
     * Get typeVoie
     *
     * @return string
     */
    public function getTypeVoie()
    {
        return $this->typeVoie;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Adresse
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    public function __toString()
    {
        return $this->ville;
    }
}
