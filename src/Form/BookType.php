<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\TypeOfBook;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, ["label"=>"Livre Actif ?", "row_attr"=>["class"=>"form-switch"], "required"=>false])
            ->add('title', TextType::class, ["label" => "Titre", "required" => true])
            ->add('description', CKEditorType::class, ["label" => "Texte", "required" => false])
            ->add('imageFile', FileType::class, ["label" => "Couverture du livre", "required" => false])

            ->add('typeOfBook', EntityType::class, ["label"=> "Genre", "class"=>TypeOfBook::class, "required"=>true])
            ->remove('imageName')
            ->remove('updatedAt')
            ->remove('slug');
            if(!$options["fromAuthor"]){
                $builder
                ->add('author', EntityType::class, ["label" => "Auteur", "required" => true, "class"=>Author::class]);
            }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
            'fromAuthor' => false,
        ]);
    }
}
