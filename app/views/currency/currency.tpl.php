<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $this->currency['code'] ?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <?php foreach($this->currencies as $currency): ?>
            <?php if($this->currency['code'] != $currency['code']): ?>
                <a href="#" class="dropdown-item drop-currency" onclick="changeCurr(this.innerHTML)"><?= $currency['code'] ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>