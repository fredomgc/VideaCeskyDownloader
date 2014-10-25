<?php
// source: /var/www/VideaCeskyDownloader/app/templates/Start/done.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2804338784', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3761b1662f_content')) { function _lb3761b1662f_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<h1><?php echo $title ?></h1>
	</div>
</div>


<div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<table class="table">
<?php $iterations = 0; foreach ($data as $single) { ?>
				<tr>
					<td><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($single["thumbnail"]), ENT_COMPAT) ?>"></td>
					<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($single["youtube"]), ENT_COMPAT) ?>" class="btn btn-default">Stáhnout video</a></td>
					<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($single["subtitles"]), ENT_COMPAT) ?>" class="btn btn-default">Stáhnout titulky</a></td>
				</tr>
<?php $iterations++; } ?>
		</table>
	</div>
</div>
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