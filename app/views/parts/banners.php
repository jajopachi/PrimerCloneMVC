<div class="row justify-content-sm-center">
    <?php foreach ($banners as $banner): ?>
        <div style="margin: 0 5px 5px 0">
            <a href="<?= $banner['alias'] ?>">
                <img src="/banners/<?= $banner['img'] ?>" alt="<?= $banner['name'] ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>

