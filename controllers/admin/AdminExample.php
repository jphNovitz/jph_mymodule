<?php


class AdminExampleController extends ModuleAdminController
{
    public function __construct()
    {
        require_once _PS_MODULE_DIR_ . '/jph_mymodule/classes/Example.php';
        $this->bootstrap = true; //Gestion de l'affichage en mode bootstrap
        $this->table = Example::$definition['table'];//Table de l'objet
        $this->identifier = Example::$definition['primary']; //Clé primaire de l'objet
        $this->className = Example::class; //Classe de l'objet
        $this->lang = false;

        parent::__construct();

        $this->fields_list = [
            'id_example' => [ // sql field
                'title' => $this->module->l('ID'), //Title
                'align' => 'center', // Alignement
                'class' => 'fixed-width-xs' //classe css de l'élément
            ],
            'name' => [
                'title' => $this->module->l('name'),
                'align' => 'left',
            ]
        ];


        $this->addRowAction('edit');
        $this->addRowAction('delete');

    }


    public function viewAccess($disable = false)
    {
        return true;
    }
    /**
     * toolbar
     */
    public function initPageHeaderToolbar()
    {
        //Add button
        $this->page_header_toolbar_btn['new'] = array(
            'href' => self::$currentIndex . '&add' . $this->table . '&token=' . $this->token,
            'desc' => $this->module->l('Add'),
            'icon' => 'process-icon-new'
        );
        $this->page_header_toolbar_btn['list'] = array(
            'href' => self::$currentIndex . '&token=' . $this->token,
            'desc' => $this->module->l('List'),
            'icon' => 'process-icon-back'
        );

        parent::initPageHeaderToolbar();
    }

    /**
     *
     * @return string
     * @throws SmartyException
     */
    public function renderForm()
    {

        //Définition du formulaire d'édition
        $this->fields_form = [
            //Entête
            'legend' => [
                'title' => $this->module->l('Edit Sample'),
                'icon' => 'icon-cog'
            ],
            //Champs
            'input' => [
                [
                    'type' => 'text', // field type
                    'label' => $this->module->l('name'), // field Label
                    'name' => 'name', // field name
                    'class' => 'input fixed-width-sm', // css classes
                    'size' => 50, // max length
                    'required' => true,
                    'empty_message' => $this->l('Please give a name'),
                    'hint' => $this->module->l('Enter sample name')
                ],
            ],
            //Boutton de soumission
            'submit' => [
                'title' => $this->l('Save'),
            ]
        ];
        return parent::renderForm();
    }



}