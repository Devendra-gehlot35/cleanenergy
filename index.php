<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Energy - Smart Lithium Battery Storage Solutions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700;1,800;1,900&family=Playfair+Display:ital,wght@1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./dist/output.css?v=<?= filemtime(__DIR__ . '/dist/output.css') ?>">
</head>
<body class="">

    <?php
    // 1. Fixed Navbar
    include __DIR__ . '/components/navbar.php';

    // 2. Banner Slider (3 Images)
    include __DIR__ . '/components/banner-slider.php';
    ?>

    <!-- Sections Container below Banner Slider -->
    <main>
        <?php
        // 3. About Clean Energy
        include __DIR__ . '/components/about.php';

        // 4. Best-Selling Batteries
        include __DIR__ . '/components/best-selling.php';

        // 5. Shop By Application
        include __DIR__ . '/components/shop-by-application.php';

        // 6. Battery Selection Help
        include __DIR__ . '/components/battery-selection-help.php';

        // 7. Why Clean Energy
        include __DIR__ . '/components/why-clean-energy.php';

        // 8. Battery Upgrade Guide
        include __DIR__ . '/components/battery-upgrade-guide.php';

        // 9. Contact Us
        include __DIR__ . '/components/contact-us.php';

        // 10. Looking to Upgrade
        include __DIR__ . '/components/looking-to-upgrade.php';

        // 11. Our Blogs
        include __DIR__ . '/components/our-blogs.php';

        // 12. FAQs
        include __DIR__ . '/components/faqs.php';

        // 13. Our Gallery
        include __DIR__ . '/components/our-gallery.php';

        // 14. Get in Touch
        include __DIR__ . '/components/get-in-touch.php';

        // Footer
        include __DIR__ . '/components/footer.php';
        ?>
    </main>

</body>
</html>
