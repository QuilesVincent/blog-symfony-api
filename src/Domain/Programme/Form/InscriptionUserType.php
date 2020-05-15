<?php


namespace App\Domain\Programme\Form;


use App\Domain\Programme\DataTransfertObject\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class InscriptionUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("firstname", TextType::class, [
                "attr" => [
                    "placeholder" => "Prénom"
                ]

            ])
            ->add("lastname", TextType::class, [
                "attr" => [
                    "placeholder" => "Nom de famille"
                ]
            ])
            ->add("username", TextType::class, [
                "attr" => [
                    "placeholder" => "Pseudo"
                ]
            ])
            ->add("password", RepeatedType::class, [
                "type" => PasswordType::class,
                "attr" => [
                    "class" => "divPassword divInput"
                ],
                "first_options" => [
                    "label" => false,
                    "attr" => [
                        "placeholder" => "password"
                    ]
                ],
                "second_options" => [
                    "label" => false,
                    "attr" => [
                        "placeholder" => "Confirm your password"
                    ]
                ],
                "invalid_message" => "Les deux mots de passe de correspondent pas",
                "constraints" => [
                    new NotBlank(),
                    new Length(["min" => 8])
                ]
            ])
            ->add("secretQuestion", ChoiceType::class, [
                "choices" => [
                    "heure de naissance" => 1,
                    "nom du premier animal de compagnie" => 2,
                    "l'amour de votre vie" => "l'amour de votre vie"
                ]
            ])
            ->add("secretQuestionAnswer", TextType::class, [
                "attr" => [
                    "placeholder" => "réponse à la question secrète"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", User::class);
    }

}