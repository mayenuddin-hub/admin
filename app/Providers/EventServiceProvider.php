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
 * @package    Providers
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booki
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/Providers
 */
namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Booking\Events\VendorLogPayment;
use Modules\Booking\Listeners\VendorLogPaymentListen;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Events\VendorApproved;
use Modules\User\Listeners\SendMailUserRegisteredListen;
use Modules\User\Listeners\SendVendorApprovedMail;
use Modules\User\Listeners\SendVendorRegisterdEmail;
use Modules\Vendor\Events\PayoutRequestEvent;
use Modules\Vendor\Listeners\PayoutRequestNotificationListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendMailUserRegistered::class => [
            SendMailUserRegisteredListen::class
        ],
        VendorApproved::class=>[
            SendVendorApprovedMail::class
        ],
        NewVendorRegistered::class=>[
            SendVendorRegisterdEmail::class
        ],

        PayoutRequestEvent::class=>[
            PayoutRequestNotificationListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
