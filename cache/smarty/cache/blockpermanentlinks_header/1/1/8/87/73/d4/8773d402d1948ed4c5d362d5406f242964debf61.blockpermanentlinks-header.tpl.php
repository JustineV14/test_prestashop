<?php /*%%SmartyHeaderCode:171305a5e87762eb0f1-57606667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8773d402d1948ed4c5d362d5406f242964debf61' => 
    array (
      0 => 'C:\\wamp\\www\\test_prestashop\\themes\\default-bootstrap\\modules\\blockpermanentlinks\\blockpermanentlinks-header.tpl',
      1 => 1516139828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171305a5e87762eb0f1-57606667',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a5e8db13f5038_89275533',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5e8db13f5038_89275533')) {function content_5a5e8db13f5038_89275533($_smarty_tpl) {?>
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
