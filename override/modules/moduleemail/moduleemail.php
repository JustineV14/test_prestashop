<?php
if (!defined('_CAN_LOAD_FILES_'))
    exit;

if (!defined('_PS_VERSION_'))
  exit;

class moduleemailOverride extends moduleemail
{
  public function __construct()
  {



    $this->name = 'moduleemail';
    $this->tab = 'emailing';
    $this->version = '1.0';
    $this->author = 'Justine VINCENT';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.7');
    $this->dependencies = array('blockcart');

    parent::__construct();

    $this->displayName = $this->l('Module Email');
    $this->description = $this->l('Description of my module.');

    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    if (!Configuration::get('Module Email'))
      $this->warning = $this->l('No name provided');
    }


    public function install()
    {
      return (parent::install() &&
        $this->registerHook('top'));
    }

    public function uninstall()
    {
      if (!parent::uninstall() ||
        !Configuration::deleteByName('Module Email'))
        return false;
      return true;
    }

    public function mail(){
      global $cookie;
      $sujet = 'Stock des produits';
      $donnees = array('{nom}'  => 'VINCENT' ,  '{prenom}'  => 'Justine' );
      $destinataire = 'justinevin14@gmail.com';

      Mail::Send(intval($cookie->id_lang), 'montemplatetest', $sujet , $donnees, $destinataire, NULL, NULL, 'Site PrestaShop', NULL, NULL, 'mails/');
    }

    public function stock_changed(){
      $stock = Product::getNewProducts((int) $this->context->language->id, 0, (int)Configuration::get('NEW_PRODUCTS_NBR'));

    }


}
?>
