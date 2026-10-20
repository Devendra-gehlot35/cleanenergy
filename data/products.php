<?php
// Centralized Product Catalog for CleanEnergy
// Exact 5 official products from cleanergybattery.com
// Used across shop.php, components/best-selling.php, product-detail.php, and category-page.php

if (!isset($all_collections)) {
    $all_collections = [
        'marine' => [
            'slug' => 'marine',
            'title' => 'Marine Batteries',
            'short_title' => 'Marine',
            'desc' => 'LiFePO4 and sodium-ion battery solutions for boats, marine engines, onboard electronics and reliable power on the water.'
        ],
        'fishing-boat' => [
            'slug' => 'fishing-boat',
            'title' => 'Fishing Boat Batteries',
            'short_title' => 'Fishing Boat',
            'desc' => 'Deep-cycle battery systems for trolling motors, fish finders and extended fishing trips with dependable runtime and reduced maintenance.'
        ],
        'rv' => [
            'slug' => 'rv',
            'title' => 'RV Batteries',
            'short_title' => 'RV & Camper',
            'desc' => 'Lightweight lithium power for RVs and campers, supporting appliances, lighting, off-grid camping and long-distance travel.'
        ],
        'golf-cart' => [
            'slug' => 'golf-cart',
            'title' => 'Golf Cart Batteries',
            'short_title' => 'Golf Cart',
            'desc' => 'High-capacity 48V and 51.2V lithium battery systems designed for dependable golf cart range, power delivery and long service life.'
        ],
        'solar' => [
            'slug' => 'solar',
            'title' => 'Solar Batteries',
            'short_title' => 'Solar',
            'desc' => 'Efficient deep-cycle battery storage for solar energy systems, backup power and renewable energy applications.'
        ],
        'home-storage' => [
            'slug' => 'home-storage',
            'title' => 'Home Energy Storage',
            'short_title' => 'Home Storage',
            'desc' => 'High-capacity battery systems for home backup, solar integration and dependable stored energy when you need it most.'
        ],
        'off-grid' => [
            'slug' => 'off-grid',
            'title' => 'Off-Grid Batteries',
            'short_title' => 'Off-Grid',
            'desc' => 'Reliable LiFePO4 battery systems for cabins, remote sites and independent power setups where consistent energy matters.'
        ],
        'cold-weather' => [
            'slug' => 'cold-weather',
            'title' => 'Cold-Weather Batteries',
            'short_title' => 'Cold Weather',
            'desc' => 'Selected self-heating and sodium-ion battery options designed to support dependable performance in low-temperature conditions.'
        ],
    ];
}

if (!function_exists('normalize_collection_slug')) {
    function normalize_collection_slug($input) {
        $slug = strtolower(trim((string)$input));
        $slug = str_replace([' batteries', ' battery', ' '], ['', '', '-'], $slug);
        
        $aliases = [
            'marine' => 'marine',
            'marine-batteries' => 'marine',
            'fishing' => 'fishing-boat',
            'fishing-boat' => 'fishing-boat',
            'fishing-boat-batteries' => 'fishing-boat',
            'rv' => 'rv',
            'rv-batteries' => 'rv',
            'camper' => 'rv',
            'golf' => 'golf-cart',
            'golf-cart' => 'golf-cart',
            'golf-cart-batteries' => 'golf-cart',
            'solar' => 'solar',
            'solar-batteries' => 'solar',
            'home' => 'home-storage',
            'home-storage' => 'home-storage',
            'home-energy' => 'home-storage',
            'home-energy-storage' => 'home-storage',
            'off-grid' => 'off-grid',
            'offgrid' => 'off-grid',
            'off-grid-batteries' => 'off-grid',
            'cold' => 'cold-weather',
            'cold-weather' => 'cold-weather',
            'cold-weather-batteries' => 'cold-weather',
            'sodium' => 'sodium-ion',
            'sodium-ion' => 'sodium-ion',
            'sodium-ion-batteries' => 'sodium-ion',
        ];
        
        return $aliases[$slug] ?? $slug;
    }
}

if (!isset($all_products)) {
    $all_products = [
        1 => [
            'id' => 1,
            'handle' => 'cranking-sodium-ion-battery',
            'name' => 'Sodium Ion Starting Battery 12V, 200Ah',
            'title' => 'Sodium Ion Starting Battery 12V, 200Ah',
            'category' => 'Sodium - Ion',
            'collections' => ['marine', 'fishing-boat', 'cold-weather', 'sodium-ion', 'off-grid'],
            'desc' => 'The Cranking Sodium Battery is designed for high-demand engines, marine applications, and vehicles that need powerful and dependable cold-weather power.',
            'lead_desc' => 'The <strong class="text-slate-900 font-bold">Cranking Sodium Battery</strong> is designed for high-demand engines, marine applications, and other vehicles that need a powerful and dependable power source.',
            'price' => '$251.95',
            'price_num' => 251.95,
            'original_price' => '$801.89',
            'old_price' => 801.89,
            'rating' => 4.9,
            'image' => 'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/sodium-ion-starting-battery-12v-200ah-320.webp?v=1781768632',
            'gallery' => [
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/sodium-ion-starting-battery-12v-200ah-320.webp?v=1781768632',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/sodium-ion-starting-battery-12v-200ah-766.webp?v=1781768637',
            ],
            'in_stock' => true,
            'link' => '/product-detail.php?id=1',
            'specs' => [
                'Nominal Voltage' => '12V',
                'Rated Capacity' => '200Ah / 2,400Wh',
                'Cold Cranking Amps (CCA)' => '1300 CCA',
                'Weight' => '25 lbs (60% lighter than SLA)',
                'Charging Voltage' => '14.6V',
                'Continuous Discharge' => '100A',
                'Chemistry' => 'Sodium-Ion (Na-Ion) Grade A',
                'Terminals' => 'M8 / F12 Screw-in',
            ],
            'features' => [
                'High 1300 CCA cold cranking power ensures reliable engine ignition in frigid conditions.',
                'At only 25 lbs, it is 60% lighter than standard SLA batteries for easy handling and installation.',
                'Provides 200Ah capacity and 2,400Wh energy for extended use without sacrificing power.',
                'Supports continuous charge and discharge up to 100A with stable 12V output.'
            ]
        ],
        2 => [
            'id' => 2,
            'handle' => '51-2-v-300-ah-15-kwh-lithium-battery',
            'name' => '51.2V 300Ah 15.3Kwh Lithium Phosphate Home Power Storage Battery',
            'title' => '51.2V 300Ah 15.3Kwh Lithium Phosphate Home Power Storage Battery',
            'category' => 'Lithium Phosphate',
            'collections' => ['home-storage', 'solar', 'off-grid'],
            'desc' => 'Colorful LCD touch screen and WiFi compatible with most inverters (Victron, Solis, Growatt). Longer 6000~11000 cycle life with built-in aerosol fire suppression.',
            'lead_desc' => 'High-capacity 51.2V 300Ah (15.36kWh) energy storage with smart BMS, built-in wheels for mobility, and seamless hybrid solar inverter integration.',
            'price' => '$1,792.45',
            'price_num' => 1792.45,
            'original_price' => '$2,358.49',
            'old_price' => 2358.49,
            'rating' => 5.0,
            'image' => 'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-946.webp?v=1781768581',
            'gallery' => [
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-946.webp?v=1781768581',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-349.webp?v=1781768586',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/51-2v-300ah-15-3kwh-lithium-phosphate-home-power-storage-battery-182.webp?v=1781768595',
            ],
            'in_stock' => true,
            'link' => '/product-detail.php?id=2',
            'specs' => [
                'Rated Voltage' => '51.2V',
                'Rated Capacity' => '300Ah',
                'Rated Energy' => '15.36kWh',
                'Output Voltage Range' => '43.2V ~ 58.4V',
                'Max Discharging Current' => '150A',
                'Efficiency' => '>98%',
                'Dimension (L*W*H)' => '820 * 460 * 280 mm',
                'Weight' => '110 kg',
                'Cycle Life' => '>6000 times (80% DOD)',
                'Design Life' => '>10 years',
            ],
            'features' => [
                'Easily movable with built-in heavy-duty wheels for unmatched convenience.',
                'Abundant 51.2V 300Ah (15.36kWh) capacity ensures long-lasting residential energy backup.',
                'Equipped with built-in safeguards and built-in aerosol fire suppression system.',
                'Colorful LCD touch screen and WiFi monitoring from anywhere.'
            ]
        ],
        3 => [
            'id' => 3,
            'handle' => 'lithium-phosphate-48v-52v-105ah-5-460-wh',
            'name' => 'Lithium Phosphate 51.2V 105Ah 5,460Wh',
            'title' => 'Lithium Phosphate 51.2V 105Ah 5,460Wh',
            'category' => 'Lithium Phosphate',
            'collections' => ['golf-cart', 'rv', 'solar', 'off-grid'],
            'desc' => 'High-performance 5,460Wh LiFePO4 battery pack designed for golf carts and RVs, offering lightweight, reliable energy and fire-separation lining.',
            'lead_desc' => 'The <strong class="text-slate-900 font-bold">Cleanergy Lithium Phosphate 48V-52V 105Ah 5,460Wh</strong> battery is engineered for golf carts, RVs, and off-grid adventures with exceptional safety features.',
            'price' => '$801.89',
            'price_num' => 801.89,
            'original_price' => '$1,084.91',
            'old_price' => 1084.91,
            'rating' => 4.9,
            'image' => 'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-51-2v-105ah-5-460wh-battery-105.webp?v=1781768559',
            'gallery' => [
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-51-2v-105ah-5-460wh-battery-105.webp?v=1781768559',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-51-2v-105ah-5-460wh-battery-453.webp?v=1781768564',
            ],
            'in_stock' => true,
            'link' => '/product-detail.php?id=3',
            'specs' => [
                'Voltage' => '48V - 52V (51.2V)',
                'Capacity' => '105Ah',
                'Total Energy' => '5,460Wh',
                'Cells' => '16S Cells',
                'Charge Temp' => '0℃ ~ +65℃',
                'Discharge Temp' => '-20℃ ~ +65℃',
                'Dimensions' => '20 x 12 x 12 inches',
                'Chemistry' => 'LiFePO4 (Lithium Iron Phosphate)',
            ],
            'features' => [
                '5,460Wh capacity perfect for golf carts, increasing speed, torque, and operating range.',
                'Features fire-separation lining and thermal stability even under extreme temperatures.',
                'Waterproof and vibration resistant, ideal for golf carts, marine, and RV setups.',
                'Over 300 lbs lighter than stock lead-acid batteries with zero fluid maintenance.'
            ]
        ],
        4 => [
            'id' => 4,
            'handle' => 'heated-lithium-phosphate-24v-100ah-2400-wh',
            'name' => 'Lithium Phosphate 24V 100Ah 2,400Wh Battery',
            'title' => 'Lithium Phosphate 24V 100Ah 2,400Wh Battery',
            'category' => 'Lithium Phosphate',
            'collections' => ['fishing-boat', 'marine', 'solar', 'rv', 'cold-weather', 'off-grid'],
            'desc' => 'High-performance 24V 100Ah 2,400Wh deep-cycle battery with over 2000 cycles, engineered for trolling motors, fishing boats, and marine power.',
            'lead_desc' => 'Our <strong class="text-slate-900 font-bold">Lithium Phosphate 24V 100Ah 2,400Wh</strong> battery offers exceptional endurance and safety for marine trolling motors, solar systems, and backup power.',
            'price' => '$518.87',
            'price_num' => 518.87,
            'original_price' => '$801.89',
            'old_price' => 801.89,
            'rating' => 4.9,
            'image' => 'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-24v-100ah-2-400wh-battery-sodium-ion-835.webp?v=1787945859',
            'gallery' => [
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-24v-100ah-2-400wh-battery-sodium-ion-835.webp?v=1787945859',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-24v-100ah-2-400wh-battery-sodium-ion-666.webp?v=1787945862',
            ],
            'in_stock' => true,
            'link' => '/product-detail.php?id=4',
            'specs' => [
                'Voltage' => '24V',
                'Capacity' => '100Ah',
                'Energy Storage' => '2,400Wh',
                'Cells' => '8S Cells',
                'Cycle Life' => 'Over 2,000 Cycles',
                'Charge Temp' => '0℃ ~ +65℃',
                'Discharge Temp' => '-20℃ ~ +65℃',
                'Dimensions' => '20 x 8 x 12 inches',
            ],
            'features' => [
                '2,400Wh capacity delivers long runtime for high-thrust 24V trolling motors and fishing boats.',
                'Over 2,000 cycles with greater thermal stability and zero risk of thermal runaway.',
                'Operates efficiently in temperatures from -20°C to +65°C.',
                'Low maintenance and compact drop-in replacement for two heavy 12V batteries.'
            ]
        ],
        5 => [
            'id' => 5,
            'handle' => 'lithium-phosphate-12v-100ah-1-200wh-battery',
            'name' => 'Lithium Phosphate 12V 100Ah 1,200Wh Battery',
            'title' => 'Lithium Phosphate 12V 100Ah 1,200Wh Battery',
            'category' => 'Lithium Phosphate',
            'collections' => ['marine', 'fishing-boat', 'rv', 'solar', 'off-grid'],
            'desc' => 'Dependable 12V 100Ah 1,200Wh deep-cycle battery with 4000+ cycles, 4S cell structure, and fire-separation lining for boats, RVs, and solar.',
            'lead_desc' => 'Introducing the <strong class="text-slate-900 font-bold">Lithium Phosphate 12V 100Ah 1,200Wh</strong> battery – a high-performance, reliable, and safe energy solution for marine trolling motors, RVs, and solar power.',
            'price' => '$251.85',
            'price_num' => 251.85,
            'original_price' => '$400.94',
            'old_price' => 400.94,
            'rating' => 4.9,
            'image' => 'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-12v-100ah-1-200wh-battery-753.webp?v=1787945808',
            'gallery' => [
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-12v-100ah-1-200wh-battery-753.webp?v=1787945808',
                'https://cdn.shopify.com/s/files/1/0739/1887/3849/files/lithium-phosphate-12v-100ah-1-200wh-battery-485.webp?v=1787945812',
            ],
            'in_stock' => true,
            'link' => '/product-detail.php?id=5',
            'specs' => [
                'Voltage' => '12V',
                'Capacity' => '100Ah',
                'Energy Storage' => '1,200Wh (1,250Wh)',
                'Cells' => '4S Cells',
                'Cycle Life' => '4,000+ Cycles',
                'Charge Temp' => '0℃ ~ +65℃',
                'Discharge Temp' => '-20℃ ~ +65℃',
                'Dimensions' => '13 x 8 x 12 inches',
                'Chemistry' => 'LiFePO4 (Grade A EV Cells)',
            ],
            'features' => [
                'Rechargeable over 4,000 times for long-term eco-friendly performance.',
                'Built-in thermal stability and fire-separation lining for superior device and vessel safety.',
                'Waterproof and vibration-proof design ideal for outdoor, marine, and mobile setups.',
                'Fast charging support with consistent stable voltage delivery until fully depleted.'
            ]
        ],
    ];
}

if (!function_exists('get_product_by_id')) {
    function get_product_by_id($id) {
        global $all_products;
        $id = (int)$id;
        return $all_products[$id] ?? $all_products[1];
    }
}
