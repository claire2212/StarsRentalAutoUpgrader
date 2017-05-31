<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,['label'=>'Nom de la voiture'])
            ->add('available',ChoiceType::class,[
                'choices'=> ['Oui'=>'1','Non'=>'0'],
                'required' =>true,
                'expanded' =>true,
                'multiple' => false,
                'data' => true,
                'label' => 'Disponible'
                ])
            ->add('carRange', EntityType::class, [
                'class' => 'AppBundle:CarRange',
                'choice_label' => 'name',
                'multiple'     => false,
                'expanded'     => false,
                'label'        => 'Gamme'
            ])
            ->add('color', EntityType::class, [
                'class' => 'AppBundle:Color',
                'choice_label' => 'name',
                'multiple'     => false,
                'expanded'     => false,
                'label'        =>'Couleur'            
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_car';
    }


}
