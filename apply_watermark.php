<?php

$image = imagecreatefromjpeg($argv[2]);


$addWatermark = function($image, $stampPath) {
    $stamp = imagecreatefrompng($stampPath);
    $marge_right = 10;
    $marge_bottom = 10;

    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopy(
        $image,
        $stamp,
        imagesx($image) - $sx - $marge_right,
        imagesy($image) - $sy - $marge_bottom,
        0,
        0,
        imagesx($stamp),
        imagesy($stamp)
    );
};

$addWatermark($image, $argv[1]);

imagepng($image, __DIR__.'/results/'.basename($argv[2]));
imagedestroy($image);
