<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 11/10/2017
 * Time: 12:07
 */

namespace ExellBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var int
     *
     * @ORM\Column(name="numero_tel", type="integer")
     *
     * @Assert\Length(
     *     min="10"
     * )
     */
    private $numeroTel;

    /**
     * @ORM\ManyToMany(targetEntity="ExellBundle\Entity\Bien",cascade={"persist"})
     *
     */
    private $lesBiens;


    /**
     * Utilisateur constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Set numeroTel
     *
     * @param integer $numeroTel
     *
     * @return Utilisateur
     */
    public function setNumeroTel($numeroTel)
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    /**
     * Get numeroTel
     *
     * @return integer
     */
    public function getNumeroTel()
    {
        return $this->numeroTel;
    }

    /**
     * Add lesBien
     *
     * @param \ExellBundle\Entity\Bien $lesBien
     *
     * @return Utilisateur
     */
    public function addLesBien(\ExellBundle\Entity\Bien $lesBien)
    {
        $this->lesBiens[] = $lesBien;

        return $this;
    }

    /**
     * Remove lesBien
     *
     * @param \ExellBundle\Entity\Bien $lesBien
     */
    public function removeLesBien(\ExellBundle\Entity\Bien $lesBien)
    {
        $this->lesBiens->removeElement($lesBien);
    }

    /**
     * Get lesBiens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesBiens()
    {
        return $this->lesBiens;
    }
}
