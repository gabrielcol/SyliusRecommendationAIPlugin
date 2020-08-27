<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Builder\ItemBuilder;
use Gabrielcol\SyliusRecommendationAIPlugin\Event\BuilderEvent;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GtagTagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Model\ProductInterface;

final class ViewItemSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.product.show' => 'view',
        ];
    }

    public function view(ResourceControllerEvent $event): void
    {
        $product = $event->getSubject();

        if (!$product instanceof ProductInterface || !$this->isShopContext()) {
            return;
        }

        if (!$this->hasProperties()) {
            return;
        }

        $builder = ItemBuilder::create()
            ->setId((string) $product->getCode())
            ->setName((string) $product->getName())
        ;

        $this->eventDispatcher->dispatch(new BuilderEvent($builder, $product));

        $this->tagBag->add(new GtagTag(
            Tags::TAG_VIEW_ITEM,
            GtagTagInterface::EVENT_VIEW_ITEM,
            $builder
        ), TagBagInterface::SECTION_BODY_END);
    }
}
