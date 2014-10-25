<?php
// source: /var/www/vcDownloader/app/components/FlashMessages/FlashMessages.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2015318757', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<div class="row">
<?php if (count($bad)>0) { ?>	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php $iterations = 0; foreach ($bad as $one) { ?>
			<ul>
				<li><?php echo Latte\Runtime\Filters::escapeHtml($one, ENT_NOQUOTES) ?></li> 
			</ul>
<?php $iterations++; } ?>
	</div>
<?php } ?>
	
<?php if (count($info)>0) { ?>	<div class="alert alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php $iterations = 0; foreach ($info as $one) { ?>
			<ul>
				<li><?php echo Latte\Runtime\Filters::escapeHtml($one, ENT_NOQUOTES) ?></li> 
			</ul>
<?php $iterations++; } ?>
	</div>
<?php } ?>
	
<?php if (count($good)>0) { ?>	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php $iterations = 0; foreach ($good as $one) { ?>
			<ul>
				<li><?php echo Latte\Runtime\Filters::escapeHtml($one, ENT_NOQUOTES) ?></li> 
			</ul>
<?php $iterations++; } ?>
	</div>	
<?php } ?>
</div>
