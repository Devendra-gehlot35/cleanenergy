<?php
/**
 * Gallery Google Sheet Configuration
 * 
 * Instructions:
 * 1. Create a Google Sheet with columns:
 *    Column A: Image URL (Required - Direct URL of image or /assets/filename.png)
 *    Column B: Category (Optional - marine, rv, solar, offgrid, fleet)
 *    Column C: Title (Optional - Title of installation)
 * 2. Click "Share" -> Change to "Anyone with the link can view".
 * 3. Paste the Google Sheet URL below.
 * 4. To instantly refresh changes without waiting for cache, visit: /gallery.php?refresh=1
 */

return [
    // Paste your Google Sheet URL or published CSV link here:
    'sheet_url' => 'https://docs.google.com/spreadsheets/d/19tU1R0HMnOo1h7iTzQR7AfspWfJWB4P9AT-bJZzVrNo/edit?usp=sharing',
    
    // Cache duration in seconds (e.g. 60 = 1 minute)
    'cache_ttl' => 60,
];
