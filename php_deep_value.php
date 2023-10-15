<?php

function get_deep_value($item, $type, $default="") {
    $keys = explode('.', $type);
    foreach ($keys as $key) {
        if (isset($item[$key])) {
            $item = $item[$key];
        } else {
            return $default;
        }
    }
    return $item;
}

$product = [
    "id" => 1,
    "feature_image" => [
        'large' => 'http://example.com/images/large.jpg',
        'medium' => 'http://example.com/images/medium.jpg',
        'small' => 'http://example.com/images/small.jpg',
    ]
];
$img_null = get_deep_value($product, 'not.exist');
$img_lg = get_deep_value($product, "feature_image.large");
$img_md = get_deep_value($product, "feature_image.medium");
$img_sm = get_deep_value($product, "feature_image.small");

echo $img_null;
echo $img_lg;
echo $img_md;
echo $img_sm;