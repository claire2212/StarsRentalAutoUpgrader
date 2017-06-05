<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Icme\ActionBundle\Form\DataTransformer\BookingTransformer;

class BookingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label'=> 'Date de début'
                
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label' => 'Date de fin'
            ])
            ->add('client',EntityType::class, [
                'class'        => 'AppBundle:Client',
                'choice_label' => 'lastName',
                'multiple'     => false,
                'expanded'     => false,
                'placeholder'  => 'Choisir un client',
                'query_builder' => function (\AppBundle\Repository\ClientRepository $er) {
                    return $er->createQueryBuilder('c')
                              ->orderBy('c.lastName', 'ASC');
                    }
            ])
            ->add('car', EntityType::class, [
                'class'        => 'AppBundle:Car',
                'choice_label' => 'name',
                'multiple'     => false,
                'expanded'     => false,
                'placeholder'  => 'Choisir une voiture',
                'query_builder' => function (\AppBundle\Repository\CarRepository $er) {
                    return $er->createQueryBuilder('car')
                              ->where('car.available = 1');
                    }
            ])
            ->add('upgrade');

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Booking'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_booking';
    }

}
