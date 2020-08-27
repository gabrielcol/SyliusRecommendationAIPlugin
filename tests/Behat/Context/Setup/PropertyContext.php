<?php

declare(strict_types=1);

namespace Tests\Gabrielcol\SyliusRecommendationAIPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Gabrielcol\SyliusRecommendationAIPlugin\Model\PropertyInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Repository\PropertyRepositoryInterface;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class PropertyContext implements Context
{
    /** @var PropertyRepositoryInterface */
    private $propertyRepository;

    /** @var FactoryInterface */
    private $propertyFactory;

    public function __construct(PropertyRepositoryInterface $propertyRepository, FactoryInterface $propertyFactory)
    {
        $this->propertyRepository = $propertyRepository;
        $this->propertyFactory = $propertyFactory;
    }

    /**
     * @Given /^the store has a property with tracking id "([^"]+)" on (this channel)$/
     */
    public function theStoreHasAPropertyWithTrackingId(string $trackingId, ChannelInterface $channel): void
    {
        $property = $this->createProperty($trackingId, $channel);

        $this->saveProperty($property);
    }

    private function createProperty(string $trackingId, ChannelInterface $channel): PropertyInterface
    {
        /** @var PropertyInterface $property */
        $property = $this->propertyFactory->createNew();

        $property->setTrackingId($trackingId);
        $property->addChannel($channel);

        return $property;
    }

    private function saveProperty(PropertyInterface $property): void
    {
        $this->propertyRepository->add($property);
    }
}
