<section id="soluwidget1_left" class="block">
	<p class="title_block">			
			{$soluwidget1_nombre_widget}		
	</p>
	<div class="block_content list-block" style="">
		{foreach  from=$listado item=row}
		
		<div class="soluwidget1_left_contenido">	
			{$row.contenido}
		</div>
		{if $row.show_titulo == 1}
		<div class="text-center soluwidget1_titulo">{$row.titulo}</div>
		{/if}
		<hr>

		{/foreach}
	</div>
</section>