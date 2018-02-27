<?php

namespace ExellBundle\Form\Type;

use Doctrine\ORM\EntityManagerInterface;
use ExellBundle\Form\DataTransfomer\DepartementTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ExellBundle\Entity\Bien;


class SearchType extends AbstractType
{


    private $transformer;

    public function __construct(EntityManagerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('typeInvest',EntityType::class,array(
            'placeholder' => 'Veuillez choisir',
            'label' => 'Type d\'investistement',
            'class' => 'ExellBundle\Entity\TypeInvest',
            'choice_label' => 'libelle',
            'expanded' => false,
            'multiple' => false,
            'attr' => [
                'class' => 'form-inline',
                'required' => true,
            ]
        ))
        /*->add('departement',EntityType::class,array(
            'placeholder' => 'Veuillez renseigner le Département',
            'class' => 'ExellBundle\Entity\Departement',
            'attr' => [
                'class' => 'form-inline',
                'required' => true,
            ],
        ));*/


        ->add('departement',TextType::class,array(
            'invalid_message' => ' Cela n\'est pas un numéro de département valide',
        ));

        $builder->get('departement')->addModelTransformer(new DepartementTransformer($this->transformer));

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Bien::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'exellbundle_bien';
    }

}