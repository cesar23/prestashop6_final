{if isset($error)}
        {if $error==1}
            <div class="alert alert-danger">{$msg}</div>
        {else}
            <div class="alert alert-success">{$msg}</div>
        {/if}

    {/if}

<form id="" class="defaultForm form-horizontal" action="{$envio_form}" method="post" accept-charset="utf-8">
  
   <div class="panel" id="fieldset_0">
      <div class="panel-heading">
         <i class="icon-cogs"></i> {l s="Personalizacion de Nombre Widget" mod="{$moduloName}"}
      </div>
      <div class="form-wrapper">
         <div class="form-group">
            <label class="control-label col-lg-3">
            {l s="Nombre:" mod="{$moduloName}"}:
            </label>
            <div class="col-lg-9">
            <input type="text" name="nombre_widget" id="nombre_widget" value="{$soluwidget1_nombre_widget}">
              
            </div>
         </div>
      </div>
      <!-- /.form-wrapper -->
      <div class="panel-footer">
         <button type="submit" value="1"  name="{$moduloName}panelNombreWidget" class="btn btn-default pull-right">
         <i class="process-icon-save"></i> Guardar
         </button>
      </div>
   </div>
</form>