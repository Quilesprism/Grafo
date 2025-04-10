function guardar_estado()
{
	uid = $("#uid").html();

	$.post( "http://escalera.juegosmatematicos.online/servicios/insercion_Juego_escalera.php", {id: uid, intento : contaIntentos, movimiento : contaMovimientos, trayectoria:movimiento_v} )
	.done(function( data ) {
		//alert( "Data Loaded: " + data );
	});
	// alert("estadoActual:"+movimiento_v);
	// alert("Llevas 20 movimientos");
	
	


}