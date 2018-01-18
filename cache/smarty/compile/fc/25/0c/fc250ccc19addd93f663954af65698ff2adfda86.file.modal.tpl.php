<?php /* Smarty version Smarty-3.1.19, created on 2018-01-18 21:53:18
         compiled from "C:\wamp\www\test_prestashop\admin480j1fzfw\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119525a61093ea07598-85279365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc250ccc19addd93f663954af65698ff2adfda86' => 
    array (
      0 => 'C:\\wamp\\www\\test_prestashop\\admin480j1fzfw\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1516122586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119525a61093ea07598-85279365',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a61093ea0dc98_63556883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a61093ea0dc98_63556883')) {function content_5a61093ea0dc98_63556883($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
