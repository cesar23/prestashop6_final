<h3>listadod e fotoss</h3>
<!-- start listado de fotos subidas del producto -->
{foreach  from=$fotos item=foto}
	<div class="fotocliente_bloque">
	
		<img class="fotocliente_img col-xs-12 " src="{$base_dir}{$foto.foto}" alt="">
			{if $enabled_coomment==1}
			<div class="fotocliente_comment col-xs-12">{$foto.comment}</div>
			{/if}
	
		
		
	</div>
{/foreach}
<!-- end listado de fotos subidas del producto -->