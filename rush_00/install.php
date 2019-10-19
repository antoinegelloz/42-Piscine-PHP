<?php
$con = new mysqli("127.0.0.1", "root", "root");
if ($con->connect_error)
  die("Connection failed: " . $con->connect_error . "\n");

$sql = "CREATE DATABASE shop";
if ($con->query($sql) === FALSE)
  echo "Error creating database: " . $con->error . "\n";

if ($con->query("USE shop") === FALSE)
  echo "Error using database: " . $con->error . "\n";

$sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  login TEXT NOT NULL,
  password TEXT NOT NULL,
  is_admin BOOLEAN DEFAULT 0
  )";
if ($con->query($sql) === FALSE)
  echo "Error creating users table: " . $con->error . "\n";

$sql = "INSERT INTO users (login, password, is_admin)
VALUES ('antoine', '0551539a10837302f19a57160fe1fe2d6e259cb1ed1ea05b06b9ecd7e2185854e42c6047a85a2248c21f18ae9e20e0a73c1c23d0b0e33427088b2ba5dbdad053', 1),
('raphael', '12be7ff2ca30575b989645c7686e4511c80d53a2033fc1d5adc323ace7d3dbd91bd14db7bb7e9ed06a1d2d100487f87bbbafcbe1e93f0f050d60d01e8e1a9393', 1)";
if ($con->query($sql) === FALSE)
  echo "Error adding admin user: " . $con->error . "\n";

$sql = "CREATE TABLE products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name TEXT NOT NULL,
  price INT UNSIGNED,
  stock INT UNSIGNED,
  img TEXT NOT NULL,
  cat TEXT NOT NULL)";
if ($con->query($sql) === FALSE)
  echo "Error creating products table: " . $con->error . "\n";

$sql = "INSERT INTO products (name, price, stock, img, cat) VALUES 
('iMac 5K', 2000, 10, 'https://uno.ma/media/catalog/product/cache/1/image/598x598/9df78eab33525d08d6e5fb8d27136e95/l/d/ld0004425692_2_0004428833_2.jpg', 'computers'),
('Macbook Pro', 1000, 5, 'https://images-na.ssl-images-amazon.com/images/I/51v8KXJ0nlL._SX425_.jpg', 'computers'),
('Pair of socks', 1000, 999, 'https://i.etsystatic.com/6572991/r/il/933c89/1623581850/il_570xN.1623581850_i7es.jpg', 'clothing'),
('Google Pixel 4', 800, 8, 'https://static.toiimg.com/photo/66350481.cms', 'phones')";
if ($con->query($sql) === FALSE)
  echo "Error adding products user: " . $con->error . "\n";

$sql = "CREATE TABLE categories (
cat_id INT UNSIGNED NOT NULL,
cat_name TEXT NOT NULL,
parent_id INT UNSIGNED)";
if ($con->query($sql) === FALSE)
  echo "Error creating categories table: " . $con->error . "\n";

$sql = "INSERT INTO categories (cat_id, cat_name, parent_id) VALUES
(1, 'computers', 0),
(2, 'clothing', 0),
(3, 'phones', 0)";
if ($con->query($sql) === FALSE)
  echo "Error adding products user: " . $con->error . "\n";

$sql = "CREATE TABLE cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id TEXT NOT NULL,
  product_id INT UNSIGNED,
  quantity INT UNSIGNED)";
  if ($con->query($sql) === FALSE)
    echo "Error creating cart table: " . $con->error . "\n";

$con->close();
?>