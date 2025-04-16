<?php
session_start();

$title = "Главная";
require_once('utils/paths.php');

require_once(getRootPath('services/products.php'));
require_once(getRootPath('templates/header.php'));

$s = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : null;
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;
$count = isset($_GET['count']) ? htmlspecialchars($_GET['count']) : 7;
$products = getProducts($s, $page, $count);
?>

<h1 class="mb-4">Товары</h1>

<div class="row mb-4">
    <div class="col-md-6">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Поиск товаров..." name="s" value="<?= $s ?>">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>
    </div>
</div>

<div class="row">
    <?php for ($i = 1; $i < count($products); $i++): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?= $products[$i]['name']; ?></h5>
                    <p class="card-text"><?= $products[$i]['description']; ?></p>
                    <p class="text-muted"><?= $products[$i]['price']; ?> руб.</p>
                    <a href="#" class="btn btn-primary">В корзину</a>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center"> 
        <li class="page-item"><a class="page-link" href="/?page=1">1</a></li>
        <li class="page-item"><a class="page-link" href="/?page=2">2</a></li>
        <li class="page-item"><a class="page-link" href="/?page=3">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Вперед</a>
        </li>
    </ul>
</nav>

<?php require_once(getRootPath('templates/footer.php')) ?>