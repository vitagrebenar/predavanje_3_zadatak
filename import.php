<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cjenik";

// Spoj na bazu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Učitaj XML s namespace-om
$xml = simplexml_load_file("dpa_product_catalog_sample_feed_rss.xml");
$xml->registerXPathNamespace('g', 'http://base.google.com/ns/1.0');

foreach ($xml->channel->item as $item) {
    $id = $item->children('g', true)->id;
    $title = $item->children('g', true)->title;
    $description = $item->children('g', true)->description;
    $link = $item->children('g', true)->link;
    $image_link = $item->children('g', true)->image_link;
    $brand = $item->children('g', true)->brand;
    $condition = $item->children('g', true)->condition;
    $availability = $item->children('g', true)->availability;
    $price = $item->children('g', true)->price;

    $id = $conn->real_escape_string($id);
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $link = $conn->real_escape_string($link);
    $image_link = $conn->real_escape_string($image_link);
    $brand = $conn->real_escape_string($brand);
    $condition = $conn->real_escape_string($condition);
    $availability = $conn->real_escape_string($availability);
    $price = preg_replace('/[^0-9.]/', '', $price);

    $sql = "INSERT INTO proizvodi (sku, naziv, opis, link, slika, brand, stanje, dostupno, cijena)
            VALUES ('$id', '$title', '$description', '$link', '$image_link', '$brand', '$condition', '$availability', $price)";
    $conn->query($sql);
}

echo "Podaci su uspješno dodani!";
$conn->close();
?>
