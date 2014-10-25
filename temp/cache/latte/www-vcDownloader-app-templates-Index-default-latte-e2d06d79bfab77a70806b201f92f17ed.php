<?php
// source: /var/www/vcDownloader/app/templates/Index/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2492340652', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb79d3236196_content')) { function _lb79d3236196_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<h1>Stahování z VideaČesky.cz</h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["urlForm"], array('role' => "form")) ?>

			<div class="form-group">
				<?php if ($_label = $_form["url"]->getLabel()) echo $_label  ?>

				<?php echo $_form["url"]->getControl()->addAttributes(array('class' => "form-control")) ?>

			</div>

			<?php echo $_form["done"]->getControl()->addAttributes(array('class' => "btn btn-default")) ?>

		<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

	</div>
</div>


<?php if (isset($test)) { ?>
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($test), ENT_COMPAT) ?>" class="btn btn-default">stáhnout</a>
<?php } ?>

<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 