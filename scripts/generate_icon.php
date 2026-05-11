<?php

$size = 1024;

$shadow = ['x1' => 250, 'y1' => 250, 'x2' => 834, 'y2' => 834];
$card = ['x1' => 220, 'y1' => 220, 'x2' => 804, 'y2' => 804];
$bar = ['x1' => 280, 'y1' => 300, 'x2' => 744, 'y2' => 392];
$line1 = ['x1' => 300, 'y1' => 470, 'x2' => 724, 'y2' => 528];
$line2 = ['x1' => 300, 'y1' => 576, 'x2' => 684, 'y2' => 634];
$line3 = ['x1' => 300, 'y1' => 682, 'x2' => 620, 'y2' => 740];
$circle = ['cx' => 700, 'cy' => 520, 'r' => 52];

$rows = '';

for ($y = 0; $y < $size; $y++) {
    $line = chr(0);
    $mixY = $y / ($size - 1);

    for ($x = 0; $x < $size; $x++) {
        $mixX = $x / ($size - 1);

        $r = (int) (15 + (224 * $mixY));
        $g = (int) (23 + (85 * $mixY) + (28 * (1 - $mixX)));
        $b = (int) (42 + (18 * (1 - $mixY)));

        if ($x >= $shadow['x1'] && $x <= $shadow['x2'] && $y >= $shadow['y1'] && $y <= $shadow['y2']) {
            $r = 216;
            $g = 220;
            $b = 227;
        }

        if ($x >= $card['x1'] && $x <= $card['x2'] && $y >= $card['y1'] && $y <= $card['y2']) {
            $r = 255;
            $g = 255;
            $b = 255;
        }

        if ($x >= $bar['x1'] && $x <= $bar['x2'] && $y >= $bar['y1'] && $y <= $bar['y2']) {
            $r = 239;
            $g = 108;
            $b = 0;
        }

        if ($x >= $line1['x1'] && $x <= $line1['x2'] && $y >= $line1['y1'] && $y <= $line1['y2']) {
            $r = 226;
            $g = 232;
            $b = 240;
        }

        if ($x >= $line2['x1'] && $x <= $line2['x2'] && $y >= $line2['y1'] && $y <= $line2['y2']) {
            $r = 226;
            $g = 232;
            $b = 240;
        }

        if ($x >= $line3['x1'] && $x <= $line3['x2'] && $y >= $line3['y1'] && $y <= $line3['y2']) {
            $r = 226;
            $g = 232;
            $b = 240;
        }

        $dx = $x - $circle['cx'];
        $dy = $y - $circle['cy'];

        if (($dx * $dx) + ($dy * $dy) <= ($circle['r'] * $circle['r'])) {
            $r = 255;
            $g = 183;
            $b = 77;
        }

        $line .= chr($r).chr($g).chr($b);
    }

    $rows .= $line;
}

$chunk = function (string $type, string $data): string {
    return pack('N', strlen($data)).$type.$data.pack('N', crc32($type.$data));
};

$png = chr(137).'PNG'.chr(13).chr(10).chr(26).chr(10);
$png .= $chunk('IHDR', pack('NNC5', $size, $size, 8, 2, 0, 0, 0));
$png .= $chunk('IDAT', gzcompress($rows, 9));
$png .= $chunk('IEND', '');

file_put_contents(__DIR__.'/../public/icon.png', $png);

echo "Icon written to public/icon.png".PHP_EOL;
