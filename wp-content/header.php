<!Doctype html>
<html lang="ja">
<head>
    <!-- Google Analytics start -->
    <!-- Google Analytics end -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=-1" />
    <meta name="format-detection" content="telephone=no">
    <title></title>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <?php wp_head(); ?>
</head>
<body id="<?php echo isset($GLOBALS['bodyID']) ? $GLOBALS['bodyID'] : ""; ?>" class="<?php echo isset($GLOBALS['bodyClass']) ? $GLOBALS['bodyClass'] : ""; ?>">
    <div id="wrapper">
        <header id="header">
            <div class="inner">
                <h1><?php echo isset($GLOBALS['h1']) ? $GLOBALS['h1'] : ""; ?></h1>
            </div>
        </header>