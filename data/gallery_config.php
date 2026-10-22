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
    // Google Sheet URL provided by user
    'sheet_url' => 'https://docs.google.com/spreadsheets/d/1---jkK-YBC0Cw5sS_DACTZ131k_FARqbo2o535RDhJQ/edit?usp=sharing',
    
    // Cache duration in seconds (60 seconds)
    'cache_ttl' => 60,
];
