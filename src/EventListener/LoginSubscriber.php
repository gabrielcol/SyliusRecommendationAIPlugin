<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITagInterface;
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

        $this->tagBag->add(new GRecAITag(
            Tags::TAG_LOGIN,
            GRecAITagInterface::EVENT_LOGIN
        ), TagBagInterface::SECTION_BODY_END);
    }
}
