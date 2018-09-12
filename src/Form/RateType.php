<?php

namespace App\Form;

use App\Entity\Rate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RateType
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class RateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', null,
                [
                    'attr' => ['class' => 'hidden rate-value'],
                    'label' => false,
                ]
            )
            ->add('comment', null,
                [
                    'label' => 'Commentaire (optionnel)',
                    'attr' => ['class' => 'full-width rating-comment'],
                ]
            )
            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Rate::class,
        ));
    }
}
