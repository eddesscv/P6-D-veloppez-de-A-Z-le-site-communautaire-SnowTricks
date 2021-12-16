<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, $this->getOptions("Nom d'utilisateur", "Votre nom d'utilisateur"))
            ->add('email', EmailType::class, $this->getOptions("Email", "Votre adresse email"))
            ->add('firstName', TextType::class, $this->getOptions("Prénom", "Votre prénom"))
            ->add('lastName', TextType::class, $this->getOptions("Nom", "Votre nom"))
            ->add('file', FileType::class, $this->getOptions("Photo de profil", "Photo de profil"))
            ->add('password', PasswordType::class, $this->getOptions("Mot de passe", "Votre mot de passe"))
            ->add('passwordConfirm', PasswordType::class, $this->getOptions("Confirmation de mot de passe", "Retaper votre mot de passe"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
