<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php if(!empty($_SESSION['cart'])): ?>
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>x</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($_SESSION['cart'] as $product):?>
                        <tr>
                            <td><a href="/catalog/<?= $product['alias'] ?>"><?= $product['name'] ?></a></td>
                            <td><?= $product['qty'] ?></td>
                            <td><?= $product['all_price'] ?></td>
                            <td class="del-prod text-danger" data-id="<?= $product['id'] ?>" onclick="deleteProduct(this)">X</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tr class="text-right">
                        <td colspan="4">
                            Итого (шт.): <span class="finish-amount-qty"><?= $_SESSION['cart.qty'] ?></span>
                        </td>
                    </tr>
                    <tr class="text-right">
                        <td colspan="4">
                            Итого:
                            <?=
                                $_SESSION['cart.currency']['symbol_left'].
                                ' <span class="finish-amount-price">' .
                                $_SESSION['cart.sum'] .
                                '</span> ' .
                                $_SESSION['cart.currency']['symbol_right']
                            ?>
                        </td>
                    </tr>
                </table>
            <?php else: ?>
                <h3>Корзина пуста!</h3>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Закрыть</button>
            <button type="button" class="btn btn-primary">Оформить заказ!</button>
            <?php if(!empty($_SESSION['cart'])): ?>
                <a class="btn btn-danger clear-cart" onclick="clearCart()">Очистить корзину!</a>
            <?php endif; ?>
        </div>
    </div>
</div>


