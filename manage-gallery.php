<?php
// Gallery Manager - Clean, Simple, Direct Interface
$galleryJsonFile = __DIR__ . '/data/gallery_items.json';
$galleryCsvFile = __DIR__ . '/data/gallery_images.csv';
$uploadDir = __DIR__ . '/assets/uploads/';

if (!file_exists(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0777, true);
}
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Load current items
$items = [];
if (file_exists($galleryJsonFile)) {
    $items = json_decode(file_get_contents($galleryJsonFile), true) ?: [];
}

$message = '';
$messageType = '';

// Helper to sync CSV file
function sync_gallery_csv($items, $csvFile) {
    $lines = ["S.No,Image URL"];
    foreach ($items as $idx => $it) {
        $sno = $idx + 1;
        $url = $it['image'];
        $lines[] = "{$sno},{$url}";
    }
    @file_put_contents($csvFile, implode("\n", $lines));
}

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. ADD IMAGE
    if ($action === 'add') {
        $title = trim($_POST['title'] ?? '');
        $category = trim($_POST['category'] ?? 'marine');
        $imageUrl = trim($_POST['image_url'] ?? '');
        $finalImage = '';

        // Check File Upload
        if (!empty($_FILES['image_file']['name']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $fileTmp = $_FILES['image_file']['tmp_name'];
            $fileName = basename($_FILES['image_file']['name']);
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

            if (in_array($ext, $allowed)) {
                $newFileName = 'gallery_' . time() . '_' . uniqid() . '.' . $ext;
                $targetFile = $uploadDir . $newFileName;
                if (move_uploaded_file($fileTmp, $targetFile)) {
                    $finalImage = '/assets/uploads/' . $newFileName;
                }
            }
        }

        if (empty($finalImage)) {
            $finalImage = $imageUrl;
        }

        if (!empty($finalImage)) {
            $newId = time();
            $catMap = [
                'marine' => 'Marine & Boats',
                'rv' => 'RVs & Campers',
                'solar' => 'Solar & Home Energy',
                'offgrid' => 'Off-Grid & Cabins',
                'fleet' => 'Specialized & Fleet'
            ];

            $newItem = [
                'id' => $newId,
                'title' => !empty($title) ? $title : 'CleanErgy Battery Installation',
                'category' => $category,
                'category_name' => $catMap[$category] ?? 'Battery Installation',
                'image' => $finalImage,
                'specs' => 'LiFePO4 Lithium Power System',
                'desc' => 'High-performance battery installation.',
                'badge_color' => 'bg-[#12b3d6]'
            ];

            $items[] = $newItem;
            file_put_contents($galleryJsonFile, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            sync_gallery_csv($items, $galleryCsvFile);

            $message = 'Image successfully added to gallery!';
            $messageType = 'success';
        } else {
            $message = 'Please provide an Image URL or upload an image file.';
            $messageType = 'error';
        }
    }

    // 2. DELETE IMAGE
    if ($action === 'delete') {
        $deleteId = $_POST['id'] ?? '';
        $items = array_values(array_filter($items, function($it) use ($deleteId) {
            return (string)$it['id'] !== (string)$deleteId;
        }));

        file_put_contents($galleryJsonFile, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        sync_gallery_csv($items, $galleryCsvFile);

        $message = 'Image removed from gallery!';
        $messageType = 'success';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - CleanErgy Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen py-10 px-4 sm:px-6 lg:px-8">

    <div class="max-w-6xl mx-auto">
        <!-- Top Bar -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Gallery Manager</h1>
                <p class="text-slate-500 text-sm mt-1">Add or remove gallery photos easily without touching code or sheets.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/gallery.php" target="_blank" class="px-5 py-2.5 rounded-xl font-bold text-sm text-white bg-[#12b3d6] hover:bg-[#0ea5e9] shadow-md shadow-cyan-500/20 transition-all flex items-center gap-2">
                    <span>View Live Gallery</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <a href="/manage-blogs.php" class="px-4 py-2.5 rounded-xl font-semibold text-sm text-slate-700 bg-slate-100 hover:bg-slate-200 transition-all">
                    Manage Blogs
                </a>
            </div>
        </div>

        <?php if (!empty($message)): ?>
            <div class="mb-6 p-4 rounded-xl text-sm font-semibold <?= $messageType === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-rose-50 text-rose-800 border border-rose-200' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <!-- Add Image Form -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200 mb-10">
            <h2 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-[#d7f3fb] text-[#12b3d6] flex items-center justify-center font-black text-base">+</span>
                <span>Add New Photo to Gallery</span>
            </h2>

            <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-5 items-end">
                <input type="hidden" name="action" value="add">

                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Image URL (Direct Link)</label>
                    <input type="text" name="image_url" placeholder="https://images.unsplash.com/... or /assets/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#12b3d6] text-sm">
                </div>

                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Or Upload File</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#12b3d6] text-sm bg-white">
                        <option value="marine">Marine</option>
                        <option value="rv">RV / Van</option>
                        <option value="solar">Solar</option>
                        <option value="offgrid">Off-Grid</option>
                        <option value="fleet">Fleet</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="w-full py-3 px-5 rounded-xl font-bold text-sm text-white bg-[#12b3d6] hover:bg-[#0ea5e9] shadow-md shadow-cyan-500/25 transition-all">
                        + Add Photo
                    </button>
                </div>
            </form>
        </div>

        <!-- Current Gallery Photos -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Current Gallery Photos (<?= count($items) ?>)</h2>
                    <p class="text-xs text-slate-500 mt-1">These photos appear in real-time on your website.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                <?php foreach ($items as $idx => $it): ?>
                    <div class="group relative bg-slate-50 rounded-2xl overflow-hidden border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div class="aspect-square w-full bg-slate-200 overflow-hidden relative">
                            <img src="<?= htmlspecialchars($it['image']) ?>" alt="Gallery Image" class="w-full h-full object-cover">
                            <span class="absolute top-2 left-2 px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase bg-black/70 text-white backdrop-blur-xs">
                                #<?= $idx + 1 ?> <?= htmlspecialchars($it['category'] ?? 'Photo') ?>
                            </span>
                        </div>
                        <div class="p-3.5 bg-white border-t border-slate-100 flex items-center justify-between">
                            <p class="text-xs font-semibold text-slate-700 truncate max-w-[150px]"><?= htmlspecialchars($it['title'] ?? 'Installation') ?></p>
                            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo from the gallery?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($it['id']) ?>">
                                <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-lg transition-all">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>
</html>
