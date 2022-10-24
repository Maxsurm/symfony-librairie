<?php

namespace App\Form;

use App\Entity\TypeOfBook;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TypeOfBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeName', TextType::class, ["label"=>"Nom du Genre", "required"=>true])
            ->add('typeDes', CKEditorType::class, ["label"=>"Description du Genre", "required"=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeOfBook::class,
        ]);
    }
}
