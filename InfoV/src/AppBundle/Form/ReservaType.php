<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ReservaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('fechaReserva', DateType::class)

            ->add('numeroAsiento')



            ->add('user', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:User',
                // use the Category.nombre property as the visible option string
                'choice_label' => function ($usuario) {
                    return $usuario->getNombre();
                },

            ))



            ->add('horario', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Horario',
                // use the Category.nombre property as the visible option string
                'choice_label' => function ($horario) {
                    return $horario->getId();
                },


            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reserva'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reserva';
    }


}
