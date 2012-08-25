<script id="alert-box" type="text/x-handlebars-template">
<div class="alert alert-{{type}} fade in">
	{{#if dismiss}}
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	{{/if}}

	{{#if heading}}
	<h4 class="alert-heading">{{heading}}</h4>
	{{/if}}
	{{{parseEmoticons error}}}
</div>
</script>