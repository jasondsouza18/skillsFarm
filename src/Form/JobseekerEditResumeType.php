<?php

namespace App\Form;

use App\Entity\JobseekerResume;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobseekerEditResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vc_coverletter', TextareaType::class)
            ->add('vc_cvpath', HiddenType::class)
            ->add('vcCvname',TextType::class)
            ->add('it_priority', ChoiceType::class, array(
                'attr' => array('class' => 'chosen'),
                'choices' => array(
                    'Set as Primary' => 1,
                    'Default' => 0,
                )
            ))
            ->add('vc_cvstatus', ChoiceType::class, array(
                'attr' => array('class' => 'chosen'),
                'choices' => array(
                    'Active' => 1,
                    'In-Active' => 2,
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobseekerResume::class,
        ]);
    }
}
