<?php

namespace ExellBundle\Form\DataTransfomer;

use ExellBundle\Entity\Departement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;


class DepartementTransformer implements DataTransformerInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @param Departement|null $departement
     * @return string
     */
    public function transform($departement)
    {
        if(null == $departement)
        {
            return '';
        }
        return $departement->getId();
    }
    /**
     * transform the string in the Entity
     * @param string $nomDepartement
     * @return Departement|null
     * @throws TransformationFailedException if object (departement) is not found
     */
    public function reverseTransform($nomDepartement)
    {
        if(!$nomDepartement)
        {
            return;
        }

        $departement  = $this->em->getRepository('ExellBundle:Departement')->findOneBy(array('nomDepartement' => $nomDepartement));

        if(null === $departement)
        {
            throw  new TransformationFailedException(sprintf(

                'Le departement %s n\'existe pas ! ',
                $nomDepartement
            ));
        }

        return $departement;
    }

}