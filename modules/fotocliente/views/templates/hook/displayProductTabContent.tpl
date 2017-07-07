<h3 class="page-product-heading">Fotos de clientes hora {date('y-m-d m:s')} </h3>

<!-- start messages de form enviado -->
	{if isset($saveForm)}
	<div class="alert alert-success">{l s="Imagen añadida" mod="fotocliente"}</div>
	{/if}
	{if isset($errorForm)}
	<div class="alert alert-danger">{$errorForm}</div>
	{/if}
<!-- end messages de form enviado -->

<!-- start listado de fotos subidas del producto -->
{foreach  from=$fotos item=foto}
	<div class="fotocliente_bloque">
	
		<img class="fotocliente_img col-xs-12 col-md-6" src="{$base_dir}{$foto.foto}" alt="">
			{if $enabled_coomment==1}
			<div class="fotocliente_comment col-xs-12 col-md-6">{$foto.comment}</div>
			{/if}
	
		
		
	</div>
{/foreach}
<!-- end listado de fotos subidas del producto -->

<!-- crear una  variable -->
{assign var="params" value=['module_action'=>'listafotos']}
<p>
<a href="{$link->getModuleLink('fotocliente','fotos',$params)}">
	<span>ver todas las fotos aqui</span>
</a> 
</p>
{assign var="name" value="Bob"}

The value of $name is {$name}.


<div class="fotocliente_bloque">
<form action="" method="post"  enctype="multipart/form-data" id="comment-form">
	<div class="form-group col-xs-12 col-md-4">
	<label for="foto">{l s="Foto" mod="fotocliente"}: </label>
	<input type="file" name="foto" id="foto">		
	</div>

	<div class="form-group col-xs-12 col-md-4" style="{if $enabled_coomment==0}display: none;{/if}">
	<label for="coment">{l s="Comentario" mod="fotocliente"}: {$enabled_coomment}</label>
	<textarea name="commentario" id="commentario" class="formcontrol"></textarea>		
	</div>
	<br>

	<div class="submit fotocliente_bloque">
	<button type="submit" name="fotocliente_submit_foto" class="button btn btn-default button-medium">
	<span>{l s="Enviar" mod="fotocliente"} <i class="icon-chevron-right right"></i></span>
		
	</button>
		
	</div>
</form>
	
</div>