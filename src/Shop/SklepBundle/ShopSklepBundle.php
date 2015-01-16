<?php

namespace Shop\SklepBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ShopSklepBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }


}
