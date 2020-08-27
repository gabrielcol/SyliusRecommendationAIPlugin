<?php

declare(strict_types=1);

namespace Gabrielcol\SyliusRecommendationAIPlugin\Tag;

final class Tags
{
    public const TAG_LIBRARY = 'gabrielcol_sylius_rec_ai_library';

    public const TAG_ADD_PAYMENT_INFO = 'gabrielcol_sylius_rec_ai_add_payment_info';

    public const TAG_ADD_TO_CART = 'gabrielcol_sylius_rec_ai_add_to_cart';

    public const TAG_LOGIN = 'gabrielcol_sylius_rec_ai_login';

    public const TAG_SIGN_UP = 'gabrielcol_sylius_rec_ai_sign_up';

    public const TAG_VIEW_ITEM = 'gabrielcol_sylius_rec_ai_view_item';

    public const TAG_BEGIN_CHECKOUT = 'gabrielcol_sylius_rec_ai_begin_checkout';

    public const TAG_PURCHASE = 'gabrielcol_sylius_rec_ai_purchase';

    public const TAG_REMOVE_FROM_CART = 'gabrielcol_sylius_rec_ai_remove_from_cart';

    private function __construct()
    {
    }
}
