<div class="row">
  
    <div class="span12">
      
      <div class="checkout-steps clearfix">
  
        <p class="step">
          <span class="entypo chevron-right"></span>

          <a style="color:black; "href="<?php echo base_url(); ?>principal/detalle_pedido">1. Detalles</a>
        </p>
      
        <p class="step step-active">
          <span class="entypo chevron-right"></span>
          2. Forma de Pago
        </p>
      
        <p class="step">
          3. Confirmación
        </p>
      
      </div>
      
    </div>
    
  </div>


  <div class="row">
    <div class="span3"></div>
    <div class="span9">
       <?php $attributes = array('class' => 'form-horizontal span6'); 

        echo form_open('principal/enviar_pedido', $attributes);  ?>
        <fieldset>
          <legend>Tarjeta de Credito</legend>
          <div class="control-group">
            <label class="control-label">Nombre del Titular</label>
            <div class="controls">
              <input name="nombre" type="text" class="input-block-level" pattern="\w+ \w+.*" title="Escribe tu nombre y apellido" required>
            </div>
          </div>
      
          <div class="control-group">
            <label class="control-label">Número tarjeta</label>
            <div class="controls">
              <div class="row-fluid">
                <div class="span3">
                  <input name="p_digitos" type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Primeros cuatro digitos" required>
                </div>
                <div class="span3">
                  <input name="s_digitos" type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Segundos cuatro digitos" required>
                </div>
                <div class="span3">
                  <input name="t_digitos" type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Terceros cuatro digitos" required>
                </div>
                <div class="span3">
                  <input name="c_digitos" type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Ultimos cuatro digitos" required>
                </div>
              </div>
            </div>
          </div>
       
          <div class="control-group">
            <label class="control-label">Fecha Vencimiento</label>
            <div class="controls">
              <div class="row-fluid">
                <div class="span9">
                  <select class="input-block-level" name="fecha_vencimiento">
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Diciembre</option>
                  </select>
                </div>
                <div class="span3">
                  <select class="input-block-level" name="ano_vencimiento">
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                    <option>2017</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
       
          <div class="control-group">
            <label class="control-label">Card CVV</label>
            <div class="controls">
              <div class="row-fluid">
                <div class="span3">
                  <input name="card_cvv" type="text" class="input-block-level" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required>
                </div>
                <div class="span8">
                  <!-- screenshot may be here -->
                </div>
              </div>
            </div>
          </div>
       
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-warning" value="Cancelar" 
            onclick="location.href='<?php echo base_url();?>principal/index'">Cancelar</button>
             <a href="<?php echo base_url(); ?>principal/reporte" class="btn btn-success">PDF</a>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
