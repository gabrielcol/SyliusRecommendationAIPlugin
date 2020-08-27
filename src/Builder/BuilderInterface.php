<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Builder;

interface BuilderInterface
{
    public function getData(): array;

    public function getJson(): string;
}
