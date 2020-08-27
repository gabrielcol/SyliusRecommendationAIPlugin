<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class BeginCheckoutSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'track',
        ];
    }

    public function track(GetResponseEvent $event): void
    {
        $request = $event->getRequest();

        if (!$event->isMasterRequest() || !$this->isShopContext($request)) {
            return;
        }

        if (!$request->attributes->has('_route')) {
            return;
        }

        $route = $request->attributes->get('_route');
        if ('sylius_shop_checkout_start' !== $route) {
            return;
        }

        if (!$this->hasProperties()) {
            return;
        }

        $this->tagBag->add(new GtagTag(
            Tags::TAG_BEGIN_CHECKOUT,
            GtagTagInterface::EVENT_BEGIN_CHECKOUT
        ), TagBagInterface::SECTION_BODY_END);
    }
}
