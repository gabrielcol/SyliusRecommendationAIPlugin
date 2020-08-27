<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Form\Type;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class PropertyType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('trackingId', TextType::class, [
                'label' => 'gabrielcol_sylius_rec_ai.ui.tracking_id',
                'attr' => [
                    'placeholder' => 'gabrielcol_sylius_rec_ai.ui.tracking_id_placeholder',
                ],
            ])
            ->add('enabled', CheckboxType::class, [
                'required' => false,
                'label' => 'sylius.ui.enabled',
            ])
            ->add('channels', ChannelChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'label' => 'sylius.form.product.channels',
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'gabrielcol_sylius_rec_ai_property';
    }
}
