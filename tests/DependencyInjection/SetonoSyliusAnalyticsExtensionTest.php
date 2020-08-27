<?php

declare(strict_types=1);

namespace Tests\Gabrielcol\SyliusRecommendationAIPlugin\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Gabrielcol\SyliusRecommendationAIPlugin\DependencyInjection\GabrielcolSyliusRecommendationAiPluginExtension;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class SetonoSyliusAnalyticsExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions(): array
    {
        return [
            new GabrielcolSyliusRecommendationAiPluginExtension(),
        ];
    }

    /**
     * @test
     */
    public function after_loading_the_correct_parameter_has_been_set(): void
    {
        $this->load();

        $this->assertContainerBuilderHasParameter('gabrielcol_sylius_rec_ai.driver', SyliusResourceBundle::DRIVER_DOCTRINE_ORM);
    }
}
