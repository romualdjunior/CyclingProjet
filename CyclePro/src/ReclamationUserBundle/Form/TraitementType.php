<?php

namespace ReclamationUserBundle\Form;

use ReclamationUserBundle\Entity\Responsable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraitementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idReclamation')->
        add('nomCli')->
        add('prenomCli')->
        add('tel')->
        add('adresse')->
        add('date')->
        add('raison')->
        add('details')->
        add('refVelo')->
        add('idCli')->
        add('email')->
        add('type')->
        add('etat' ,ChoiceType::class, [
        'choices' => [

            'Traitée'  => 'Traitée' ,
            'Non traitée' => 'Non traitée' ,

        ]]) ->
        add('cout')->
        add('Responsable' ,EntityType::class,
            array("class"=>Responsable::class,
                "choice_label"=>"nom",
                "multiple"=>false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReclamationUserBundle\Entity\Traitement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reclamationuserbundle_traitement';
    }


}
