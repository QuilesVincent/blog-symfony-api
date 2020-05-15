<?php


namespace App\Domain\Blog\Form;


use App\Domain\Blog\DataTransfertObject\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotNull;

class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "Titre de l'article",
                ]
            ])
            ->add("titlePicture", TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "Titre de la photo",
                ]
            ])
            ->add("content", TextareaType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "Contenu de l'article",
                ]
            ])
            ->add("introduction", TextareaType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Intro de l'article",
                ]
            ])
            ->add("category", ChoiceType::class, [
                "label" => "Article Category",
                "choices" => [
                    "Changement" => "Changement",
                    "Renaissance" => "Renaissance"
                ],
                "attr" => [
                    "class" => "secretQuestion inputForm",
                ]
            ])
            ->add("file", FileType::class, [
                "required" => false,
                "mapped" => false,
                "constraints" => [
                    new Image(),
                    new NotNull([
                        "groups" => "create"
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Article::class);
    }

}