<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Doctrine\ORM;

use Gabrielcol\SyliusRecommendationAIPlugin\Repository\PropertyRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Channel\Model\ChannelInterface;

class PropertyRepository extends EntityRepository implements PropertyRepositoryInterface
{
    public function findEnabledByChannel(ChannelInterface $channel): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere(':channel MEMBER OF o.channels')
            ->andWhere('o.enabled = true')
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult()
        ;
    }
}
