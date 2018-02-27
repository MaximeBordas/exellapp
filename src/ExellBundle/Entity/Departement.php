<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="nomDepartement", type="string", length=255)
     */
    private $nomDepartement;

    /**
     * @var int
     *
     * @ORM\Column(name="codeDepartement", type="integer")
     */
    private $codeDepartement;


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
     * Set nomDepartement
     *
     * @param string $nomDepartement
     *
     * @return Departement
     */
    public function setNomDepartement($nomDepartement)
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    /**
     * Get nomDepartement
     *
     * @return string
     */
    public function getNomDepartement()
    {
        return $this->nomDepartement;
    }

    /**
     * Set codeDepartement
     *
     * @param integer $codeDepartement
     *
     * @return Departement
     */
    public function setCodeDepartement($codeDepartement)
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }

    /**
     * Get codeDepartement
     *
     * @return int
     */
    public function getCodeDepartement()
    {
        return $this->codeDepartement;
    }
    public function __toString()
    {
        return $this->nomDepartement;
    }
}

