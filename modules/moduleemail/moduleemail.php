<?php
if (!defined('_PS_VERSION_'))
  exit;

class moduleemail extends Module
{
  public function __construct()
  {



    $this->name = 'moduleemail';
    //$this->tab = 'front_office_features';
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
      if (!parent::install())
			return false;
		if (!$this->registerHook('top'))
			return false;
		return true;
      /*if (parent::install() == false)
        return false;
      return true;*/
      //return (parent::install() && $this->registerHook('header'));
      return (parent::install() &&
        $this->registerHook('top'));
      //  Configuration::updateValue('Module Email', 'my friend');
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
      //$products->quantities
      $this->context->cookie->statsstock_id_category = Tools::getValue('statsstock_id_category');

		$ru = AdminController::$currentIndex.'&module='.$this->name.'&token='.Tools::getValue('token');
		$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
		$filter = ((int)$this->context->cookie->statsstock_id_category ? ' AND p.id_product IN (SELECT cp.id_product FROM '._DB_PREFIX_.'category_product cp WHERE cp.id_category = '.(int)$this->context->cookie->statsstock_id_category.')' : '');

		$sql = 'SELECT p.id_product, p.reference, pl.name,
				IFNULL((
					SELECT AVG(product_attribute_shop.wholesale_price)
					FROM '._DB_PREFIX_.'product_attribute pa
					'.Shop::addSqlAssociation('product_attribute', 'pa').'
					WHERE p.id_product = pa.id_product
					AND product_attribute_shop.wholesale_price != 0 ';
		if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
			$sql .= 'AND p.state = ' . Product::STATE_SAVED . ' ';
		}
		$sql .= '), product_shop.wholesale_price) as wholesale_price,
				IFNULL(stock.quantity, 0) as quantity
				FROM '._DB_PREFIX_.'product p
				'.Shop::addSqlAssociation('product', 'p').'
				INNER JOIN '._DB_PREFIX_.'product_lang pl
					ON (p.id_product = pl.id_product AND pl.id_lang = '.(int)$this->context->language->id.Shop::addSqlRestrictionOnLang('pl').')
				'.Product::sqlStock('p', 0);
		if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
			$sql .= ' WHERE p.state = ' . Product::STATE_SAVED . ' ';
		}
		$sql .= $filter;
		$products = Db::getInstance()->executeS($sql);

		foreach ($products as $key => $p)
			$products[$key]['stockvalue'] = $p['wholesale_price'] * $p['quantity'];

    }


    /*public function hookTop($params)
    {
      $this->context->smarty->assign(
          array(
              //'my_module_name' => Configuration::get('Module Email'),
              'my_module' => $this->stock_changed(),
              //'my_module_link' => $this->context->link->getModuleLink('mymodule', 'display')
          )
      );
      return $this->display(__FILE__, 'moduleemail.tpl');
    }*/

    public function getContent()
	{
		if (isset($_POST['submit'])){
			if (!empty($_POST['lastname']) AND !empty($_POST['firstname']))
				echo '
<h1>Bonjour '.$_POST['firstname'].' '.$_POST['lastname'].'</h1>
';
			else
				echo '<span class="warning" style="display: block;">Erreur : Veuillez entrer votre nom et prenom</span>';
		}

		echo '
<fieldset>
<legend> Administration du module : </legend>
<form method="post">
     				Nom :
<input name="lastname" type="text" />
     				Prenom :
<input name="firstname" type="text" />
<input name="submit" type="submit" value="Envoyer" />
     			</form></fieldset>
';

	}

  function hookTop($params){
		return $this->display(__FILE__, 'moduleemail.tpl');
	}



}
//$products = stock_changed();
?>
