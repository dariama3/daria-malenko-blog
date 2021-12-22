<?php
/** @var \Dariam\Framework\View\Renderer $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Dariam Blog</title>
    <link rel="stylesheet" href="/css/main.min.css"/>
    <script type="module" src="/js/main.js" defer></script>
</head>
<body>
<header class="header content-wrapper">
    <a class="header__logo" href="/" title="Dariam Blog Homepage">
        <img src="/images/logo.png" alt="Dariam Logo" width="250"/>
    </a>
    <nav class="header__menu menu">
        <button class="menu__control" id="menu-btn-mobile" type="button" title="Menu"><i></i><i></i><i></i></button>
        <?= $this->render(\Dariam\Blog\Block\CategoryList::class) ?>
    </nav>
</header>

<main class="page-wrapper content-wrapper">
    <?= $this->render($this->getContent(), $this->getContentBlockTemplate()) ?>
</main>

<footer class="footer content-wrapper">
    <nav class="footer__links">
        <ul class="footer__links_list">
            <li>
                <a class="footer__links_item" href="/about-us">About Us</a>
            </li>
            <li>
                <a class="footer__links_item" href="/terms-and-conditions">Terms & Conditions</a>
            </li>
            <li>
                <a class="footer__links_item" href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </nav>
    <span class="footer__copy">&copy; Default Value 2021. All Rights Reserved.</span>
</footer>
</body>
</html>
