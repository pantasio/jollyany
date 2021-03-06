<?php

/**
 * @file
 * This file contains the rule condition for the wishlist
 */

/**
 * Implements hook_rules_condition_info().
 */
function uc_wishlist_rules_condition_info() {

  $conditions['uc_wishlist_condition_product_wishlist'] = array(
    'label' => t('Check if an order has wishlist product'),
    'group' => t('Order'),
    'base' => 'uc_wishlist_condition_product_wishlist',
    'parameter' => array(
      'order' => array(
        'type' => 'uc_order',
        'label' => t('Order'),
      ),
    ),
  );

  return $conditions;
}

/**
 * Checks that the order has wishlist product.
 */
function uc_wishlist_condition_product_wishlist($order, $settings) {

 return  uc_wishlist_order_wishlist($order);

}
