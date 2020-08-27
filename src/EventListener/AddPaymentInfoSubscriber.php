<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITagInterface;
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

        $this->tagBag->add(new GRecAITag(
            Tags::TAG_ADD_PAYMENT_INFO,
            GRecAITagInterface::EVENT_ADD_PAYMENT_INFO
        ), TagBagInterface::SECTION_BODY_END);
    }
}
