<?php


namespace App\Domain\Api\Form;


use App\Domain\Api\DataTransfertObject\Credentials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("username", TextType::class, [
                "label" => false,
                "attr" => [
                    "class" => "usernameConnexion",
                    "placeholder" => "Pseudo"
                ]
            ])
            ->add("password", PasswordType::class, [
                "label" => false,
                "attr" => [
                    "class" => "password_connexion",
                    "placeholder" => "password"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Credentials::class);
    }

}