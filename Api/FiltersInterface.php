<?php

declare(strict_types=1);

namespace K2\CustomerOrderSearch\Api;

interface FiltersInterface
{
    public function isFilterable($post);
    public function filter($order, $post);
}
