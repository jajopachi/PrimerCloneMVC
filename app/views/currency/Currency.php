<?php

namespace app\views\currency;

use core\mvc\Model;

class Currency extends Model
{
    protected $currency;
    protected $currencies;
    protected $tpl = __DIR__ . "/currency.tpl.php";

    public function run()
    {
        $this->currencies = $this->getCurrencies();
        $this->currency = $this->getCurrency($this->currencies);
        echo $this->renderHTML();
    }

    public function renderHTML()
    {
        ob_start();
        require_once $this->tpl;
        $content = ob_get_clean();

        return $content;
    }

    public function getCurrencies()
    {
        return $this->db->query("SELECT * FROM currencies ORDER BY base DESC")->fetchAll();
    }

    public function getCurrency($currencies)
    {
        if(isset($_COOKIE['currency'])) {
            $key = $_COOKIE['currency'];
            foreach ($currencies as $currency) {
                if($key == $currency['code']) {
                    $curr = $currency;
                }
            }
        }else{
            $key = key($currencies);
            $curr = $currencies[$key];
        }

        return $curr;
    }

    public function getCurrencyByCode(string $code)
    {
        $curr = $this->db->prepare("SELECT * FROM currencies WHERE code='". $code ."'");
        $curr->execute();
        return $curr->fetch();
    }

}