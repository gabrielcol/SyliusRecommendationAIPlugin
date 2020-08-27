<?php

declare(strict_types=1);

namespace Tests\Gabrielcol\SyliusRecommendationAIPlugin\Behat\Page\Admin\Property;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

class CreatePropertyPage extends BaseCreatePage
{
    public function specifyTrackingId($id): void
    {
        $this->getElement('tracking_id')->setValue($id);
    }

    public function enableChannels(): void
    {
        $this->getElement('channels')->check();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'tracking_id' => '#setono_sylius_analytics_property_trackingId',
            'channels' => 'input[name="setono_sylius_analytics_property[channels][]"]',
        ]);
    }
}
