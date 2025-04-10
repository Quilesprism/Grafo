function guardar_estado()
{
	uid = $("#uid").html();

	$.post( "http://localhost:3000/escalera/servicios/insercion_Juego_escalera.php", {id: uid, intento : contaIntentos, movimiento : contaMovimientos, trayectoria:movimiento_v, err : err.toString()} )
	.done(function( data ) {
		//alert( "Data Loaded: " + data );
	});
	// alert("estadoActual:"+movimiento_v);
	// alert("Llevas 20 movimientos");




}
