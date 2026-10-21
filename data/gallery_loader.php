<?php
/**
 * Gallery Items Loader with Google Sheets Integration & Caching
 */

function get_default_gallery_items() {
    return [
        [
            'id' => 1,
            'title' => 'Marine & Yacht Deep-Water Power Bank',
            'category' => 'marine',
            'category_name' => 'Marine & Boats',
            'image' => '/assets/yacht-faq.png',
            'specs' => '51.2V 105Ah Lithium Iron Phosphate Bank',
            'desc' => 'High-reliability dual battery bank installation powering luxury catamaran house loads, radar, winches, and navigation systems with zero fumes or maintenance.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 2,
            'title' => 'Off-Grid Adventure Van Boondocking Setup',
            'category' => 'rv',
            'category_name' => 'RVs & Campers',
            'image' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?auto=format&fit=crop&w=1400&q=80',
            'specs' => '12.8V 300Ah High-Capacity System',
            'desc' => 'Custom campervan integration supporting high-draw induction cooktops, 12V air conditioning, and high-efficiency inverter charging during off-grid wilderness trips.',
            'badge_color' => 'bg-[#0ea5e9]'
        ],
        [
            'id' => 3,
            'title' => 'Residential Solar Clean Energy Storage Hub',
            'category' => 'solar',
            'category_name' => 'Solar & Home Energy',
            'image' => 'https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=1400&q=80',
            'specs' => '48V Multi-Unit Wall Bank',
            'desc' => 'Seamless whole-home backup and net-metering energy storage system paired with rooftop solar arrays for uninterruptible power during outages.',
            'badge_color' => 'bg-[#239B52]'
        ],
        [
            'id' => 4,
            'title' => 'All-Weather Mountain Cabin Energy Station',
            'category' => 'offgrid',
            'category_name' => 'Off-Grid & Cabins',
            'image' => 'https://images.unsplash.com/photo-1510798831971-661eb04b3739?auto=format&fit=crop&w=1400&q=80',
            'specs' => 'Self-Heating Cold Weather LiFePO4 Units',
            'desc' => 'Sub-zero capable lithium system providing consistent 120V/240V split-phase power for remote winter cabins in Northern Michigan with solar and generator sync.',
            'badge_color' => 'bg-[#12b3d6]'
        ],
        [
            'id' => 5,
            'title' => 'Commercial Electric Golf Cart & Utility Fleet',
            'category' => 'fleet',
            'category_name' => 'Specialized & Fleet',
            'image' => 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?auto=format&fit=crop&w=1400&q=80',
            'specs' => '48V 105Ah Drop-In Conversion',
            'desc' => 'Lightweight lithium conversion replacing bulky 6V lead-acid batteries, achieving 3x runtime, faster acceleration, and quick 2.5-hour recharge cycles.',
            'badge_color' => 'bg-[#0284c7]'
        ],
        [
            'id' => 6,
            'title' => 'Professional Bass Fishing Trolling Motor Bank',
            'category' => 'marine',
            'category_name' => 'Marine & Boats',
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1400&q=80',
            'specs' => '36V (3x 12V 100Ah Series) Setup',
            'desc' => 'Tournament-grade lightweight battery pack maintaining steady voltage throughout 12-hour fishing days without voltage drops or trolling sluggishness.',
            'badge_color' => 'bg-[#12b3d6]'
        ]
    ];
}

/**
 * Normalizes user input category to predefined category slugs
 */
function normalize_gallery_category($raw_category) {
    $raw = strtolower(trim((string)$raw_category));
    if (empty($raw)) return 'marine';

    if (strpos($raw, 'marine') !== false || strpos($raw, 'boat') !== false || strpos($raw, 'yacht') !== false || strpos($raw, 'fish') !== false) {
        return 'marine';
    }
    if (strpos($raw, 'rv') !== false || strpos($raw, 'camper') !== false || strpos($raw, 'van') !== false || strpos($raw, 'trailer') !== false) {
        return 'rv';
    }
    if (strpos($raw, 'solar') !== false || strpos($raw, 'home') !== false || strpos($raw, 'house') !== false || strpos($raw, 'roof') !== false) {
        return 'solar';
    }
    if (strpos($raw, 'offgrid') !== false || strpos($raw, 'off-grid') !== false || strpos($raw, 'cabin') !== false || strpos($raw, 'mountain') !== false) {
        return 'offgrid';
    }
    if (strpos($raw, 'fleet') !== false || strpos($raw, 'golf') !== false || strpos($raw, 'cart') !== false || strpos($raw, 'special') !== false || strpos($raw, 'commercial') !== false) {
        return 'fleet';
    }

    return 'marine';
}

/**
 * Returns user-friendly category title
 */
function get_gallery_category_name($slug) {
    $map = [
        'marine' => 'Marine & Boats',
        'rv' => 'RVs & Campers',
        'solar' => 'Solar & Home Energy',
        'offgrid' => 'Off-Grid & Cabins',
        'fleet' => 'Specialized & Fleet'
    ];
    return $map[$slug] ?? 'Battery Installation';
}

/**
 * Converts a standard Google Sheet sharing URL into a CSV download URL
 */
function format_google_sheet_csv_url($url) {
    $url = trim((string)$url);
    if (empty($url)) return '';

    // If it's already a published CSV link
    if (strpos($url, 'output=csv') !== false || strpos($url, 'format=csv') !== false) {
        return $url;
    }

    // Extract spreadsheet ID from docs.google.com/spreadsheets/d/{ID}/...
    if (preg_match('#/spreadsheets/d/([a-zA-Z0-9-_]+)#', $url, $matches)) {
        $sheet_id = $matches[1];
        // Check for specific gid (sheet tab)
        $gid = '0';
        if (preg_match('#[#&?]gid=([0-9]+)#', $url, $gid_matches)) {
            $gid = $gid_matches[1];
        }
        return "https://docs.google.com/spreadsheets/d/{$sheet_id}/export?format=csv&gid={$gid}";
    }

    return $url;
}

/**
 * Fetches and parses gallery items from Google Sheet
 */
function load_gallery_items() {
    $config_file = __DIR__ . '/gallery_config.php';
    $config = file_exists($config_file) ? include $config_file : [];
    
    // Check config or environment variable
    $sheet_url = getenv('GALLERY_SHEET_URL') ?: ($config['sheet_url'] ?? '');
    $cache_ttl = isset($config['cache_ttl']) ? (int)$config['cache_ttl'] : 60;
    
    // If no sheet URL configured, return defaults
    if (empty(trim($sheet_url))) {
        return get_default_gallery_items();
    }

    $csv_url = format_google_sheet_csv_url($sheet_url);
    if (empty($csv_url)) {
        return get_default_gallery_items();
    }

    // Cache file path
    $cache_file = __DIR__ . '/gallery_cache.json';
    $is_refresh = isset($_GET['refresh']) && $_GET['refresh'] == '1';

    // Serve from cache if fresh and refresh not requested
    if (!$is_refresh && file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_ttl) {
        $cached_data = @file_get_contents($cache_file);
        if (!empty($cached_data)) {
            $items = json_decode($cached_data, true);
            if (is_array($items) && count($items) > 0) {
                return $items;
            }
        }
    }

    // Fetch CSV content
    $csv_content = false;
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $csv_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'CleanErgy Gallery Sheet Sync/1.0');
        $csv_content = curl_exec($ch);
        curl_close($ch);
    }

    if ($csv_content === false) {
        $context = stream_context_create([
            'http' => [
                'timeout' => 5,
                'follow_location' => 1,
                'user_agent' => 'CleanErgy Gallery Sheet Sync/1.0'
            ]
        ]);
        $csv_content = @file_get_contents($csv_url, false, $context);
    }

    // If fetch failed, serve stale cache or default
    if (empty($csv_content)) {
        if (file_exists($cache_file)) {
            $cached_data = @file_get_contents($cache_file);
            $items = json_decode($cached_data, true);
            if (is_array($items) && count($items) > 0) return $items;
        }
        return get_default_gallery_items();
    }

    // Parse CSV
    $lines = preg_split('/\r\n|\r|\n/', trim($csv_content));
    $parsed_items = [];
    $is_first_row = true;
    $item_id = 1;

    foreach ($lines as $line) {
        if (empty(trim($line))) continue;
        $row = str_getcsv($line);
        if (empty($row) || empty(trim($row[0]))) continue;

        // Check if header row
        $first_col = strtolower(trim($row[0]));
        if ($is_first_row && (strpos($first_col, 'image') !== false || strpos($first_col, 'url') !== false || strpos($first_col, 'link') !== false || strpos($first_col, 'photo') !== false)) {
            $is_first_row = false;
            continue;
        }
        $is_first_row = false;

        $image_url = trim($row[0]);
        // Ignore row if not an image link
        if (empty($image_url) || $image_url === '#') continue;

        $raw_category = isset($row[1]) ? trim($row[1]) : '';
        $category = normalize_gallery_category($raw_category);
        $category_name = get_gallery_category_name($category);

        $title = isset($row[2]) && !empty(trim($row[2])) ? trim($row[2]) : "CleanErgy {$category_name} Installation";
        $desc = isset($row[3]) && !empty(trim($row[3])) ? trim($row[3]) : 'High-performance LiFePO4 battery installation engineered for reliable clean power.';
        $specs = isset($row[4]) && !empty(trim($row[4])) ? trim($row[4]) : 'LiFePO4 Lithium Power System';

        $parsed_items[] = [
            'id' => $item_id++,
            'title' => $title,
            'category' => $category,
            'category_name' => $category_name,
            'image' => $image_url,
            'specs' => $specs,
            'desc' => $desc,
            'badge_color' => 'bg-[#12b3d6]'
        ];
    }

    if (!empty($parsed_items)) {
        @file_put_contents($cache_file, json_encode($parsed_items, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $parsed_items;
    }

    return get_default_gallery_items();
}
