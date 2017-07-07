{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{capture name=path}{l s='Contact'}{/capture}
<h1 class="page-heading bottom-indent">
	{l s='Customer service'} - {if isset($customerThread) && $customerThread}{l s='Your reply'}{else}{l s='Contact us'}{/if}
</h1>
{if isset($confirmation)}
<p class="alert alert-success">{l s='Your message has been successfully sent to our team.'}</p>
<ul class="footer_links clearfix">
	<li>
		<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
			<span>
				<i class="icon-chevron-left"></i>{l s='Home'}
			</span>
		</a>
	</li>
</ul>
{elseif isset($alreadySent)}
<p class="alert alert-warning">{l s='Your message has already been sent.'}</p>
<ul class="footer_links clearfix">
	<li>
		<a class="btn btn-default button button-small" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
			<span>
				<i class="icon-chevron-left"></i>{l s='Home'}
			</span>
		</a>
	</li>
</ul>
{else}
{include file="$tpl_dir./errors.tpl"}
<!-- start Maps -->
<div id="contact-mapa_site">
	
	<div class="row">
		<div class="col-xs-12 col-md-3">

			<address class="contact-info">
				<dl>
					<dt class="font-accent text-bold text-uppercase text-mine-shaft"><i class="icon-map-marker"></i>  Direccion</dt>
					<dd class="offset-top-4">AV. Del Parque 535,  muy cerca a la universidad Cesar Vallejo San Juan De Lurigancho, Lima, Peru.</dd>
				</dl>
				<dl class="offset-top-25">
					<dt class="font-accent text-bold text-uppercase text-mine-shaft"> <i class="icon-calendar"></i> Horarios de Atencion</dt>
					<dd>Todos los dias a  a todos los horarios</dd>
				</dl>
				<dl class="offset-top-30">
					<dt class="font-accent text-bold text-uppercase text-mine-shaft"><i class="icon-phone"></i>  Telefonos:</dt>
					<dd><a href="callto:#" class="text-silver-chalice"> 947903744</a>, <a href="callto:#" class="text-silver-chalice">RPM#947903744</a>
					</dd>
				</dl>
				<dl class="offset-top-30">
					<dt class="font-accent text-bold text-uppercase text-mine-shaft"><i class="icon-envelope-alt"></i> Correos:</dt>
					<dd class="offset-top-5"><a href="mailto:#" class="text-primary">elizabeth.yupanqui.gamboa@gmail.com</a></dd>
				</dl>
			</address>
		</div>
		<div class="col-xs-12 col-md-9">
			<!--<div id="map"></div>-->
			<div id="map" style="width:840px;height:400px;border:1px solid #929292;"></div>
		</div>
	</div>
	{literal}


	<script>

		function initMap() {

			var myLatLng = {lat: -11.9798615, lng: -77.0014586};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {        	 
        	center: myLatLng,
        	scrollwheel: false,
        	zoom: 17
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
        	map: map,
        	position: myLatLng,
        	title: 'Estamos ubicados Aqui!',
            animation:google.maps.Animation.BOUNCE //animacion

        });
    }
</script>

{/literal}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHrgdkxq_I1mabWANBfNBuT8vaJkR_Zik&callback=initMap"
async defer></script>
</div>
<!-- end Maps -->

{if $tipo_form=='libro_reclamaciones'}
<!-- init formulario reclamaciones  -->
{literal} 
<script>
  $( function() {
    $( ".datepicker" ).datepicker();

// $("#form_contact").validate({
//   submitHandler: function(form) {
//     // do other things for a valid form
//     //form.submit();
//     alert("-----");

// jQuery.validator.setDefaults({
//   debug: true,
//   success: "valid"
// });
//     $("#form_contact").validate({
//     	"field_fecha": {
//     		//required: true,
//     		 date: true
//     	}
//     });
//   }
// });





  } );
  </script>
  {/literal} 
<form action="{$request_uri}" method="post" id="form_contact" class="contact-form-box" enctype="multipart/form-data">
	<h3>Libro de Reclamaciones</h3>

	<fieldset>
		<div class="clearfix">

		<select id="id_contact" class="form-control" name="id_contact" style="display: none">
					<option value="0">{l s='-- Choose --'}</option>
					{foreach from=$contacts item=contact}
					<option value="3" selected="selected">Libro de reclamaciones</option>					
					{/foreach}
				</select>


			<div class="form-group selector1  pfg-datepicker-elements">
				<label for="field_fecha">Fecha <em class="required">*</em></label>
				<input type="text" pattern="{literal}^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}${/literal}" name="fecha" id="field_fecha"  required class="form-control datepicker"/>
			</div>

			<div class="form-group selector1">
				<label for="field_nombre">Nombre <em class="required">*</em></label>
				<input type="text" name="nombre" id="field_nombre" required class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_domicilio">Domicilio <em class="required">*</em></label>
				<input type="text" name="domicilio" id="field_domicilio" required class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_dnice">DNI/CE</label>
				<input type="text" name="dnice" id="field_dnice" class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_telefono">Telefono</label>
				<input type="text" name="telefono" id="field_telefono" class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_email">Email <em class="required">*</em></label>
				<input type="email" name="from" id="from" required class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_apoderado">Apoderado</label>
				<input type="text" name="apoderado" id="field_apoderado" class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_tipo_de_producto_contratado">Tipo de producto contratado <em class="required">*</em></label>
				<span><label class="checkbox"><input type="radio" value="Producto" name="tipo_de_producto_contratado" id="field_tipo_de_producto_contratado" required class="form-control "/> Producto</label><label class="checkbox"><input type="radio" value="Servicio" name="tipo_de_producto_contratado" id="field_tipo_de_producto_contratado" required class="form-control "/> Servicio</label></span>
			</div>

			<div class="form-group selector1">
				<label for="field_descripcion_del_bien_contratado">Descripci&oacute;n del bien contratado <em class="required">*</em></label>
				<textarea rows="15" cols="10" name="descripcion_del_bien_contratado" id="field_descripcion_del_bien_contratado" required class="form-control "></textarea>
			</div>

			<div class="form-group selector1">
				<label for="field_monto_del_bien_contratado">Monto del bien contratado</label>
				<input type="number" name="monto_del_bien_contratado" id="field_monto_del_bien_contratado" class="form-control "/>
			</div>

			<div class="form-group selector1">
				<label for="field_detalle_de_la_reclamacion">Detalle de la Reclamaci&oacute;n <em class="required">*</em></label>
				<span><label class="checkbox"><input type="radio" value="Queja" name="detalle_de_la_reclamacion" id="field_detalle_de_la_reclamacion" required class="form-control "/> Queja</label><label class="checkbox"><input type="radio" value="Reclamo" name="detalle_de_la_reclamacion" id="field_detalle_de_la_reclamacion" required class="form-control "/> Reclamo</label></span>
			</div>

			<div class="form-group selector1">
				<label for="field_descripcion_de_la_reclamacion">Descripci&oacute;n de la reclamaci&oacute;n <em class="required">*</em></label>
				<textarea rows="15" cols="10" name="message" id="message" required class="form-control "></textarea>
			</div>
		</div>

		<input class="form-control grey" type="hidden" name="id_order" id="id_order" value="" readonly="readonly" />
		<input class="form-control grey" type="hidden" name="tipo_form" id="tipo_form" value="{$tipo_form}"  />
		

		<div class="submit">
			<button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span>{l s='Send'}<i class="icon-chevron-right right"></i></span></button>
		</div>
		
	</fieldset>
</form>

<!-- end formulario reclamaciones  -->


{elseif $tipo_form=='formulario'}

{else}
<!-- init formulario defecto  -->
<form action="{$request_uri}" method="post" class="contact-form-box" enctype="multipart/form-data">
	<fieldset>
		<h3 class="page-subheading">{l s='send a message'}</h3>
		<div class="clearfix">
			<div class="col-xs-12 col-md-3">
				<div class="form-group selector1">
					<label for="id_contact">{l s='Subject Heading'}</label>
					{if isset($customerThread.id_contact) && $customerThread.id_contact && $contacts|count}
					{assign var=flag value=true}
					{foreach from=$contacts item=contact}
					{if $contact.id_contact == $customerThread.id_contact}
					<input type="text" class="form-control" id="contact_name" name="contact_name" value="{$contact.name|escape:'html':'UTF-8'}" readonly="readonly" />
					<input type="hidden" name="id_contact" value="{$contact.id_contact|intval}" />
					{$flag=false}
					{/if}
					{/foreach}
					{if $flag && isset($contacts.0.id_contact)}
					<input type="text" class="form-control" id="contact_name" name="contact_name" value="{$contacts.0.name|escape:'html':'UTF-8'}" readonly="readonly" />
					<input type="hidden" name="id_contact" value="{$contacts.0.id_contact|intval}" />
					{/if}
				</div>
				{else}
				<select id="id_contact" class="form-control" name="id_contact">
					<option value="0">{l s='-- Choose --'}</option>
					{foreach from=$contacts item=contact}
					<option value="{$contact.id_contact|intval}"{if isset($smarty.request.id_contact) && $smarty.request.id_contact == $contact.id_contact} selected="selected"{/if}>{$contact.name|escape:'html':'UTF-8'}</option>
					{/foreach}
				</select>
			</div>
			<p id="desc_contact0" class="desc_contact{if isset($smarty.request.id_contact)} unvisible{/if}">&nbsp;</p>
			{foreach from=$contacts item=contact}
			<p id="desc_contact{$contact.id_contact|intval}" class="desc_contact contact-title{if !isset($smarty.request.id_contact) || $smarty.request.id_contact|intval != $contact.id_contact|intval} unvisible{/if}">
				<i class="icon-comment-alt"></i>{$contact.description|escape:'html':'UTF-8'}
			</p>
			{/foreach}
			{/if}
			<p class="form-group">
				<label for="email">{l s='Email address'}</label>
				{if isset($customerThread.email)}
				<input class="form-control grey" type="text" id="email" name="from" value="{$customerThread.email|escape:'html':'UTF-8'}" readonly="readonly" />
				{else}
				<input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="{$email|escape:'html':'UTF-8'}" />
				{/if}
			</p>
			{if !$PS_CATALOG_MODE}
			{if (!isset($customerThread.id_order) || $customerThread.id_order > 0)}
			<div class="form-group selector1">
				<label>{l s='Order reference'}</label>
				{if !isset($customerThread.id_order) && isset($is_logged) && $is_logged}
				<select name="id_order" class="form-control">
					<option value="0">{l s='-- Choose --'}</option>
					{foreach from=$orderList item=order}
					<option value="{$order.value|intval}"{if $order.selected|intval} selected="selected"{/if}>{$order.label|escape:'html':'UTF-8'}</option>
					{/foreach}
				</select>
				{elseif !isset($customerThread.id_order) && empty($is_logged)}
				<input class="form-control grey" type="text" name="id_order" id="id_order" value="{if isset($customerThread.id_order) && $customerThread.id_order|intval > 0}{$customerThread.id_order|intval}{else}{if isset($smarty.post.id_order) && !empty($smarty.post.id_order)}{$smarty.post.id_order|escape:'html':'UTF-8'}{/if}{/if}" />
				{elseif $customerThread.id_order|intval > 0}
				<input class="form-control grey" type="text" name="id_order" id="id_order" value="{if isset($customerThread.reference) && $customerThread.reference}{$customerThread.reference|escape:'html':'UTF-8'}{else}{$customerThread.id_order|intval}{/if}" readonly="readonly" />
				{/if}
			</div>
			{/if}
			{if isset($is_logged) && $is_logged}
			<div class="form-group selector1">
				<label class="unvisible">{l s='Product'}</label>
				{if !isset($customerThread.id_product)}
				{foreach from=$orderedProductList key=id_order item=products name=products}
				<select name="id_product" id="{$id_order}_order_products" class="unvisible product_select form-control"{if !$smarty.foreach.products.first} style="display:none;"{/if}{if !$smarty.foreach.products.first} disabled="disabled"{/if}>
					<option value="0">{l s='-- Choose --'}</option>
					{foreach from=$products item=product}
					<option value="{$product.value|intval}">{$product.label|escape:'html':'UTF-8'}</option>
					{/foreach}
				</select>
				{/foreach}
				{elseif $customerThread.id_product > 0}
				<input  type="hidden" name="id_product" id="id_product" value="{$customerThread.id_product|intval}" readonly="readonly" />
				{/if}
			</div>
			{/if}
			{/if}
			{if $fileupload == 1}
			<p class="form-group">
				<label for="fileUpload">{l s='Attach File'}</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="{if isset($max_upload_size) && $max_upload_size}{$max_upload_size|intval}{else}2000000{/if}" />
				<input type="file" name="fileUpload" id="fileUpload" class="form-control" />
			</p>
			{/if}
		</div>
		<div class="col-xs-12 col-md-9">
			<div class="form-group">
				<label for="message">{l s='Message'}</label>
				<textarea class="form-control" id="message" name="message">{if isset($message)}{$message|escape:'html':'UTF-8'|stripslashes}{/if}</textarea>
			</div>
		</div>
	</div>

<input class="form-control grey" type="hidden" name="tipo_form" id="tipo_form" value="{$tipo_form}"  />

	<div class="submit">
		<button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span>{l s='Send'}<i class="icon-chevron-right right"></i></span></button>
	</div>
</fieldset>
</form>
<!-- end formulario defecto  -->

{/if}





{/if}
{addJsDefL name='contact_fileDefaultHtml'}{l s='No file selected' js=1}{/addJsDefL}
{addJsDefL name='contact_fileButtonHtml'}{l s='Choose File' js=1}{/addJsDefL}
