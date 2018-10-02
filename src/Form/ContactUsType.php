<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vc_name', TextType::class, array(
                'required'   => true,
                'empty_data' => 'John Doe',
            ))
            ->add('vc_email', EmailType::class, array(
                'required'   => true,
                'empty_data' => 'John Doe',
            ))
            ->add('vc_subject', TextType::class, array(
                'required'   => true,
                'empty_data' => 'John Doe',
            ))
            ->add('vc_message', TextAreaType::class, array(
                'required'   => true,
                'empty_data' => 'John Doe',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
