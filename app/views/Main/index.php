<?php if($hits || $new): ?>
    <table class="table table-hover table-bordered">
        <thead class="gray-bg ">
            <tr class="text-center">
                <th scope="col" colspan="2">Товар</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Цена (шт.)</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php if($hits): ?>
            <tr>
                <td colspan="5" class="text-center bg-info text-light">Хиты</td>
            </tr>
            <tbody>
            <?php foreach ($hits as $hit): ?>
                <tr class="text-center table-bordered shop-prods">
                    <td>
                        <img src="https://img.icons8.com/nolan/24/important-mail.png">
                    </td>
                    <td><span class="hint hint--top" aria-label="<?= $hit['description'] ?>">
                            <?= $hit['name'] ?>
                        </span></td>
                    <td class="product-qty-link product-qty-<?= $hit['id'] ?>"><?= $hit['quantity'] ?></td>
                    <td><?= round($hit['price']* $currency['value'], 4)." ".$currency['symbol_right']." ".$currency['symbol_left'] ?></td>
                    <td>
                        <a onclick="addToCart(event, this)" class="add-to-cart-link" href="/cart/add?id=<?= $hit['id'] ?>">
                            <img src="https://img.icons8.com/material-outlined/24/000000/add-basket.png">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif; ?>

        <?php if($new): ?>
            <tr>
                <td colspan="5" class="text-center bg-info text-light">Новинки</td>
            </tr>
            <tbody>
            <?php foreach ($new as $new_prod): ?>
                <tr class="text-center table-bordered shop-prods">
                    <td>
                        <img src="https://img.icons8.com/nolan/24/important-mail.png">
                    </td>
                    <td>
                        <span class="hint hint--top" aria-label="<?= $new_prod['description'] ?>">
                            <?= $new_prod['name'] ?>
                        </span>
                    </td>
                    <td class="product-qty-link product-qty-<?= $new_prod['id'] ?>"><?= $new_prod['quantity'] ?></td>
                    <td><?= round($new_prod['price']* $currency['value'], 4)." ".$currency['symbol_right']." ".$currency['symbol_left'] ?></td>
                    <td>
                        <a onclick="addToCart(event, this)" class="add-to-cart-link" href="/cart/add?id=<?= $new_prod['id'] ?>">
                            <img src="https://img.icons8.com/material-outlined/24/000000/add-basket.png">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
<?php endif; ?>

