<?php
// source: /var/www/VideaCeskyDownloader/app/templates/Start/bookmarklet.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5657962696', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb45ee45cc50_content')) { function _lb45ee45cc50_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<h1>Bookmarklet</h1>
	</div>
</div>


<div class="row">
	<div class="col-xs-10  col-xs-offset-1">
		<p>Stahování videí a titulků bude ještě jednodušší, pokud si přidáte následující bookmarklet do oblíbených záložek.</p>
		<p>
		<ol>
			<li>Klikněte levým tlačítkem myši na odkaz níže a držte tlačítko myši stále zmáčknuté</li>
			<li>Nyní přetáhněte odkaz mezi záložky ve vašem webovém prohlížeči</li>
			<li>Hotovo! Na stránce s videem vám nyní bude pouze stačit kliknout na právě vytvořenou záložku.</li>
		</ol>
		</p>

		<p>
			<a href='javascript:window.location.replace("<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link("//Start:"), ENT_QUOTES) ?>?url=" + document.URL);'>VideaČeskyDownloader</a>
		</p>
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