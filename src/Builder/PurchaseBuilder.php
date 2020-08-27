<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Builder;

/**
 * @method PurchaseBuilder setTransactionId(string $transactionId)
 * @method PurchaseBuilder setAffiliation(string $affiliation)
 * @method PurchaseBuilder setValue(float $value)
 * @method PurchaseBuilder setCurrency(string $currency)
 * @method PurchaseBuilder setTax(float $tax)
 * @method PurchaseBuilder setShipping(float $shipping)
 */
final class PurchaseBuilder extends Builder implements ItemsAwareBuilderInterface
{
    use ItemsAwareBuilderTrait;

    public const EVENT_NAME = 'gabrielcol_sylius_rec_ai.builder.purchase';
}
