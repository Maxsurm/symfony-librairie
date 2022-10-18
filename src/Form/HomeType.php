<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["help"=>"Le titre de la page", "help_attr"=>["class"=>"text-primary"], "label"=>"Le Titre", "required"=>true])
            ->add('texte', CKEditorType::class, ["label"=>"Le Texte", "required"=>true])
            ->add('signature', TextType::class, ["label"=>"La Signature", "required"=>true])
            ->add('isActive', CheckboxType::class, ["label"=>"Page Active ?", "row_attr"=>["class"=>"form-switch"], "required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
