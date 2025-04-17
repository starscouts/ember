<?php

function version(): string {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.version")) {
        return substr(trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.version")), 0, 8);
    } else if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.git/refs/heads/trunk")) {
        return substr(trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.git/refs/heads/trunk")), 0, 8);
    } else {
        return "trunk";
    }
}

function build(): string {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.build")) {
        $a = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.build"));
    } else {
        $a = "dev";
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild")) {
        $b = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild"));
    } else {
        $b = "testing";
    }
    return "$a.$b";
}

function build_dom(): string {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.build")) {
        $a = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.build"));
    } else {
        $a = "dev";
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild")) {
        $b = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild"));
    } else {
        $b = "testing";
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.build.id")) {
        $aa = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.build.id"));
    } else {
        $aa = "";
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild.id")) {
        $ba = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.prjbuild.id"));
    } else {
        $ba = "";
    }
    return "<a href='https://ci.minteck.org/buildConfiguration/WebX_Stable/$aa' target='_blank' id='footer-version-build'>$a.$aa</a>.<a href='https://ci.minteck.org/buildConfiguration/WebX_Projects/$ba' target='_blank' id='footer-version-projects'>$b</a>";
}

function getLetters(string $project): string {
    $words = explode(" ", preg_replace('/#+/m', "#", preg_replace('/[^a-z0-9 ]/m', "#", strtolower(trim(preg_replace('/[A-Z]/m', ' $0', $project))))));

    $words = array_slice(array_filter($words, function ($v) {
        return trim($v);
    }), 0);

    return substr($words[0], 0, 1);
}

function timeAgo($time): string {
    if (!is_numeric($time)) {
        $time = strtotime($time);
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "age");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "100");

    $now = time();

    $difference = $now - $time;
    if ($difference <= 10 && $difference >= 0) {
        return $tense = 'just now';
    } elseif ($difference > 0) {
        $tense = 'ago';
    } else {
        $tense = 'later';
    }

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    $period =  $periods[$j] . ($difference >1 ? 's' :'');
    return "{$difference} {$period} {$tense} ";
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/Parsedown.php";
global $Parsedown;
$Parsedown = new Parsedown();