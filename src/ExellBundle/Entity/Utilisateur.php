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
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @Vich\Uploadable()
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
     * @ORM\Column(name="numero_tel", type="bigint")
     *
     * @Assert\Length(
     *     min="9"
     * )
     */
    private $numeroTel;


    /**
     * @Vich\UploadableField(mapping="user_carteidentite", fileNameProperty="carteIdentite")
     * @var File
     */
    private $carteIdentiteFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @var string
     */
    private $carteIdentite;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

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

    /**
     * Set carteIdentite
     *
     * @param string $carteIdentite
     *
     * @return Utilisateur
     */
    public function setCarteIdentite($carteIdentite)
    {
        $this->carteIdentite = $carteIdentite;

        return $this;
    }

    /**
     * Get carteIdentite
     *
     * @return string
     */
    public function getCarteIdentite()
    {
        return $this->carteIdentite;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $carteIdentite
     * @throws \Exception
     */
    public function setCarteIdentiteFile(File $carteIdentite = null)
    {
        $this->carteIdentiteFile = $carteIdentite;

        if ($carteIdentite) {
            $this->updatedAt = new \DateTimeImmutable();
        }

    }

    /**
     * @return File
     */
    public function getCarteIdentiteFile()
    {
        return $this->carteIdentiteFile;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Utilisateur
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
