<?php

declare(strict_types=1);

namespace K2\CustomerOrderSearch\Model\Filters;

use K2\CustomerOrderSearch\Api\FiltersInterface;

class SkuFilter implements FiltersInterface
{
    public function isFilterable($post): bool
    {
        return  (!empty($post['sku']));
    }

    public function filter($order, $post)
    {
        $order->join(
            ["soi" => "sales_order_item"],
            'main_table.entity_id = soi.order_id
                AND
                soi.product_type in ("simple","downloadable")',
            array('sku')
        )->addFieldToFilter('soi.sku', ['eq' => $post['sku']]);

        return $order;
    }
}
