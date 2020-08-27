<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;

final class AddToCartSubscriber extends UpdateCartSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.order_item.post_add' => 'track',
        ];
    }

    public function track(ResourceControllerEvent $event): void
    {
        $this->_track($event, Tags::TAG_ADD_TO_CART, GRecAITagInterface::EVENT_ADD_TO_CART);
    }
}
