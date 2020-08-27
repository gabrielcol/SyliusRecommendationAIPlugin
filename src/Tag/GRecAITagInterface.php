<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Tag;

use Setono\TagBagBundle\Tag\TwigTagInterface;

interface GRecAITagInterface extends TwigTagInterface
{
    //https://cloud.google.com/recommendations-ai/docs/user-events

    public const EVENT_ADD_TO_CART = 'add-to-cart';

    public const EVENT_ADD_TO_WISHLIST = 'add-to-list';

    public const EVENT_BEGIN_CHECKOUT = 'checkout-start';

    public const EVENT_PURCHASE = 'purchase-complete';

    public const EVENT_REFUND = 'refund';

    public const EVENT_REMOVE_FROM_CART = 'remove-from-cart';

    public const EVENT_SEARCH = 'search';

    public const EVENT_VIEW_ITEM = 'detail-page-view';

    public const EVENT_VIEW_CATEGORY = 'category-page-view';

    public const EVENT_VIEW_HOMEPAGE = 'home-page-view';

    public const EVENT_VIEW_CART_PAGE = 'shopping-cart-page-view';

    public const EVENT_VIEW_PAGE = 'page-visit';

}
