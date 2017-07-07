<fieldset>
	<h2>Configuracion del modulos de Fotos del cliente</h2>
	<div class="panel">
		<div class="panel-heading">
			<legend><img src="../admin/cog.gif" alt="" width="16"/> Configuracion</legend>

		</div>
		<form action="" method="post" accept-charset="utf-8">
			
			<div class="form-group">
			<label for="exampleInputEmail1">Añadir comentario</label>
				<img src="../img/admin/enabled.gif" alt=""/>
        <input type="radio" class="form-check-input" 
        name="enable_comment" 
        id="enable_comment_1"  
        value="1" {if $enabled_coomment=="1"}checked {/if} />si
        
        <label for="exampleInputEmail1">Añadir comentario</label>
				<img src="../img/admin/disabled.gif" alt=""/>
        <input type="radio" 
        class="form-check-input" 
        name="enable_comment" 
        id="enable_comment_0" 
        value="0" {if $enabled_coomment=="0"}checked {/if} />no
        
       
     
				
			</div>

			<div class="panel-footer">			
				<input class="btn btn-default pull-right" type="submit" name="fotocliente_form" value="Guardar">
			</div>
		</form>
	</div>
</fieldset>