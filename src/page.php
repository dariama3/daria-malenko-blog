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
</head>
<body>
<header>
    <a href="/" title="Dariam Blog Homepage">
        <img src="/images/logo.png" alt="Dariam Logo" width="200"/>
    </a>
    <nav>
        <?= $this->render(\Dariam\Blog\Block\CategoryList::class) ?>
    </nav>
</header>

<main>
    <?= $this->render($this->getContent(), $this->getContentBlockTemplate()) ?>
</main>

<footer>
    <nav>
        <ul>
            <li>
                <a href="/about-us">About Us</a>
            </li>
            <li>
                <a href="/terms-and-conditions">Terms & Conditions</a>
            </li>
            <li>
                <a href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </nav>
    <p>&copy; Default Value 2021. All Rights Reserved.</p>
</footer>
</body>
</html>
