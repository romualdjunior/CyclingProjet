<?php


namespace ReclamationUserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
 $builder
    -> add ('Type' , ChoiceType::class , [
      'choices' => [

    'Réparation'  => 'Réparation' ,
    'Défaut' => 'Défaut' ,
    'Autres' => 'Autres'
]]);
}
}