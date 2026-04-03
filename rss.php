<?php
header("Content-Type: application/rss+xml; charset=ISO-8859-1");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0"><channel>';
echo '<title>Test Store</title>';
echo '<link>http://www.example.com</link>';
echo '<description>An example feed for Facebook</description>';

$conn = new mysqli("localhost", "root", "", "cjenik");
$result = $conn->query("SELECT * FROM proizvodi");

while($row = $result->fetch_assoc()) {
    echo '<item>';
    echo '<g:id>' . $row['sku'] . '</g:id>';
    echo '<g:title>' . htmlspecialchars($row['naziv']) . '</g:title>';
    echo '<g:description>' . htmlspecialchars($row['opis']) . '</g:description>';
    echo '<g:link>' . htmlspecialchars($row['link']) . '</g:link>';
    echo '<g:image_link>' . htmlspecialchars($row['slika']) . '</g:image_link>';
    echo '<g:brand>' . htmlspecialchars($row['brand']) . '</g:brand>';
    echo '<g:condition>' . htmlspecialchars($row['stanje']) . '</g:condition>';
    echo '<g:availability>' . htmlspecialchars($row['dostupno']) . '</g:availability>';
    echo '<g:price>' . $row['cijena'] . ' GBP</g:price>';
    echo '</item>';
}

echo '</channel></rss>';
$conn->close();
?>
