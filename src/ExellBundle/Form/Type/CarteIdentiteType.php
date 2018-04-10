<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 10/04/2018
 * Time: 10:45
 */

namespace ExellBundle\Form\Type;


use ExellBundle\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;


class CarteIdentiteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carteIdentiteFile',VichFileType::class,[
                'required' => false,
                'allow_delete' => true,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Utilisateur::class,
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'exellbundle_carteId';
    }
}