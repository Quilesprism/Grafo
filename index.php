<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba registro</title>
    <link rel="stylesheet"  href="css/estilo.css">
</head>
<body>
  <div class="formulario">
      
  
    <form action="servicios/insercion_Usuario_escalera.php" method="post">
      <div>
        <img class=ud src="images/logoUD.png"/>
         <img class=met src="images/logoMet2.png"/>
      </div>   

      <div class="campos">
        <h1>¡Registrate!</h1>
         <input type="text" name="nombre" placeholder="Iniciales de tu nombre">

		<p>¿Cuántos años tienes?</p>

			<select  name="edad" >
			<?php for ($i = 1; $i < 80; $i++) : ?>
			<option value = <?php echo $i?> > <?php echo $i?> </option>
			<?php endfor; ?>
			</select>   

				<p>¿De qué país eres?</p>

				<select name="pais" id="pais">

					<option value="AFGANISTAN">AFGANISTAN</option>
					<option value="ALBANIA">ALBANIA</option>
					<option value="ALEMANIA">ALEMANIA</option>
					<option value="ANDORRA">ANDORRA</option>
					<option value="ANGOLA">ANGOLA</option>
					<option value="ANGUILLA">ANGUILLA</option>
					<option value="ANTIGUA Y BARBUDA">ANTIGUA Y BARBUDA</option>
					<option value="ANTILLAS HOLANDESAS">ANTILLAS HOLANDESAS</option>
					<option value="ARABIA SAUDI">ARABIA SAUDI</option>
					<option value="ARGELIA">ARGELIA</option>
					<option value="ARGENTINA">ARGENTINA</option>
					<option value="ARMENIA">ARMENIA</option>
					<option value="ARUBA">ARUBA</option>
					<option value="AUSTRALIA">AUSTRALIA</option>
					<option value="AUSTRIA">AUSTRIA</option>
					<option value="AZERBAIYAN">AZERBAIYAN</option>
					<option value="BAHAMAS">BAHAMAS</option>
					<option value="BAHREIN">BAHREIN</option>
					<option value="BANGLADESH">BANGLADESH</option>
					<option value="BARBADOS">BARBADOS</option>
					<option value="BELARUS">BELARUS</option>
					<option value="BELGICA">BELGICA</option>
					<option value="BELICE">BELICE</option>
					<option value="BENIN">BENIN</option>
					<option value="BERMUDAS">BERMUDAS</option>
					<option value="BHUTÁN">BHUTÁN</option>
					<option value="BOLIVIA">BOLIVIA</option>
					<option value="BOSNIA Y HERZEGOVINA">BOSNIA Y HERZEGOVINA</option>
					<option value="BOTSWANA">BOTSWANA</option>
					<option value="BRASIL">BRASIL</option>
					<option value="BRUNEI">BRUNEI</option>
					<option value="BULGARIA">BULGARIA</option>
					<option value="BURKINA FASO">BURKINA FASO</option>
					<option value="BURUNDI">BURUNDI</option>
					<option value="CABO VERDE">CABO VERDE</option>
					<option value="CAMBOYA">CAMBOYA</option>
					<option value="CAMERUN">CAMERUN</option>
					<option value="CANADA">CANADA</option>
					<option value="CHAD">CHAD</option>
					<option value="CHILE">CHILE</option>
					<option value="CHINA">CHINA</option>
					<option value="CHIPRE">CHIPRE</option>
					<option value="COLOMBIA" selected="selected">COLOMBIA</option>
					<option value="COMORES">COMORES</option>
					<option value="CONGO">CONGO</option>
					<option value="COREA">COREA</option>
					<option value="COREA DEL NORTE ">COREA DEL NORTE </option>
					<option value="COSTA DE MARFIL">COSTA DE MARFIL</option>
					<option value="COSTA RICA">COSTA RICA</option>
					<option value="CROACIA">CROACIA</option>
					<option value="CUBA">CUBA</option>
					<option value="DINAMARCA">DINAMARCA</option>
					<option value="DJIBOUTI">DJIBOUTI</option>
					<option value="DOMINICA">DOMINICA</option>
					<option value="ECUADOR">ECUADOR</option>
					<option value="EGIPTO">EGIPTO</option>
					<option value="EL SALVADOR">EL SALVADOR</option>
					<option value="EMIRATOS ARABES UNIDOS">EMIRATOS ARABES UNIDOS</option>
					<option value="ERITREA">ERITREA</option>
					<option value="ESLOVENIA">ESLOVENIA</option>
					<option value="ESPAÑA">ESPAÑA</option>
					<option value="ESTADOS UNIDOS DE AMERICA">ESTADOS UNIDOS DE AMERICA</option>
					<option value="ESTONIA">ESTONIA</option>
					<option value="ETIOPIA">ETIOPIA</option>
					<option value="FIJI">FIJI</option>
					<option value="FILIPINAS">FILIPINAS</option>
					<option value="FINLANDIA">FINLANDIA</option>
					<option value="FRANCIA">FRANCIA</option>
					<option value="GABON">GABON</option>
					<option value="GAMBIA">GAMBIA</option>
					<option value="GEORGIA">GEORGIA</option>
					<option value="GHANA">GHANA</option>
					<option value="GIBRALTAR">GIBRALTAR</option>
					<option value="GRANADA">GRANADA</option>
					<option value="GRECIA">GRECIA</option>
					<option value="GROENLANDIA">GROENLANDIA</option>
					<option value="GUADALUPE">GUADALUPE</option>
					<option value="GUAM">GUAM</option>
					<option value="GUATEMALA">GUATEMALA</option>
					<option value="GUAYANA FRANCESA">GUAYANA FRANCESA</option>
					<option value="GUERNESEY">GUERNESEY</option>
					<option value="GUINEA">GUINEA</option>
					<option value="GUINEA ECUATORIAL">GUINEA ECUATORIAL</option>
					<option value="GUINEA-BISSAU">GUINEA-BISSAU</option>
					<option value="GUYANA">GUYANA</option>
					<option value="HAITI">HAITI</option>
					<option value="HONDURAS">HONDURAS</option>
					<option value="HONG KONG">HONG KONG</option>
					<option value="HUNGRIA">HUNGRIA</option>
					<option value="INDIA">INDIA</option>
					<option value="INDONESIA">INDONESIA</option>
					<option value="IRAN">IRAN</option>
					<option value="IRAQ">IRAQ</option>
					<option value="IRLANDA">IRLANDA</option>
					<option value="ISLA DE MAN">ISLA DE MAN</option>
					<option value="ISLA NORFOLK">ISLA NORFOLK</option>
					<option value="ISLANDIA">ISLANDIA</option>
					<option value="ISLAS ALAND">ISLAS ALAND</option>
					<option value="ISLAS CAIMÁN">ISLAS CAIMÁN</option>
					<option value="ISLAS COOK">ISLAS COOK</option>
					<option value="ISLAS DEL CANAL">ISLAS DEL CANAL</option>
					<option value="ISLAS FEROE">ISLAS FEROE</option>
					<option value="ISLAS MALVINAS">ISLAS MALVINAS</option>
					<option value="ISLAS MARIANAS DEL NORTE">ISLAS MARIANAS DEL NORTE</option>
					<option value="ISLAS MARSHALL">ISLAS MARSHALL</option>
					<option value="ISLAS PITCAIRN">ISLAS PITCAIRN</option>
					<option value="ISLAS SALOMON">ISLAS SALOMON</option>
					<option value="ISLAS TURCAS Y CAICOS">ISLAS TURCAS Y CAICOS</option>
					<option value="ISLAS VIRGENES BRITANICAS">ISLAS VIRGENES BRITANICAS</option>
					<option value="ISLAS VÍRGENES DE LOS ESTADOS UNIDOS">ISLAS VÍRGENES DE LOS ESTADOS UNIDOS</option>
					<option value="ISRAEL">ISRAEL</option>
					<option value="ITALIA">ITALIA</option>
					<option value="JAMAICA">JAMAICA</option>
					<option value="JAPON">JAPON</option>
					<option value="JERSEY">JERSEY</option>
					<option value="JORDANIA">JORDANIA</option>
					<option value="KAZAJSTAN">KAZAJSTAN</option>
					<option value="KENIA">KENIA</option>
					<option value="KIRGUISTAN">KIRGUISTAN</option>
					<option value="KIRIBATI">KIRIBATI</option>
					<option value="KUWAIT">KUWAIT</option>
					<option value="LAOS">LAOS</option>
					<option value="LESOTHO">LESOTHO</option>
					<option value="LETONIA">LETONIA</option>
					<option value="LIBANO">LIBANO</option>
					<option value="LIBERIA">LIBERIA</option>
					<option value="LIBIA">LIBIA</option>
					<option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
					<option value="LITUANIA">LITUANIA</option>
					<option value="LUXEMBURGO">LUXEMBURGO</option>
					<option value="MACAO">MACAO</option>
					<option value="MACEDONIA ">MACEDONIA </option>
					<option value="MADAGASCAR">MADAGASCAR</option>
					<option value="MALASIA">MALASIA</option>
					<option value="MALAWI">MALAWI</option>
					<option value="MALDIVAS">MALDIVAS</option>
					<option value="MALI">MALI</option>
					<option value="MALTA">MALTA</option>
					<option value="MARRUECOS">MARRUECOS</option>
					<option value="MARTINICA">MARTINICA</option>
					<option value="MAURICIO">MAURICIO</option>
					<option value="MAURITANIA">MAURITANIA</option>
					<option value="MAYOTTE">MAYOTTE</option>
					<option value="MEXICO">MEXICO</option>
					<option value="MICRONESIA">MICRONESIA</option>
					<option value="MOLDAVIA">MOLDAVIA</option>
					<option value="MONACO">MONACO</option>
					<option value="MONGOLIA">MONGOLIA</option>
					<option value="MONTENEGRO">MONTENEGRO</option>
					<option value="MONTSERRAT">MONTSERRAT</option>
					<option value="MOZAMBIQUE">MOZAMBIQUE</option>
					<option value="MYANMAR">MYANMAR</option>
					<option value="NAMIBIA">NAMIBIA</option>
					<option value="NAURU">NAURU</option>
					<option value="NEPAL">NEPAL</option>
					<option value="NICARAGUA">NICARAGUA</option>
					<option value="NIGER">NIGER</option>
					<option value="NIGERIA">NIGERIA</option>
					<option value="NIUE">NIUE</option>
					<option value="NORUEGA">NORUEGA</option>
					<option value="NUEVA CALEDONIA">NUEVA CALEDONIA</option>
					<option value="NUEVA ZELANDA">NUEVA ZELANDA</option>
					<option value="OMAN">OMAN</option>
					<option value="PAISES BAJOS">PAISES BAJOS</option>
					<option value="PAKISTAN">PAKISTAN</option>
					<option value="PALAOS">PALAOS</option>
					<option value="PALESTINA">PALESTINA</option>
					<option value="PANAMA">PANAMA</option>
					<option value="PAPUA NUEVA GUINEA">PAPUA NUEVA GUINEA</option>
					<option value="PARAGUAY">PARAGUAY</option>
					<option value="PERU">PERU</option>
					<option value="POLINESIA FRANCESA">POLINESIA FRANCESA</option>
					<option value="POLONIA">POLONIA</option>
					<option value="PORTUGAL">PORTUGAL</option>
					<option value="PUERTO RICO">PUERTO RICO</option>
					<option value="QATAR">QATAR</option>
					<option value="REINO UNIDO">REINO UNIDO</option>
					<option value="REP.DEMOCRATICA DEL CONGO">REP.DEMOCRATICA DEL CONGO</option>
					<option value="REPUBLICA CENTROAFRICANA">REPUBLICA CENTROAFRICANA</option>
					<option value="REPUBLICA CHECA">REPUBLICA CHECA</option>
					<option value="REPUBLICA DOMINICANA">REPUBLICA DOMINICANA</option>
					<option value="REPUBLICA ESLOVACA">REPUBLICA ESLOVACA</option>
					<option value="REUNION">REUNION</option>
					<option value="RUANDA">RUANDA</option>
					<option value="RUMANIA">RUMANIA</option>
					<option value="RUSIA">RUSIA</option>
					<option value="SAHARA OCCIDENTAL">SAHARA OCCIDENTAL</option>
					<option value="SAMOA">SAMOA</option>
					<option value="SAMOA AMERICANA">SAMOA AMERICANA</option>
					<option value="SAN BARTOLOME">SAN BARTOLOME</option>
					<option value="SAN CRISTOBAL Y NIEVES">SAN CRISTOBAL Y NIEVES</option>
					<option value="SAN MARINO">SAN MARINO</option>
					<option value="SAN MARTIN (PARTE FRANCESA)">SAN MARTIN (PARTE FRANCESA)</option>
					<option value="SAN PEDRO Y MIQUELON ">SAN PEDRO Y MIQUELON </option>
					<option value="SAN VICENTE Y LAS GRANADINAS">SAN VICENTE Y LAS GRANADINAS</option>
					<option value="SANTA HELENA">SANTA HELENA</option>
					<option value="SANTA LUCIA">SANTA LUCIA</option>
					<option value="SANTA SEDE">SANTA SEDE</option>
					<option value="SANTO TOME Y PRINCIPE">SANTO TOME Y PRINCIPE</option>
					<option value="SENEGAL">SENEGAL</option>
					<option value="SERBIA">SERBIA</option>
					<option value="SEYCHELLES">SEYCHELLES</option>
					<option value="SIERRA LEONA">SIERRA LEONA</option>
					<option value="SINGAPUR">SINGAPUR</option>
					<option value="SIRIA">SIRIA</option>
					<option value="SOMALIA">SOMALIA</option>
					<option value="SRI LANKA">SRI LANKA</option>
					<option value="SUDAFRICA">SUDAFRICA</option>
					<option value="SUDAN">SUDAN</option>
					<option value="SUECIA">SUECIA</option>
					<option value="SUIZA">SUIZA</option>
					<option value="SURINAM">SURINAM</option>
					<option value="SVALBARD Y JAN MAYEN">SVALBARD Y JAN MAYEN</option>
					<option value="SWAZILANDIA">SWAZILANDIA</option>
					<option value="TADYIKISTAN">TADYIKISTAN</option>
					<option value="TAILANDIA">TAILANDIA</option>
					<option value="TANZANIA">TANZANIA</option>
					<option value="TIMOR ORIENTAL">TIMOR ORIENTAL</option>
					<option value="TOGO">TOGO</option>
					<option value="TOKELAU">TOKELAU</option>
					<option value="TONGA">TONGA</option>
					<option value="TRINIDAD Y TOBAGO">TRINIDAD Y TOBAGO</option>
					<option value="TUNEZ">TUNEZ</option>
					<option value="TURKMENISTAN">TURKMENISTAN</option>
					<option value="TURQUIA">TURQUIA</option>
					<option value="TUVALU">TUVALU</option>
					<option value="UCRANIA">UCRANIA</option>
					<option value="UGANDA">UGANDA</option>
					<option value="URUGUAY">URUGUAY</option>
					<option value="UZBEKISTAN">UZBEKISTAN</option>
					<option value="VANUATU">VANUATU</option>
					<option value="VENEZUELA">VENEZUELA</option>
					<option value="VIETNAM">VIETNAM</option>
					<option value="WALLIS Y FORTUNA">WALLIS Y FORTUNA</option>
					<option value="YEMEN">YEMEN</option>
					<option value="ZAMBIA">ZAMBIA</option>
					<option value="ZIMBABWE">ZIMBABWE</option>
        
        </select>
        
		<input type="text" name="institucion" placeholder="Institución educativa">
		
        <input type="text" name="correo" placeholder="Correo electrónico">

        <input type="submit" name="register">
      </div>
    </form>
    </div>
</body>
</html>