<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <title><?php wp_title(); ?></title>
    <meta http-equiv="X-UA-compatible" content="IE=edge" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-precomposed.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?> >

<?php include_once("svg/svg-defs.svg"); ?>

<header>
    <div class="main-wrap">
        <a class="logo" href="/">
            <svg width="326" height="69"><use xlink:href="#logo"></use></svg>
        </a>
        <nav>
            <ul>
                <li><a href="" title="">Who We Are</a></li>
                <li><a href="" title="">How We Work</a></li>
                <li><a href="" title="">What We Provide</a></li>
                <li><a href="" title="">Contact</a></li>
            </ul>
        </nav>
    </div><!--end main-wrap-->
</header>