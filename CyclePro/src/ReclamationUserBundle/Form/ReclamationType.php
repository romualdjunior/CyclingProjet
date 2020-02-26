<?php

namespace ReclamationUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idClient')->
        add('nomClient')->
        add('prenomClient')->
        add('RefVelo')->
        add('tel')->
        add('adresse')->
        add('date')->
        add('raison')->
        add('Details')->
        add('email')->
        add('type', ChoiceType::class, [
            'choices' => [

                    'Réparation'  => 'Réparation' ,
                     'Défaut' => 'Défaut' ,
                    'Autres' => 'Autres'
                ]]) ->
        add('submit' , SubmitType::class);

        $builder->get('date')
            ->getAttribute('formatter')
            ->setPattern('d-M-y ')
        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReclamationUserBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reclamationuserbundle_reclamation';
    }


}
