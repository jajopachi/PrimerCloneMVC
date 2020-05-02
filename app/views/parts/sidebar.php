<ul class="list-group">
    <?php foreach($categories as $category): ?>
        <li class='list-group-item list-group-item-action'>
            <a class='list-li' href="category/<?= $category['alias'] ?>">
                <?= $category['name'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

