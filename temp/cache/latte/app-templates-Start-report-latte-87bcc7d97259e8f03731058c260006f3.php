<?php
// source: /var/www/VideaCeskyDownloader/app/templates/Start/report.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5202196088', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb644dabe811_content')) { function _lb644dabe811_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<h1>Nahlášení chyby nebo chybějící funkce</h1>
	</div>
</div>


<div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<p>Něco nefunguje? Chybí vám zde nějaká funkce? Prosím, neostýchejte se mi problém nahlásit. Učinit tak můžete poholdně přímo na GitHubu, na kterém je tento projekt veden.</p>
		<p><a href="https://github.com/fredomgc/VideaCeskyDownloader/issues" class="btn btn-default">Nahlásit chybu nebo chybějící funkci</a></p>
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