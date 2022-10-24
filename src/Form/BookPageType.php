<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\BookPage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class BookPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ["label"=>"Page de livre", "required"=>false])
            ->remove('imageName')
            ->remove('updatedAt')
            ->add('book', EntityType::class, ["label" => "Livre", "required" => true, "class"=>Book::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookPage::class,
        ]);
    }
}
