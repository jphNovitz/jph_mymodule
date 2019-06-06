<?php
/*
 * mymodule : prestashop module
 * @version 1.0
 * @author: Novitz jean-Philippe <novitz@gmail.com>
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
require_once _PS_MODULE_DIR_ . '/jph_mymodule/classes/Example.php';


class jph_mymodule extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'jph_mymodule';
        $this->tab = 'Example';
        $this->version = '1.0.0';
        $this->author = 'jphNovitz';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My module');
        $this->description = $this->l('jphNovitz Module example');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        include(dirname(__FILE__) . '/sql/install.php');

        return parent::install() && $this->addTab('AdminExample');
    }

    public function uninstall()
    {
        include(dirname(__FILE__) . '/sql/uninstall.php');

        return parent::uninstall() && $this->removeTab('AdminExample');
    }

    protected function addTab($className)
    {

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $className;
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('DEFAULT');

        $tab->icon = 'settings_applications';

        if (!$tab->save()) return false;
        return true;
    }

    /*
     * remove tab
     */
    protected function removeTab($className)
    {
        $idTab = (int)Tab::getIdFromClassName($className);
        if ($idTab) {
            $tab = new Tab($idTab);
            if (!$tab->delete()) return false;
            return true;
        }
    }
}
