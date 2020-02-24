<?php

namespace StockAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccessoiresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('marque')->add('categorie',ChoiceType::class,array(
            'choices' => array(
                'Remorques & Poussettes' => 'Remorques & Poussettes',
                'Eclairage' => 'Eclairage', 'Compteurs' => 'Compteurs',
                'Béquilles' => 'Béquilles', 'Sieges enfants' => 'Sieges enfants',
                'Sacoches & Paniers vélo' => 'Sacoches & Paniers vélo', 'porte-Bagage' => 'porte-Bagage',
                'Systeme de navigation GPS' => 'Systeme de navigation GPS', 'Montres cardio & sports' => 'Montres cardio & sports',
                'Pompes' => 'Pompes', 'Equipement Cyclotourisme' => 'Equipement Cyclotourisme',
                'Entretient & Reparation' => 'Entretient & Reparation', 'Sonnettes' => 'Sonnettes',
                'Sac & Sac à dos' => 'Sac & Sac à do', 'Casques & Chapeaux' => 'Casques & Chapeaux',
                'Tenus' => 'Tenus', 'Lunette & Masques' => 'Lunette & Masques',
                'Nutrition sportive & Soins corporels' => 'Nutrition sportive & Soins corporels', 'Rangement & Transport' => 'Rangement & Transport',
                'Bidons & Porte-bidons' => 'Bidons & Porte-bidons', 'Pieces Detachees' => 'Pieces Detachees',
                'Autres' => 'Autres'
            ),
        ))->add('prix')->add('description');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StockAdminBundle\Entity\Accessoires'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'stockadminbundle_accessoires';
    }


}
