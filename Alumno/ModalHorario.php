<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<!-- Comienzo del MODAL DEL FORMULARIO -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin: 10px;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:black">Nuevo Ciclo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST">
					<div id="alerta9"></div>
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="text" id="idciclo" name="idciclo" class="form-control" placeholder="00-0000" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Actual</label>
						</div>							
					</div>


					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Inicio</label>
						</div>

						
						

						<div class="md-form">
							<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Final</label>
						</div>

						
					</div>
					
					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_ciclos" value="Crear Ciclo" id="Guardar_ciclos">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->

