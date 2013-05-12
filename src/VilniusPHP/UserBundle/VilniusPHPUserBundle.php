<?php

namespace VilniusPHP\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VilniusPHPUserBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
