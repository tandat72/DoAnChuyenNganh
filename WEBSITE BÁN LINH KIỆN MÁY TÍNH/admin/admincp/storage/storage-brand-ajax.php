<?php
    include "../class/class_product.php";
$product = new product;

$category_id = $_GET['category_id']
?>

<?php
$show_brand_ajax = $product->show_brand_ajax($category_id);
if ($show_brand_ajax) {
    while ($result = $show_brand_ajax->fetch_assoc()) {
?>
    <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
<?php
    }
}
?>