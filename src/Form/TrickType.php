<?php

namespace App\Form;

use App\Entity\Trick;
use App\Form\ImageType;
use App\Form\VideoType;
use App\Entity\Category;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TrickType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getOptions('Nom', 'Nom du trick'))
            ->add('description', TextareaType::class, $this->getOptions('Description', 'Description du trick'))
            ->add('category', EntityType::class, $this->getOptions('Catégorie', 'Catégorie du trick', [
                'class' => Category::class,
                'choice_label' => 'title'
            ]))
            /* ->add('category', CollectionType::class, [
                'entry_type' => CategoryType::class,
                'label' => 'Catégorie',
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false 
            ]) */
            ->add('mainImage', ImageType::class, $this->getOptions('Image principale', 'Image principale'))
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ])
            ->add('videos', CollectionType::class, [
                'entry_type' => VideoType::class,
                'allow_add' => true,
                'allow_delete' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
            //'error_bubbling' => true,
        ]);
    }
}
