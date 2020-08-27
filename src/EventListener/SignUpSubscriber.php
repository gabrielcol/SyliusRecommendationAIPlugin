<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;

final class SignUpSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.customer.post_register' => 'signUp',
        ];
    }

    public function signUp(): void
    {
        if (!$this->isShopContext() || !$this->hasProperties()) {
            return;
        }

        $this->tagBag->add(new GtagTag(
            Tags::TAG_SIGN_UP,
            GtagTagInterface::EVENT_SIGN_UP
        ), TagBagInterface::SECTION_BODY_END);
    }
}
