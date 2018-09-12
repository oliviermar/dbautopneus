<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null,
                [
                    'label' => 'Email',
                    'attr' => ['class' => 'form-input'],
                ]
            )
            ->add('name', null,
                [
                    'label' => 'Nom',
                    'attr' => ['class' => 'form-input'],
                ]
            )
            ->add('content', null,
                [
                    'label' => 'Message',
                    'attr' => ['class' => 'form-input'],
                    'required' => true,
                ]
            )
            ->add('phone', null,
                [
                    'label' => 'Tel',
                    'attr' => ['class' => 'form-input'],
                    'required' => false,
                ]
            )
            ->add('save', SubmitType::class,
                [
                    'label' => 'Envoyer',
                    'attr' => ['class' => 'submit-form']
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }
}
