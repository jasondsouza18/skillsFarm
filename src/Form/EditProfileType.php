<?php

namespace App\Form;

use App\Entity\Jobseeker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vc_email', EmailType::class, array(
                'required' => true,
            ))
            ->add('vc_firstname', TextType::class, array(
                'required' => true,
            ))
            ->add('vc_secondname', TextType::class, array(
                'required' => false,
            ))
            ->add('vc_surname', TextType::class, array(
                'required' => true,
            ))
            ->add('vc_phone', TextType::class, array(
                'required' => true,
            ))
            ->add('bo_sex', ChoiceType::class, array(
                'attr' => array('class' => ''),

                'empty_data' => 'Choose an option',
                'required' => false,
                'choices' => array(
                    'Male' => 1,
                    'Female' => 0
                )
            ))
            ->add('dt_dob', DateType::class, array(
                'widget' => 'single_text',
                'required' => false
            ))
            ->add('vc_location', TextType::class, array(
                'required' => true,
            ))
            ->add('db_latitude', HiddenType::class)
            ->add('db_longitude', HiddenType::class)
            ->add('vc_country', HiddenType::class, array(
                'required' => true,
            ))
            ->add('bo_subscriptionletter', ChoiceType::class, array(
                'attr' => array('class' => 'chosen'),
                'required' => false,
                'empty_data' => '1',
                'choices' => array(
                    'Yes' => 1,
                    'No' => 0
                )
            ))
            ->add('vc_headline', TextType::class, array(
                'required' => true,
            ))
            ->add('vc_description', TextareaType::class, array(
                'required' => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jobseeker::class,
        ]);
    }
}
