<?php

declare(strict_types=1);

namespace Tests\Gabrielcol\SyliusRecommendationAIPlugin\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use Gabrielcol\SyliusRecommendationAIPlugin\Repository\PropertyRepositoryInterface;

final class PropertyContext implements Context
{
    /** @var PropertyRepositoryInterface */
    private $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * @Transform :property
     */
    public function getPropertyByTrackingId($property)
    {
        return $this->propertyRepository->findOneBy([
            'trackingId' => $property,
        ]);
    }
}
