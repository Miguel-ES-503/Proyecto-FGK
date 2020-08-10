	<?php 
	if (isset($_SESSION['message'])){?>
		<div id="EstiloAlerta" class="alert alert-<?= $_SESSION['message2']?> alert-dismissible fade show" role="alert" >
			<?= $_SESSION['message']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>	
		</div>
		<br>
		<?php if (isset($_SESSION['message'])==isset($_SESSION['message'])) 
		{
			$Vaciar = null;
			$_SESSION['message']=$Vaciar;
		}	}
		?>