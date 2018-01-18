<?php /*%%SmartyHeaderCode:11295a5e8fb8e3cc80-85111406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ba053d18b1f14f1f6bf47e76c2fce909afd903e' => 
    array (
      0 => 'C:\\wamp\\www\\test_prestashop\\modules\\blockpermanentlinks\\blockpermanentlinks-header.tpl',
      1 => 1516146139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11295a5e8fb8e3cc80-85111406',
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a5e8fb8ec34a4_11993228',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5e8fb8ec34a4_11993228')) {function content_5a5e8fb8ec34a4_11993228($_smarty_tpl) {?>
<!-- Block permanent links module HEADER -->
<ul id="header_links">
	<li id="header_link_contact"><a href="http://localhost/test_prestashop/nous-contacter" title="contact">contact</a></li>
	<li id="header_link_sitemap"><a href="http://localhost/test_prestashop/plan-site" title="plan du site">plan du site</a></li>
	<li id="header_link_bookmark">
		<script type="text/javascript">writeBookmarkLink('http://localhost/test_prestashop/', 'Test Prestashop', 'favoris');</script>
	</li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>
