<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $configuration = $menu->getChild('configuration');

        if (null !== $configuration) {
            $this->addChild($configuration);
        } else {
            $this->addChild($menu->getFirstChild());
        }
    }

    private function addChild(ItemInterface $item): void
    {
        $item
            ->addChild('analytics', [
                'route' => 'gabrielcol_sylius_rec_ai_admin_property_index',
            ])
            ->setLabel('gabrielcol_sylius_rec_ai.ui.recommendation_ai')
            ->setLabelAttribute('icon', 'bullhorn');
    }
}
