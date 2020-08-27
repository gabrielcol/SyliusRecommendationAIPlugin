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
            'tracking_id' => '#gabrielcol_sylius_rec_ai_property_trackingId',
            'channels' => 'input[name="gabrielcol_sylius_rec_ai_property[channels][]"]',
        ]);
    }
}
