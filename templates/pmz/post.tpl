{include file='templates/pmz/header.tpl'}

{foreach from=$downListPage key=k item=v}
<section class="section" id="{$v.name}">
		<div class="container">
			<h1>{$v.title}</h1>
			<p>{$v.value}</p>
		</div>
</section>
{/foreach}

{include file='templates/pmz/footer.tpl'}