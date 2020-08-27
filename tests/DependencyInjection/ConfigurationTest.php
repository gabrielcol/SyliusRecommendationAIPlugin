<?php

declare(strict_types=1);

namespace Tests\Gabrielcol\SyliusRecommendationAIPlugin\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use PHPUnit\Framework\TestCase;
use Gabrielcol\SyliusRecommendationAIPlugin\DependencyInjection\Configuration;
use Gabrielcol\SyliusRecommendationAIPlugin\Doctrine\ORM\PropertyRepository;
use Gabrielcol\SyliusRecommendationAIPlugin\Form\Type\PropertyType;
use Gabrielcol\SyliusRecommendationAIPlugin\Model\Property;
use Gabrielcol\SyliusRecommendationAIPlugin\Model\PropertyInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;

final class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    protected function getConfiguration(): Configuration
    {
        return new Configuration();
    }

    /**
     * @test
     */
    public function processed_value_contains_required_value(): void
    {
        $this->assertProcessedConfigurationEquals([], [
            'driver' => SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
            'resources' => [
                'property' => [
                    'classes' => [
                        'model' => Property::class,
                        'interface' => PropertyInterface::class,
                        'controller' => ResourceController::class,
                        'repository' => PropertyRepository::class,
                        'factory' => Factory::class,
                        'form' => PropertyType::class,
                    ],
                ],
            ],
        ]);
    }
}
