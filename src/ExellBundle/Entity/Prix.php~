<?php

namespace ExellBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prix
 *
 * @ORM\Table(name="prix")
 * @ORM\Entity(repositoryClass="ExellBundle\Repository\PrixRepository")
 */
class Prix
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
     * @ORM\Column(name="libellePrix", type="string", length=255)
     */
    private $libellePrix;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="price_min", type="float")
     */
    private $priceMin;

    /**
     * @var float
     *
     * @ORM\Column(name="price_max", type="float")
     */
    private $priceMax;



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
     * Set libellePrix
     *
     * @param string $libellePrix
     *
     * @return Prix
     */
    public function setLibellePrix($libellePrix)
    {
        $this->libellePrix = $libellePrix;

        return $this;
    }

    /**
     * Get libellePrix
     *
     * @return string
     */
    public function getLibellePrix()
    {
        return $this->libellePrix;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Prix
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function __toString()
    {
        return $this->libellePrix;
    }

    /**
     * Set priceMin
     *
     * @param float $priceMin
     *
     * @return Prix
     */
    public function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    /**
     * Get priceMin
     *
     * @return float
     */
    public function getPriceMin()
    {
        return $this->priceMin;
    }

    /**
     * Set priceMax
     *
     * @param float $priceMax
     *
     * @return Prix
     */
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    /**
     * Get priceMax
     *
     * @return float
     */
    public function getPriceMax()
    {
        return $this->priceMax;
    }
}
