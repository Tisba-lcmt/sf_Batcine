<?php

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('image', FileType::class, [
                'required'=> false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpg',
                            'image.jpeg',
                            'image/png',
                            'image/gif',
                            'image/bmp'
                        ],
                        'mimeTypesMessage' => "Merci d'upload un fichier jpg/jpeg/gif/bmp",
                    ])
                ]
            ])
            ->add('creationDate', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('publicationDate', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('isPublished')
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
