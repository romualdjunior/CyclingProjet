<?php

namespace CommandeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AdresseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('phone',TextType::class)->add('email')
        ->add('pays',choiceType::class,["choices"=>[
        "UK"=>"0",
        "India"=>"1",
        "USA"=>"2",
    ]] )
            ->add('ville',choiceType::class,["choices"=>[
                "tunis"=>"0",
                "sousse"=>"1",
                "cambridge"=>"2",
            ]] )
            ->add('etat',choiceType::class,["choices"=>[
                "californie"=>"0",
                "Beverly"=>"1",
                "washinton"=>"2",
            ]] )
            ->add('pincode',TextType::class)
            ->add('adresseLivraison');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CommandeBundle\Entity\Adresse'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandebundle_adresse';
    }


}
