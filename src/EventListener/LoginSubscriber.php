<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;

final class LoginSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'security.interactive_login' => 'login',
        ];
    }

    public function login(): void
    {
        if (!$this->isShopContext() || !$this->hasProperties()) {
            return;
        }

        $this->tagBag->add(new GtagTag(
            Tags::TAG_LOGIN,
            GtagTagInterface::EVENT_LOGIN
        ), TagBagInterface::SECTION_BODY_END);
    }
}
