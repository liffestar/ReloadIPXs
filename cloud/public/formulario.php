<form method="post" action="formulario.php">
  <table>
    <tr>
      <td>
        Nro. de Autorizacion
      </td>
      <td>
        <input type="text" name="nro_autorizacion"  value="<?= $_REQUEST["nro_autorizacion"] ?>"/>
      </td>
    </tr>
    <tr>
      <td>
        Nro. de Factura
      </td>
      <td>
        <input type="text" name="nro_factura" value="<?= $_POST["nro_factura"] ?>"/>
      </td>
    </tr>
    <tr>
      <td>
        NIT/ci
      </td>
      <td>
        <input type="text" name="nit" value="<?= $_POST["nit"] ?>" />
      </td>
    </tr>
    <tr>
      <td>
        Fecha Transaccion
      </td>
      <td>
        <input type="text" name="fecha_transaccion" value="<?= $_POST["fecha_transaccion"] ?>" />
      </td>
    </tr>
    <tr>
      <td>
        Monto Transaccion
      </td>
      <td>
        <input type="text" name="monto_transaccion" value="<?= $_POST["monto_transaccion"] ?>" />
      </td>
    </tr>
    <tr>
      <td>
        Llave dosificacion
      </td>
      <td>
        <input type="text" name="llave_dosificacion" value="<?= $_POST["llave_dosificacion"] ?>"  size="100"/>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="Generar" name="boton" />
      </td>
    </tr>
  </table>
</form>

<?
$_POST["boton"];
if ($_POST["boton"] == 'Generar') {

  $nro_autorizacion = trim($_REQUEST["nro_autorizacion"]);
  $nro_factura = trim($_POST["nro_factura"]);
  $nit = trim($_POST["nit"]);
  echo $fecha_transaccion = ereg_replace('/', '', $_POST["fecha_transaccion"]);
  $fecha_transaccion = ereg_replace('-', '', $fecha_transaccion);
  //$monto_transaccion = ereg_replace('\\.','',$_POST["monto_transaccion"]);
  //$monto_transaccion = ereg_replace(',','.',$monto_transaccion);
  $monto_transaccion = $_POST["monto_transaccion"];
  echo $monto_transaccion = round($monto_transaccion);
  echo $llave_dosificacion = trim($_POST["llave_dosificacion"]);

  include "facturacion.php";
  $factura = new facturacion();

  echo "<br>---> " . $codigo = $factura->generarCodigo($nro_factura, $nit, $fecha_transaccion, $monto_transaccion, $llave_dosificacion, $nro_autorizacion);
}
?>