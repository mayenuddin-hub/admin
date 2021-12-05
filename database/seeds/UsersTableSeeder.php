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
 * @package    seeds
 * @author     Original Author adam@ggtasker.co.uk
 * @copyright  2018-2019 Booking Core
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: 1.0
 * @link       http://pear.php.net/package/seeds  
 */
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'email' => 'admin@dev.com',
            'password' => bcrypt('admin123'),
            'phone'   => '112 666 888',
            'status'   => 'publish',
            'created_at' =>  date("Y-m-d H:i:s"),
            'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
        ]);
        $user = \App\User::where('email','admin@dev.com')->first();
        $user->assignRole('administrator');

        DB::table('users')->insert([
            'first_name' => 'Vendor',
            'last_name' => '01',
            'email' => 'vendor1@dev.com',
            'password' => bcrypt('123456Aa'),
            'phone'   => '112 666 888',
            'status'   => 'publish',
            'created_at' =>  date("Y-m-d H:i:s"),
            'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
        ]);
        $user = \App\User::where('email','vendor1@dev.com')->first();
        $user->assignRole('vendor');

        DB::table('users')->insert([
            'first_name' => 'Customer',
            'last_name' => '01',
            'email' => 'customer1@dev.com',
            'password' => bcrypt('123456Aa'),
            'phone'   => '112 666 888',
            'status'   => 'publish',
            'created_at' =>  date("Y-m-d H:i:s"),
            'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
        ]);
        $user = \App\User::where('email','customer1@dev.com')->first();
        $user->assignRole('customer');

        $vendor= [
            ['Elise','Aarohi'],
            ['Kaytlyn','Alvapriya'],
            ['Lynne','Victoria']
        ];
        foreach ($vendor as $k=>$v){
            DB::table('users')->insert([
                'first_name' => $v[0],
                'last_name' => $v[1],
                'email' =>  $v[1].'@dev.com',
                'password' => bcrypt('123456Aa'),
                'phone'   => '112 666 888',
                'status'   => 'publish',
                'created_at' =>  date("Y-m-d H:i:s"),
                'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
            ]);
            $user = \App\User::where('email',$v[1].'@dev.com')->first();
            $user->assignRole('vendor');
        }

        $customer = [
            ['William','Diana'],
            ['Sarah','Violet'],
            ['Paul','Amora'],
            ['Richard','Davina'],
            ['Shushi','Yashashree'],
            ['Anne','Nami'],
            ['Bush','Elise'],
            ['Elizabeth','Norah'],
            ['James','Alia'],
            ['John','Dakshi'],
        ];
        foreach ($customer as $k=>$v){
            DB::table('users')->insert([
                'first_name' => $v[0],
                'last_name' => $v[1],
                'email' =>  $v[1].'@dev.com',
                'password' => bcrypt('123456Aa'),
                'phone'   => '888 999 777',
                'status'   => 'publish',
                'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.',
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
            $user = \App\User::where('email',$v[1].'@dev.com')->first();
            $user->assignRole('customer');
        }
    }
}
