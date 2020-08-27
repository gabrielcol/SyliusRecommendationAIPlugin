<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;

final class AddPaymentInfoSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.order.post_payment' => 'track',
        ];
    }

    public function track(): void
    {
        if (!$this->isShopContext() || !$this->hasProperties()) {
            return;
        }

        $this->tagBag->add(new GtagTag(
            Tags::TAG_ADD_PAYMENT_INFO,
            GtagTagInterface::EVENT_ADD_PAYMENT_INFO
        ), TagBagInterface::SECTION_BODY_END);
    }
}
