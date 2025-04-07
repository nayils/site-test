<?php
session_start();

$title = "Главная";
require_once('services/products.php');
require_once('templates/header.php');
?>

<h1 class="mb-4">Товары</h1>

<div class="row mb-4">
    <div class="col-md-6">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Поиск товаров...">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>
    </div>
</div>

<div class="row">
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Товар <?php echo $i; ?></h5>
                    <p class="card-text">Описание товара <?php echo $i; ?>. Краткое описание характеристик и преимуществ.</p>
                    <p class="text-muted">Цена: <?php echo rand(100, 1000); ?> руб.</p>
                    <a href="#" class="btn btn-primary">В корзину</a>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Назад</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Вперед</a>
        </li>
    </ul>
</nav>

<?php require_once('templates/footer.php') ?>