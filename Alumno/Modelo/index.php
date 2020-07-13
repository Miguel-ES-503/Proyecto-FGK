<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iindex</title>
</head>
<body>

<form action="subirpdf.php"  method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="form-group">

		<input type="file" name="archivo" class="form-control-file"  id="exampleFormControlFile1" accept="application/pdf,application/vnd.ms-excel" >
	</div>

	<div class="form-group">
		<label class="sr-only" for="observaciones">Comentario</label>
		<textarea name="Comentario" placeholder="Comentario"
		class="Comentario form-control" id="Comentario"></textarea>
	</div>

	<input type="text" name="iduser" placeholder="user">
	<input type="text" name="ciclo" placeholder="ciclo"> 
	<input type="submit" name="comprobante" value="Subir">
	</form>
</body>
</html>