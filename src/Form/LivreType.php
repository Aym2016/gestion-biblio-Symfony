<?php

namespace App\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('annee')
            ->add('prix')
            ->add('edition')
            ->add('image',FileType::class,array('required'=>false,
                   'data_class'=>null))
             
            ->add('categorie', EntityType::class, array(
                'class'=> 'App\Entity\Categorie',
                'label'=> 'Choisir une catégorie : ',
                'expanded'=> false,
                'choice_label'=> 'nom'
            ))
          ->add('auteurs', EntityType::class, array(
                'class'=> 'App\Entity\Auteur',
                'label'=> 'Choisir le(s) auteur(s) : ',
                'choice_label'=> 'prenom' . 'nom',
                'expanded'=> true,
                'multiple'=>true))                
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
