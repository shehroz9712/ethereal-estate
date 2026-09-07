<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\FloorPlan;
use App\Models\Inquiry;
use App\Models\Location;
use App\Models\NewsletterSubscriber;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@etherealestates.ca'],
            [
                'name' => 'Nakul Sood',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '+1 (437) 376-7611',
                'status' => 'active',
            ]
        );

        $client = User::firstOrCreate(
            ['email' => 'user@etherealestates.ca'],
            [
                'name' => 'Alexander Wright',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '+1 (416) 555-0192',
                'status' => 'active',
            ]
        );

        // 2. Categories
        $catPrecon = Category::firstOrCreate(['slug' => 'pre-construction'], ['name' => 'Pre-Construction', 'description' => 'Exclusive pre-construction master-planned communities across Ontario.']);
        $catDetached = Category::firstOrCreate(['slug' => 'single-detached'], ['name' => 'Single Detached Homes', 'description' => 'Expansive luxury single family estate residences.']);
        $catTownhome = Category::firstOrCreate(['slug' => 'townhomes'], ['name' => 'Townhomes', 'description' => 'Modern multi-level townhomes with rooftop terraces.']);
        $catBungalow = Category::firstOrCreate(['slug' => 'bungalows'], ['name' => 'Bungalows', 'description' => 'Contemporary single-level living crafted with premium finishes.']);

        // 3. Locations
        $locBowmanville = Location::firstOrCreate(['slug' => 'bowmanville'], ['city' => 'Bowmanville', 'province' => 'ON', 'region' => 'Durham Region', 'is_featured' => true]);
        $locOshawa = Location::firstOrCreate(['slug' => 'oshawa'], ['city' => 'Oshawa', 'province' => 'ON', 'region' => 'Durham Region', 'is_featured' => true]);
        $locWhitby = Location::firstOrCreate(['slug' => 'whitby'], ['city' => 'Whitby', 'province' => 'ON', 'region' => 'Durham Region', 'is_featured' => true]);
        $locAjax = Location::firstOrCreate(['slug' => 'ajax'], ['city' => 'Ajax', 'province' => 'ON', 'region' => 'Durham Region', 'is_featured' => true]);
        $locMississauga = Location::firstOrCreate(['slug' => 'mississauga'], ['city' => 'Mississauga', 'province' => 'ON', 'region' => 'Peel Region', 'is_featured' => true]);
        $locAurora = Location::firstOrCreate(['slug' => 'aurora'], ['city' => 'Aurora', 'province' => 'ON', 'region' => 'York Region', 'is_featured' => true]);
        $locKingCity = Location::firstOrCreate(['slug' => 'king-city'], ['city' => 'King City', 'province' => 'ON', 'region' => 'York Region', 'is_featured' => true]);

        // 4. Properties
        $propertiesData = [
            [
                'title' => 'Orchard South',
                'slug' => 'orchard-south',
                'category_id' => $catPrecon->id,
                'location_id' => $locBowmanville->id,
                'city' => 'Bowmanville',
                'address' => 'Middle Road & Concession Road 3',
                'price' => 999900.00,
                'price_label' => 'Starting from $999,900*',
                'status' => 'selling_fast',
                'property_type' => 'Single Detached',
                'bedrooms' => 4,
                'bathrooms' => 6.0,
                'garage' => 1,
                'sqft' => 1400,
                'balcony' => 8,
                'short_description' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
                'full_description' => "Following the incredible success of Orchard West, Orchard East, and Eden Towns — each successfully sold out — Ethereal Estates proudly presents Orchard South. A signature collection of bungalows and expansive single-detached family homes nestled in the heart of Durham Region.\n\nExperience the tranquility of Bowmanville's natural surroundings with direct access to parks, golf courses, and conservation reserves. Just minutes from Historic Downtown Bowmanville, you'll enjoy top-rated schools, charming restaurants, and convenient boutique shopping. With the Highway 407 extension and rapid transit connections, traveling to the Greater Toronto Area has never been more seamless.",
                'feature_line' => 'Detached home with a double garage.',
                'latitude' => 43.9043000,
                'longitude' => -78.6873000,
                'developer' => 'Treasure Hill Homes',
                'model_home_address' => '132 Ronald Hooper Ave, Bowmanville, L1C 3K2',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2026',
                'is_featured' => true,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 1,
                'images' => [
                    'assets/images/prop-orchard-south.jpg',
                    'assets/images/prop-chateau9.jpg',
                    'assets/images/prop-mirra.jpg',
                    'assets/images/about-interior.jpg',
                ],
            ],
            [
                'title' => 'Chateau 9',
                'slug' => 'chateau-9',
                'category_id' => $catPrecon->id,
                'location_id' => $locBowmanville->id,
                'city' => 'Bowmanville',
                'address' => 'North Scugog Court & Regional 57',
                'price' => 1150000.00,
                'price_label' => 'Starting from $1,150,000*',
                'status' => 'selling_fast',
                'property_type' => 'Single Detached',
                'bedrooms' => 4,
                'bathrooms' => 6.0,
                'garage' => 1,
                'sqft' => 1400,
                'balcony' => 8,
                'short_description' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
                'full_description' => "Chateau 9 represents French country elegance reimagined for contemporary Canadian family life. Featuring soaring 10-foot main floor ceilings, expansive floor-to-ceiling windows, and private lot configurations backing onto protected ravine spaces.",
                'feature_line' => 'Corner lot with a walkout basement.',
                'latitude' => 43.9120000,
                'longitude' => -78.6720000,
                'developer' => 'Ethereal Signature Developments',
                'model_home_address' => '88 Chateau Court, Bowmanville, ON',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2026',
                'is_featured' => true,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 2,
                'images' => [
                    'assets/images/prop-chateau9.jpg',
                    'assets/images/prop-mirra.jpg',
                    'assets/images/prop-orchard-south.jpg',
                ],
            ],
            [
                'title' => 'Ellia at Unity',
                'slug' => 'ellia-at-unity',
                'category_id' => $catBungalow->id,
                'location_id' => $locBowmanville->id,
                'city' => 'Bowmanville',
                'address' => 'Unity Trail & Liberty Street North',
                'price' => 899900.00,
                'price_label' => 'Starting from $899,900*',
                'status' => 'upcoming',
                'property_type' => 'Bungalow',
                'bedrooms' => 4,
                'bathrooms' => 6.0,
                'garage' => 1,
                'sqft' => 1400,
                'balcony' => 8,
                'short_description' => 'Bungalows and Single Detached Homes with 2 & 3-Car Garages',
                'full_description' => "A boutique enclave designed specifically for discerning buyers seeking single-level comfort without compromising on architectural grandeur or luxury specifications.",
                'feature_line' => 'South-facing terrace with unobstructed views.',
                'latitude' => 43.8980000,
                'longitude' => -78.6600000,
                'developer' => 'Treasure Hill Homes',
                'model_home_address' => 'Unity Presentation Gallery, Bowmanville',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2027',
                'is_featured' => false,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 3,
                'images' => [
                    'assets/images/prop-mirra.jpg',
                    'assets/images/prop-orchard-south.jpg',
                    'assets/images/prop-chateau9.jpg',
                ],
            ],
            [
                'title' => 'Mirra Townhomes',
                'slug' => 'mirra-townhomes',
                'category_id' => $catTownhome->id,
                'location_id' => $locOshawa->id,
                'city' => 'Oshawa',
                'address' => 'Taunton Road East & Harmony Road',
                'price' => 749900.00,
                'price_label' => 'Starting from $749,900*',
                'status' => 'selling_fast',
                'property_type' => 'Townhome',
                'bedrooms' => 4,
                'bathrooms' => 6.0,
                'garage' => 1,
                'sqft' => 1400,
                'balcony' => 8,
                'short_description' => 'Modern townhomes with expansive rooftop terraces and designer kitchens',
                'full_description' => "Mirra introduces progressive townhome architecture to North Oshawa. Every residence features open-concept living, dual underground parking spaces, and private sky terraces engineered for year-round entertaining.",
                'feature_line' => 'Modern townhomes with expansive rooftop terraces.',
                'latitude' => 43.8971000,
                'longitude' => -78.8658000,
                'developer' => 'Ethereal Urban Living',
                'model_home_address' => '210 Mirra Way, Oshawa, ON',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2026',
                'is_featured' => true,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 4,
                'images' => [
                    'assets/images/prop-mirra.jpg',
                    'assets/images/prop-orchard-south.jpg',
                    'assets/images/prop-chateau9.jpg',
                ],
            ],
            [
                'title' => 'Highland Reserve',
                'slug' => 'highland-reserve',
                'category_id' => $catDetached->id,
                'location_id' => $locWhitby->id,
                'city' => 'Whitby',
                'address' => 'Country Lane & Taunton Road West',
                'price' => 1450000.00,
                'price_label' => 'Starting from $1,450,000*',
                'status' => 'for_sale',
                'property_type' => 'Single Detached',
                'bedrooms' => 5,
                'bathrooms' => 5.0,
                'garage' => 3,
                'sqft' => 3600,
                'balcony' => 5,
                'short_description' => 'Scenic hillside community with sweeping Lake Ontario views',
                'full_description' => "Highland Reserve sits atop Whitby's scenic ridgeline. Offering 50-foot and 60-foot estate lots surrounded by mature hardwood forests and connected to over 15 kilometers of private community trails.",
                'feature_line' => 'Private backyard backing onto green space.',
                'latitude' => 43.8975000,
                'longitude' => -78.9417000,
                'developer' => 'Ethereal Estates & Partners',
                'model_home_address' => '45 Highland Ridge, Whitby, ON',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2026',
                'is_featured' => true,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 5,
                'images' => [
                    'assets/images/prop-chateau9.jpg',
                    'assets/images/prop-mirra.jpg',
                    'assets/images/prop-orchard-south.jpg',
                ],
            ],
            [
                'title' => 'Orchard West',
                'slug' => 'orchard-west',
                'category_id' => $catDetached->id,
                'location_id' => $locAjax->id,
                'city' => 'Ajax',
                'address' => 'Rossland Road West & Westney Road',
                'price' => 1050000.00,
                'price_label' => 'Starting from $1,050,000*',
                'status' => 'sold_out',
                'property_type' => 'Single Detached',
                'bedrooms' => 4,
                'bathrooms' => 6.0,
                'garage' => 1,
                'sqft' => 1400,
                'balcony' => 8,
                'short_description' => 'Master-planned neighborhood with parks, top schools and modern family recreation',
                'full_description' => "The premier community that established our benchmark for excellence in West Durham. Fully sold out with all phases delivered ahead of schedule.",
                'feature_line' => 'Master-planned neighborhood with top schools and parks.',
                'latitude' => 43.8510000,
                'longitude' => -79.0300000,
                'developer' => 'Treasure Hill',
                'model_home_address' => 'Ajax Community Sales Center',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2025',
                'is_featured' => true,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 6,
                'images' => [
                    'assets/images/prop-orchard-south.jpg',
                    'assets/images/prop-chateau9.jpg',
                    'assets/images/prop-mirra.jpg',
                ],
            ],
            [
                'title' => 'Bayview Trail',
                'slug' => 'bayview-trail',
                'category_id' => $catDetached->id,
                'location_id' => $locAurora->id,
                'city' => 'Aurora',
                'address' => 'Bayview Avenue & Vandorf Sideroad',
                'price' => 1650000.00,
                'price_label' => 'Starting from $1,650,000*',
                'status' => 'for_sale',
                'property_type' => 'Single Detached',
                'bedrooms' => 4,
                'bathrooms' => 5.0,
                'garage' => 2,
                'sqft' => 3200,
                'balcony' => 2,
                'short_description' => "36', 40' & 60' Luxury Detached homes in prestigious Aurora",
                'full_description' => "An extraordinary collection of grand detached homes nestled alongside protected conservation lands in Aurora.",
                'feature_line' => "36', 40' & 60' Luxury Detached in Prime Aurora.",
                'latitude' => 44.0065000,
                'longitude' => -79.4504000,
                'developer' => 'Treasure Hill Homes',
                'model_home_address' => 'Aurora Presentation Centre',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2026',
                'is_featured' => false,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 7,
                'images' => [
                    'assets/images/prop-chateau9.jpg',
                    'assets/images/prop-orchard-south.jpg',
                ],
            ],
            [
                'title' => 'Eversley Estates',
                'slug' => 'eversley-estates',
                'category_id' => $catDetached->id,
                'location_id' => $locKingCity->id,
                'city' => 'King City',
                'address' => 'Dufferin Street & 15th Sideroad',
                'price' => 2800000.00,
                'price_label' => 'Starting from $2,800,000*',
                'status' => 'for_sale',
                'property_type' => 'Single Detached',
                'bedrooms' => 5,
                'bathrooms' => 6.0,
                'garage' => 3,
                'sqft' => 5500,
                'balcony' => 3,
                'short_description' => "42' & 62' Grand Estate Homes in rural King City grandeur",
                'full_description' => "Ultra-luxury custom-inspired estate residences situated on acre-caliber lots in Ontario's equestrian heartland.",
                'feature_line' => "42' & 62' Estate Homes in Prestigious King City.",
                'latitude' => 43.9213000,
                'longitude' => -79.5292000,
                'developer' => 'Treasure Hill Homes',
                'model_home_address' => 'King City Estate Gallery',
                'sales_centre_phone' => '+1 (437) 376-7611',
                'completion_year' => '2027',
                'is_featured' => false,
                'is_preconstruction' => true,
                'is_mls' => false,
                'is_active' => true,
                'sort_order' => 8,
                'images' => [
                    'assets/images/prop-orchard-south.jpg',
                    'assets/images/prop-mirra.jpg',
                ],
            ],
        ];

        foreach ($propertiesData as $pData) {
            $images = $pData['images'];
            unset($pData['images']);

            $property = Property::updateOrCreate(['slug' => $pData['slug']], $pData);

            // Seed images
            PropertyImage::where('property_id', $property->id)->delete();
            foreach ($images as $index => $img) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => $img,
                    'caption' => $property->title . ' - View ' . ($index + 1),
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }

            // Seed floor plans for Orchard South
            if ($property->slug === 'orchard-south') {
                FloorPlan::where('property_id', $property->id)->delete();
                FloorPlan::create([
                    'property_id' => $property->id,
                    'lot_collection' => "33' Collection",
                    'elevation' => 'A / B',
                    'name' => 'The Willow',
                    'beds' => 4,
                    'baths' => 3.5,
                    'sqft' => 2240,
                    'description' => 'Single detached residence with expansive open-concept great room and premium finishes throughout.',
                ]);
                FloorPlan::create([
                    'property_id' => $property->id,
                    'lot_collection' => "38' Collection",
                    'elevation' => 'A / B / C',
                    'name' => 'The Highfield',
                    'beds' => 5,
                    'baths' => 4.5,
                    'sqft' => 2960,
                    'description' => 'Spacious family floor plan featuring gourmet chef kitchen, walk-in pantry, and private primary retreat.',
                ]);
                FloorPlan::create([
                    'property_id' => $property->id,
                    'lot_collection' => "45' Collection",
                    'elevation' => 'A / B',
                    'name' => 'The Estate',
                    'beds' => 5,
                    'baths' => 5.0,
                    'sqft' => 3600,
                    'description' => 'Grand luxury layout with 10-foot ceilings, three-car garage, and spa-inspired ensuite with heated floors.',
                ]);
            }
        }

        // Save a property to user favorites
        $orchard = Property::where('slug', 'orchard-south')->first();
        if ($orchard && $client) {
            $client->savedProperties()->syncWithoutDetaching([$orchard->id]);
        }

        // 5. Articles (Ethereal Edit / Market Insights)
        $articles = [
            [
                'title' => "Discover Ethereal Estates's New Release at Palmetto",
                'slug' => 'discover-new-release-at-palmetto',
                'category' => 'Community Launch',
                'excerpt' => 'North Oshawa is fast becoming a destination for those seeking master-planned communities, top-ranked schools, and direct transit access.',
                'content' => "North Oshawa is fast becoming a destination for those seeking modern luxury connected to nature. Palmetto represents our newest release, where expansive detached homes meet thoughtfully landscaped parks and rapid 407 connectivity.\n\nFrom artisan bakeries in the historic core to weekend recreation along the valley trails, Palmetto offers families an exceptional balance of calm and convenience.",
                'image_url' => 'assets/images/news-art-1.jpg',
                'published_at' => '2026-04-13',
            ],
            [
                'title' => 'Ready. Set. Rebate! How to Maximize HST Savings on New Builds',
                'slug' => 'ready-set-rebate-hst-savings',
                'category' => 'Financial Strategy',
                'excerpt' => 'Understanding your rebate eligibility can make a meaningful difference in your home-buying journey. Calculate your savings before you buy.',
                'content' => "When purchasing pre-construction in Ontario, knowing the federal and provincial GST/HST new housing rebates can yield substantial savings.\n\nOur advisory team breaks down qualification criteria, rental rebate options for investors, and how to structure purchase contracts to ensure maximum capital efficiency.",
                'image_url' => 'assets/images/news-art-2.jpg',
                'published_at' => '2026-04-13',
            ],
            [
                'title' => 'Your Georgina Weekend Guide: 8 Things to Do Along Lake Simcoe',
                'slug' => 'georgina-weekend-guide',
                'category' => 'Lifestyle & Travel',
                'excerpt' => 'Escape the city and discover pristine beaches, lakeside dining, and boutique farmers markets just an hour north of Toronto.',
                'content' => "Georgina offers a rare blend of tranquil lakeside living and convenient accessibility. We've curated the ultimate weekend guide for exploring Lake Simcoe's shoreline.",
                'image_url' => 'assets/images/newsletter-cabin.jpg',
                'published_at' => '2026-04-13',
            ],
            [
                'title' => 'Ontario Pre-Construction Market Update: Q2 2026 Forecast',
                'slug' => 'ontario-pre-construction-market-update-2026',
                'category' => 'Market Insights',
                'excerpt' => 'Interest rate stabilization and population growth across the Greater Golden Horseshoe continue to drive demand for pre-construction freehold homes.',
                'content' => "With immigration targets remaining strong and infrastructure investments expanding transit into Durham and York regions, pre-construction investments continue to show robust fundamentals.",
                'image_url' => 'assets/images/news-hero.jpg',
                'published_at' => '2026-04-13',
            ],
            [
                'title' => '5 Reasons to Invest in Bowmanville Real Estate in 2026',
                'slug' => '5-reasons-to-invest-in-bowmanville',
                'category' => 'Investment Advisory',
                'excerpt' => 'With the GO Train extension, Highway 407 access, and exceptional value per square foot, Bowmanville is emerging as Durham Region’s premier growth corridor.',
                'content' => "Bowmanville offers investors and families alike a compelling opportunity. Unmatched value per square foot, proximity to Lake Ontario, and major civic investments make this market one to watch closely.",
                'image_url' => 'assets/images/prop-orchard-south.jpg',
                'published_at' => '2026-04-13',
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }

        // 6. Inquiries
        Inquiry::create([
            'user_id' => $client->id,
            'property_id' => $orchard->id ?? null,
            'type' => 'vip_registration',
            'first_name' => 'Alexander',
            'last_name' => 'Wright',
            'email' => 'user@etherealestates.ca',
            'phone' => '+1 (416) 555-0192',
            'message' => 'Interested in 38-foot collection lot availability and VIP price list.',
            'status' => 'new',
        ]);

        Inquiry::create([
            'user_id' => null,
            'type' => 'contact',
            'first_name' => 'Claire',
            'last_name' => 'Montgomery',
            'email' => 'claire.m@example.com',
            'phone' => '+1 (905) 441-2099',
            'postal_code' => 'L1C 3K2',
            'message' => 'Looking to book a private tour of the model home at Orchard South this Saturday afternoon.',
            'status' => 'contacted',
        ]);

        Inquiry::create([
            'user_id' => null,
            'type' => 'join_realtor',
            'first_name' => 'Marcus',
            'last_name' => 'Chen',
            'email' => 'mchen.realty@example.com',
            'phone' => '+1 (647) 902-3341',
            'message' => 'Realtor with 6 years experience in Durham Region pre-construction seeking to join the Ethereal advisory group.',
            'extra_data' => [
                'license_number' => 'RECO-4921048',
                'current_brokerage' => 'Century 21 Heritage',
                'years_experience' => '6 years',
            ],
            'status' => 'new',
        ]);

        // 7. Newsletter Subscribers
        NewsletterSubscriber::updateOrCreate(
            ['email' => 'office@etherealestates.ca'],
            ['first_name' => 'Ethereal', 'last_name' => 'Estates', 'is_active' => true]
        );
        NewsletterSubscriber::updateOrCreate(
            ['email' => 'investor.club@example.com'],
            ['first_name' => 'Ontario', 'last_name' => 'Investor', 'is_active' => true]
        );
    }
}
