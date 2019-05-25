<?php
/*
 * mymodule : prestashop module
 * @version 1.0
 * @author: Novitz jean-Philippe <novitz@gmail.com>
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class jph_mymodule extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'jph_mymodule';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'jphNovitz';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My module');
        $this->description = $this->l('Add new vat for the same product');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        if (!parent::install()){
            return false;
        }
        return true ;
    }

    public function uninstall()
    {
        if (!parent::uninstall()){
            return false;
        }
        return true ;
    }
}
