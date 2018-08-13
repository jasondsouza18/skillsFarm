<?php

namespace App\Form;

use App\Entity\Jobseeker;
use Symfony\Component\Form\AbstractType;
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
            ->add('vc_email')
            ->add('vc_firstname')
            ->add('vc_secondname')
            ->add('vc_surname')
            ->add('vc_phone')
            ->add('bo_sex', ChoiceType::class, array(
                'attr' => array('class' => ''),
                'choices' => array(
                    'Male' => 1,
                    'Female' => 0,
                )
            ))
            ->add('dt_dob', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('vc_location')
            ->add('db_latitude', HiddenType::class)
            ->add('db_longitude', HiddenType::class)
            ->add('vc_country', HiddenType::class)
            ->add('bo_subscriptionletter', ChoiceType::class, array(
                'attr' => array('class' => 'chosen'),
                'choices' => array(
                    'Yes' => 1,
                    'No' => 0,
                )
            ))
            ->add('vc_headline')
            ->add('vc_description');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jobseeker::class,
        ]);
    }
}
