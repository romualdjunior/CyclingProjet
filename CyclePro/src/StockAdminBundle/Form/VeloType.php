<?php

namespace StockAdminBundle\Form;

use StockAdminBundle\Entity\Fournisseur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VeloType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('marque')->add('type',ChoiceType::class,array(
            'choices'=> array('POUR VENTE'=>'POUR VENTE','POUR LOCATION'=>'POUR LOCATION')))->add('couleur')
            ->add('categorie', ChoiceType::class,array(
                'choices' => array(
                    'Vélos de route' => 'Vélos de route',
                    'Vélos de route Flat Bar' => 'Vélos de route Flat Bar',
                     'Vélos de tourisme' => 'Vélos de tourisme',
                    'Vélos hybrides' => 'Vélos hybrides',
                    'Vélos Cross' => 'Vélos Cross',
                    'Vélos de transport' => 'Vélos de transport',
                    'Autres' => 'Autres'
                ),
            ))
            ->add('taille', ChoiceType::class,array(
                'choices'=> array('petit'=>'petit','moyen'=>'moyen','grand'=>'grand','très grand'=>'très grand')))
            ->add('nbrDePlace')
            ->add('description')->add('Caracteristiques')->add('qtEnStock')->add('qtStockSecurite')
            ->add('prixAchat')->add('prixLocH')->add('etat', ChoiceType::class,array(
                'choices'=> array('disponible'=>'disponible','non disponible'=>'non disponible')))

            ->add('fournisseur', EntityType::class , array('class'=>Fournisseur::class,
                'choice_label'=>'raisonSociale',
                'multiple'=>false))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StockAdminBundle\Entity\Velo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'stockadminbundle_velo';
    }


}
