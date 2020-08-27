<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Context;

use Gabrielcol\SyliusRecommendationAIPlugin\Model\PropertyInterface;

interface PropertyContextInterface
{
    /**
     * Returns the properties enabled for the active channel
     *
     * @return PropertyInterface[]
     */
    public function getProperties(): array;
}
