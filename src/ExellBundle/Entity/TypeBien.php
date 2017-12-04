<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBien
 *
 * @ORM\Table(name="type_bien")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\TypeBienRepository")
 */
class TypeBien
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
     * @ORM\Column(name="libelleTypeBien", type="string", length=255)
     */
    private $libelleTypeBien;


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
     * Set libelleTypeBien
     *
     * @param string $libelleTypeBien
     *
     * @return TypeBien
     */
    public function setLibelleTypeBien($libelleTypeBien)
    {
        $this->libelleTypeBien = $libelleTypeBien;

        return $this;
    }

    /**
     * Get libelleTypeBien
     *
     * @return string
     */
    public function getLibelleTypeBien()
    {
        return $this->libelleTypeBien;
    }

    public function __toString()
    {
        return $this->libelleTypeBien;
    }
}
