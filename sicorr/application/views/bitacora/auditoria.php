<fieldset style="width:92%; margin:0 auto;">
   <legend><strong>Filtro</strong></legend>
   Usuario del sistema: <?php echo form::dropdown(array('id'=>'usuario_id','name'=>'usuario_id'),$usuarios,(isset($usuario_id))?$usuario_id:0)?>
   <br />
   <br />
   Numero de Registros: <input type="text" name="nreg" id="nreg" value="0" style="width: 40px;"/>
   Fecha desde:<input type="text" name="fecha" id="fecha" style="width: 100px;" />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="filtrar">Consultar</button>
</fieldset>
