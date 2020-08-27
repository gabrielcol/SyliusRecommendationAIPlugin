<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\EventListener;

use Gabrielcol\SyliusRecommendationAIPlugin\Builder\ItemBuilder;
use Gabrielcol\SyliusRecommendationAIPlugin\Builder\PurchaseBuilder;
use Gabrielcol\SyliusRecommendationAIPlugin\Event\BuilderEvent;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITag;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\GRecAITagInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Tag\Tags;
use Setono\TagBagBundle\TagBag\TagBagInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Model\OrderInterface;

final class PurchaseSubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.order.post_complete' => 'track',
        ];
    }

    public function track(ResourceControllerEvent $event): void
    {
        $order = $event->getSubject();

        if (!$order instanceof OrderInterface || !$this->isShopContext()) {
            return;
        }

        $channel = $order->getChannel();
        if (null === $channel) {
            return;
        }

        if (!$this->hasProperties()) {
            return;
        }

        $builder = PurchaseBuilder::create()
            ->setTransactionId((string) $order->getNumber())
            ->setAffiliation($channel->getHostname() . ' (' . $order->getLocaleCode() . ')')
            ->setValue((float) $this->moneyFormatter->format($order->getTotal()))
            ->setCurrency((string) $order->getCurrencyCode())
            ->setTax((float) $this->moneyFormatter->format($order->getTaxTotal()))
            ->setShipping((float) $this->moneyFormatter->format($order->getShippingTotal()))
        ;

        foreach ($order->getItems() as $orderItem) {
            $variant = $orderItem->getVariant();
            if (null === $variant) {
                continue;
            }

            $itemBuilder = ItemBuilder::create()
                ->setId((string) $variant->getCode())
                ->setName((string) $orderItem->getVariantName())
                ->setQuantity($orderItem->getQuantity())
                ->setPrice((float) $this->moneyFormatter->format($orderItem->getDiscountedUnitPrice()))
            ;

            $this->eventDispatcher->dispatch(new BuilderEvent($itemBuilder, $orderItem));

            $builder->addItem($itemBuilder);
        }

        $this->eventDispatcher->dispatch(new BuilderEvent($builder, $order));

        $this->tagBag->add(new GRecAITag(
            Tags::TAG_PURCHASE,
            GRecAITagInterface::EVENT_PURCHASE,
            $builder
        ), TagBagInterface::SECTION_BODY_END);
    }
}
