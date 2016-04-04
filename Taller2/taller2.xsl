<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<!--Indicamos que nuestro output sera de tipo HTML-->
<!--<xsl:output method="html"/>-->

<xsl:template match="/">
	<html>
		<body>
			<h2>Listado de Personas</h2>
			<table border="1">
				<tr bgcolor="#59D095">
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Edad</th>
					<th>Genero</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Estado Civil</th>
					<th>Direccion</th>
					<th>Profesion</th>
					<th>Ocupacion</th>
				</tr>
				<xsl:for-each select="contactos/persona">
				<tr>
					<td><xsl:value-of select="cedula"/></td>
					<td><xsl:value-of select="nombre"/></td>
					<td><xsl:value-of select="apellido"/></td>
					<td><xsl:value-of select="edad"/></td>
					<td><xsl:value-of select="genero"/></td>
					<td><xsl:value-of select="telefono"/></td>
					<td><xsl:value-of select="correo"/></td>
					<td><xsl:value-of select="estado"/></td>
					<td><xsl:value-of select="direccion"/></td>
					<td><xsl:value-of select="profesion"/></td>
					<td><xsl:value-of select="ocupacion"/></td>
				</tr>
				</xsl:for-each>
			</table>
		</body>
	</html>
</xsl:template>

</xsl:stylesheet>
