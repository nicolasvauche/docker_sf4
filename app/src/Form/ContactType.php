<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'label' => 'Votre nom',
                    'required' => true,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'ex: Sophie Dupont',
                        ],
                ])
            ->add('email',
                EmailType::class,
                [
                    'label' => 'Votre e-mail',
                    'required' => true,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'ex: sophie@dupont.com',
                        ],
                ])
            ->add('subject',
                TextType::class,
                [
                    'label' => 'Sujet de votre message',
                    'required' => true,
                    'attr' =>
                        [
                            'class' => 'form-control',
                        ],
                ])
            ->add('message',
                TextareaType::class,
                [
                    'label' => 'Votre message',
                    'required' => true,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'rows' => 5,
                        ],
                ])
            ->add('save', SubmitType::class,
                [
                    'label' => 'Envoyez !',
                    'attr' =>
                        [
                            'class' => 'form-sumbit',
                        ],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
