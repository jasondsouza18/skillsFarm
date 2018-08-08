<?php

namespace App\Form;

use App\Entity\Jobseeker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ->add('bo_sex')
            ->add('dt_dob')
            ->add('vc_location')
            ->add('db_latitude', HiddenType::class)
            ->add('db_longitude', HiddenType::class)
            ->add('vc_about')
            ->add('bo_subscriptionletter')
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
