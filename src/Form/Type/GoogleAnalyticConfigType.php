<?php

declare(strict_types=1);

namespace Setono\SyliusAnalyticsPlugin\Form\Type;

use Setono\SyliusAnalyticsPlugin\Entity\GoogleAnalyticConfigInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class GoogleAnalyticConfigType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var GoogleAnalyticConfigInterface $GoogleAnalyticConfig */
        $GoogleAnalyticConfig = $builder->getData();

        $builder
            ->add('trackingId', TextType::class, [
                'label' => 'setono_sylius_analytics_plugin.ui.tracking_id',
            ])
        ;
    }
}
