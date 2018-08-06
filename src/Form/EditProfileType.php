<?php

namespace App\Form;

use App\Entity\Jobseeker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vc_login')
            ->add('vc_email')
            ->add('vc_password')
            ->add('vc_firstname')
            ->add('vc_secondname')
            ->add('vc_surname')
            ->add('vc_profilepic')
            ->add('vc_phone')
            ->add('vc_facebooklogin')
            ->add('bo_sex')
            ->add('dt_dob')
            ->add('vc_location')
            ->add('db_latitude')
            ->add('db_longitude')
            ->add('vc_about')
            ->add('bo_allowinsearches')
            ->add('it_jobseekerstatus')
            ->add('bo_subscriptionletter')
            ->add('created_at')
            ->add('updated_at')
            ->add('vc_headline')
            ->add('dt_lastlogin')
            ->add('vc_description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jobseeker::class,
        ]);
    }
}
