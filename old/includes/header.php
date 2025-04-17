<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php"; global $title; ?>
<!DOCTYPE html>
<html lang="en">
<head data-webx-version="<?= version() ?>" data-webx-build="#<?= build() ?>">
    <meta charset="UTF-8">
    <title><?php

        if (isset($title)) {
            echo "$title | ";
        }

        ?>Minteck</title>
    <meta name="description" content="Minteck's Website">
    <meta name="version" content="<?= version() ?> (#<?= build() ?>)">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/assets/favicon/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/assets/favicon/favicon-64x64.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#a56510">
    <meta name="msapplication-TileColor" content="#a56510">
    <meta name="theme-color" content="#a56510">
</head>
<body class="bg-dark">