<?php

declare(strict_types=1);

namespace spec\Gabrielcol\SyliusRecommendationAIPlugin\Context;

use PhpSpec\ObjectBehavior;
use Gabrielcol\SyliusRecommendationAIPlugin\Context\PropertyContext;
use Gabrielcol\SyliusRecommendationAIPlugin\Model\PropertyInterface;
use Gabrielcol\SyliusRecommendationAIPlugin\Repository\PropertyRepositoryInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;

class PropertyContextSpec extends ObjectBehavior
{
    public function let(ChannelContextInterface $channelContext, PropertyRepositoryInterface $propertyRepository): void
    {
        $this->beConstructedWith($channelContext, $propertyRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(PropertyContext::class);
    }

    public function it_returns_properties(ChannelInterface $channel, PropertyInterface $property, ChannelContextInterface $channelContext, PropertyRepositoryInterface $propertyRepository): void
    {
        $channelContext->getChannel()->willReturn($channel);
        $propertyRepository->findEnabledByChannel($channel)->willReturn([$property]);

        $this->getProperties()->shouldReturn([$property]);
    }
}
