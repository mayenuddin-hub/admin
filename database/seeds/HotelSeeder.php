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

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

use Modules\Review\Models\Review;
use Modules\Review\Models\ReviewMeta;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\Terms;
use Modules\Hotel\Models\HotelTerm;
use Modules\Hotel\Models\HotelRoomTerm;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add Hotel
        $list_gallery = [];
        for($i=1 ; $i <=6 ; $i++){
            $list_gallery[] = MediaFile::findMediaByName("hotel-gallery-".$i)->id;
        }
        $IDs_vendor[] = $create_user =  "1";
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Hotel Stanford',
                'slug' => 'hotel-stanford',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-5")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "300",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  "1";
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Hotel WBF Hommachi',
                'slug' => 'hotel-wbf-homachi',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-6")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "350",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  "1";
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Castello Casole Hotel',
                'slug' => 'castello-casole-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-7")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 1,
                'address' => "Petit-Montrouge",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "350",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  "1";
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Redac Gateway Hotel',
                'slug' => 'redac-gateway-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-8")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 1,
                'address' => "Petit-Montrouge",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "500",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Studio Allston Hotel',
                'slug' => 'studio-allston-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-9")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 5,
                'address' => "New York",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "500",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'EnVision Hotel Boston',
                'slug' => 'envision-hotel-biston',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-10")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 3,
                'address' => "New York",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "700",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Crowne Plaza Hotel',
                'slug' => 'crowne-plaza-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-11")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 2,
                'address' => "New York",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "900",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Stewart Hotel',
                'slug' => 'stewart-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-12")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 5,
                'address' => "New York",
                'is_featured' => "0",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "900",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  '1';
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Parian Holiday Villas',
                'slug' => 'parian-holiday-villas',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-13")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-2")->id,
                'location_id' => 1,
                'address' => "Regal Cinemas Battery Park",
                'is_featured' => "1",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "550",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'Dylan Hotel',
                'slug' => 'dylan-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-2")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 2,
                'address' => "Regal Cinemas Battery",
                'is_featured' => "1",
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "550",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "5",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);
        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_hotels')->insertGetId(
            [
                'title' => 'The May Fair Hotel',
                'slug' => 'the-may-fair-hotel',
                'content' => "<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-5")->id,
                'banner_image_id' => MediaFile::findMediaByName("hotel-featured-".rand(1,4))->id,
                'location_id' => 1,
                'address' => "Paris Cinemas Battery",
                'is_featured' => 0,
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                'price' => "550",
                'map_lat' => "48.852754",
                'map_lng' => "2.339155",
                'map_zoom' => "12",
                'star_rate' => "4",
                'check_in_time' => "12:00AM",
                'check_out_time' => "11:00AM",
                'policy' => '[{"title":"Guarantee Policy","content":"- A valid credit card will be required upon booking;\r\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\r\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received."},{"title":"Children Policy","content":"- Child under 5-year old: free of charge.\r\n- Child from 5-year old to under 12-year old: surcharge $10\/person\/room\/night.\r\n- Child from 12-year old or extra Adult: surcharge $15\/person\/room\/night."},{"title":"Cancellation\/Amendment Policy","content":"- If cancellation\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\r\n- If cancellation\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\u2019s room rate and tax will be charged\r\n- In case of no-show, 100% room rate and tax will be charged.\r\n- Early Bird\/Long Stay\/Last Min\/Package Rates are Non - changeable & Non - refundable"},{"title":"Late check-out policy","content":"- Late check-out is subject to room availability\r\n- 12:00 to 17:00 check-out: 50% room rate surcharge\r\n- After 17:00 check-out: 100% room rate surcharge"}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
            ]);


        foreach ($IDs as $numer_key => $hotel){
            $vendor_id = $IDs_vendor[$numer_key];
            for ($i = 1 ; $i <= 5 ; $i++){
                if( rand(1,5) == $i) continue;
                if( rand(1,5) == $i) continue;
                $metaReview = [];
                $list_meta = [
                    "Sleep",
                    "Location",
                    "Service",
                    "Clearness",
                    "Rooms",
                ];
                $total_point = 0;
                foreach ($list_meta as $key => $value) {
                    $point = rand(4,5);
                    $total_point += $point;
                    $metaReview[] = [
                        "object_id"    => $hotel,
                        "object_model" => "hotel",
                        "name"         => $value,
                        "val"          => $point,
                        "create_user"  => "1",
                    ];
                }
                $rate = round($total_point / count($list_meta), 1);
                if ($rate > 5) $rate = 5;
                $titles = ["Beautiful spot with a lovely view","Good location, quality should be better","Nothing good this time","Easy way to discover the city"];
                $review = new Review([
                    "object_id"    => $hotel,
                    "object_model" => "hotel",
                    "title"        => $titles[rand(0, 3)],
                    "content"      => "Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te",
                    "rate_number"  => $rate,
                    "author_ip"    => "127.0.0.1",
                    "status"       => "approved",
                    "publish_date" => date("Y-m-d H:i:s"),
                    'create_user' => rand(7,16),
                    'vendor_id' => $vendor_id,
                ]);
                if ($review->save()) {
                    if (!empty($metaReview)) {
                        foreach ($metaReview as $meta) {
                            $meta['review_id'] = $review->id;
                            $reviewMeta = new ReviewMeta($meta);
                            $reviewMeta->save();
                        }
                    }
                }
            }
        }

        $attr = new Attributes([
            'name'=>'Facilities',
            'service'=>'hotel'
        ]);
        $attr->save();
        $term_ids = [];
        $icons = ['icofont-wall-clock','icofont-car-alt-3','icofont-bicycle-alt-2','icofont-imac','icofont-recycle-alt','icofont-wifi-alt','icofont-tea'];
        foreach (['Wake-up call','Car hire','Bicycle hire','Flat Tv','Laundry and dry cleaning','Internet – Wifi','Coffee and tea'] as $key=>$term){
            $term = new Terms([
                'name'=>$term,
                'attr_id'=>$attr->id,
                'icon'=>$icons[$key]
            ]);
            $term->save();
            $term_ids[] = $term->id;
        }
        foreach ($IDs as $hotel_id){
            foreach ($term_ids as $k=>$term_id) {
                if( rand(0 , count($term_ids) ) == $k) continue;

                HotelTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $hotel_id
                ]);
            }
        }

        $attr = new Attributes([
            'name'=>'Hotel Service',
            'service'=>'hotel'
        ]);
        $attr->save();
        $term_ids = [];
        foreach (['Havana Lobby bar','Fiesta Restaurant','Hotel transport services','Free luggage deposit','Laundry Services','Pets welcome' ,'Tickets'] as $term){
            $term = new Terms([
                'name'=>$term,
                'attr_id'=>$attr->id
            ]);
            $term->save();
            $term_ids[] = $term->id;
        }
        foreach ($IDs as $hotel_id){
            foreach ($term_ids as $k=>$term_id) {
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                HotelTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $hotel_id
                ]);
            }
        }


        // Add Room for Hotel
        foreach ($IDs as $numer_key => $hotel_id){
            $vendor_id = $IDs_vendor[$numer_key];
            $IDs_room[] = DB::table('bravo_hotel_rooms')->insertGetId(
                [
                    'title' => 'Room Kerama Islands',
                    'content' => "Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.",
                    'image_id' => MediaFile::findMediaByName("space-5")->id,
                    'gallery' => implode(",",$list_gallery),
                    'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                    'price' => "350",
                    'parent_id' => $hotel_id,
                    'number' => rand(5,10),
                    'beds' => rand(2,5),
                    'size' => "200",
                    'adults' => rand(5,10),
                    'children' => rand(1,5),
                    'status' => "publish",
                    'create_user' => $vendor_id,
                    'created_at' =>  date("Y-m-d H:i:s"),
                ]);
            $IDs_room[] = DB::table('bravo_hotel_rooms')->insertGetId(
                [
                    'title' => 'Room Sheraton Hotel',
                    'content' => "Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.",
                    'image_id' => MediaFile::findMediaByName("space-7")->id,
                    'gallery' => implode(",",$list_gallery),
                    'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                    'price' => "350",
                    'parent_id' => $hotel_id,
                    'number' => rand(5,10),
                    'beds' => rand(2,5),
                    'size' => "200",
                    'adults' => rand(5,10),
                    'children' => rand(1,5),
                    'status' => "publish",
                    'create_user' => $vendor_id,
                    'created_at' =>  date("Y-m-d H:i:s"),
                ]);
            $IDs_room[] = DB::table('bravo_hotel_rooms')->insertGetId(
                [
                    'title' => 'Double Room With Town View',
                    'content' => "Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.",
                    'image_id' => MediaFile::findMediaByName("space-2")->id,
                    'gallery' => implode(",",$list_gallery),
                    'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                    'price' => "350",
                    'parent_id' => $hotel_id,
                    'number' => rand(5,10),
                    'beds' => rand(2,5),
                    'size' => "200",
                    'adults' => rand(5,10),
                    'children' => rand(1,5),
                    'status' => "publish",
                    'create_user' => $vendor_id,
                    'created_at' =>  date("Y-m-d H:i:s"),
                ]);
            $IDs_room[] = DB::table('bravo_hotel_rooms')->insertGetId(
                [
                    'title' => 'Standard Double Room',
                    'content' => "Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.",
                    'image_id' => MediaFile::findMediaByName("space-1")->id,
                    'gallery' => implode(",",$list_gallery),
                    'video' => "https://www.youtube.com/watch?v=bhOiLfkChPo",
                    'price' => "350",
                    'parent_id' => $hotel_id,
                    'number' => rand(5,10),
                    'beds' => rand(2,5),
                    'size' => "200",
                    'adults' => rand(5,10),
                    'children' => rand(1,5),
                    'status' => "publish",
                    'create_user' => $vendor_id,
                    'created_at' =>  date("Y-m-d H:i:s"),
                ]);
        }

        $attr = new Attributes([
            'name'=>'Room Amenities',
            'service'=>'hotel_room'
        ]);
        $attr->save();
        $term_ids = [];
        $icons = ['icofont-wall-clock','icofont-imac','icofont-recycle-alt','icofont-wifi-alt','icofont-tea'];
        foreach (['Wake-up call','Flat Tv','Laundry and dry cleaning','Internet – Wifi','Coffee and tea'] as $key=>$term){
            $term = new Terms([
                'name'=>$term,
                'attr_id'=>$attr->id,
                'icon'=>$icons[$key]
            ]);
            $term->save();
            $term_ids[] = $term->id;
        }
        foreach ($IDs_room as $room_id){
            foreach ($term_ids as $k=>$term_id) {
                if( rand(0 , count($term_ids) ) == $k) continue;
                HotelRoomTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $room_id
                ]);
            }
        }

        // Settings
        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'hotel_page_search_title',
                    'val' => 'Search for hotel',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_page_search_banner',
                    'val' => MediaFile::findMediaByName("banner-search-hotel")->id,
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_layout_item_search',
                    'val' => 'list',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_attribute_show_in_listing_page',
                    'val' => Attributes::where("name","Facilities")->where("service","hotel")->first()->id ?? "",
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_layout_search',
                    'val' => 'normal',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_enable_review',
                    'val' => '1',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_review_approved',
                    'val' => '0',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_review_stats',
                    'val' => '[{"title":"Service"},{"title":"Organization"},{"title":"Friendliness"},{"title":"Area Expert"},{"title":"Safety"}]',
                    'group' => "hotel",
                ],
                [
                    'name' => 'hotel_booking_buyer_fees',
                    'val' => '[{"name":"Service fee","desc":"This helps us run our platform and offer services like 24\/7 support on your trip.","name_ja":"\u30b5\u30fc\u30d3\u30b9\u6599","desc_ja":"\u3053\u308c\u306b\u3088\u308a\u3001\u5f53\u793e\u306e\u30d7\u30e9\u30c3\u30c8\u30d5\u30a9\u30fc\u30e0\u3092\u5b9f\u884c\u3057\u3001\u65c5\u884c\u4e2d\u306b","price":"100","type":"one_time"}]',
                    'group' => "hotel",
                ]
            ]
        );
    }
}
