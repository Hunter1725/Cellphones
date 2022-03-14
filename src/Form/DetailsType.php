<?php

namespace App\Form;

use App\Entity\Details;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('de_quantity')
            ->add('de_price')
            ->add('de_totalprice')
            ->add('or_orders')
            ->add('it_items')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Details::class,
        ]);
    }
}
