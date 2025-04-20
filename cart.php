<?php
session_start();

$title = "Корзина";
require_once('utils/paths.php');

require_once(getRootPath('services/cart.php'));
require_once(getRootPath('services/products.php'));
require_once(getRootPath('templates/header.php'));

if (isset($_GET['remove'])) {
    $product_id = isset($_GET['remove']) ? htmlspecialchars($_GET['remove']) : null;
    removeFromCart($product_id);
}

$cart = getCart();
?>

<h1 class="mb-4">Корзина</h1>

<div class="row">
    <?php if (count($cart) > 0): ?>
        <?php foreach ($cart as $product_id): ?>
            <div class="col-md-4 mb-4">
                <?php $product = getProduct($product_id); ?>
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>

                        <a href="/cart.php?remove=<?= $product_id ?>" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Корзина пуста</p>
    <?php endif; ?>
</div>


<?php require_once(getRootPath('templates/footer.php')) ?>