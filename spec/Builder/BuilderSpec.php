<?php

declare(strict_types=1);

namespace spec\Gabrielcol\SyliusRecommendationAIPlugin\Builder;

use PhpSpec\ObjectBehavior;
use Gabrielcol\SyliusRecommendationAIPlugin\Builder\BuilderInterface;

abstract class BuilderSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedThrough('create');
    }

    public function it_chains(): void
    {
        $this->setTest('test')->shouldBeAnInstanceOf(BuilderInterface::class);
    }

    abstract public function it_builds(): void;
}
