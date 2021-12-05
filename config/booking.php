<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Substantial
 * @package    Config
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Config
 */
return [
    'booking_route_prefix'=>env("BOOKING_ROUTER_PREFIX",'booking'),
    'services'=>[
        'tour'=>Modules\Tour\Models\Tour::class
    ],
    'payment_gateways'=>[
        'offline_payment'=>Modules\Booking\Gateways\OfflinePaymentGateway::class,
        'paypal'=>Modules\Booking\Gateways\PaypalGateway::class,
        'stripe'=>Modules\Booking\Gateways\StripeGateway::class
    ],
    'statuses'=>[
        'completed',
        'processing',
        'confirmed',
        'cancelled',
        'paid',
        'unpaid',
    ]
];
