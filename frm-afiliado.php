<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php
require ("db/conexion_afiliados.php");
$id=$_GET["id"];


$sentencia = mysqli_prepare($link,"SELECT * FROM afiliados WHERE id = ?");
mysqli_stmt_bind_param($sentencia, "i", $id);
mysqli_stmt_execute($sentencia);
$resultado = mysqli_stmt_get_result($sentencia);
$fila = mysqli_fetch_array($resultado);
mysqli_stmt_close($sentencia);
mysqli_close($link);
echo $fila["afi_apellidos"];
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    <h3>AFILIADOS AGAE </h3>
                </div>
                <div class="card-body">
                    <form id="frmafiliado" action="alta_afiliacion.php" method="post" autocomplete="off" class="row g-3 px-5 needs-validation" novalidate onsubmit="return checkSubmit();">

                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellido/s (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="apellidos" name="apellidos" value="<?php echo $fila["afi_apellidos"]; ?>" required />
                            <div class="invalid-feedback">Por favor ingrese su Apellido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombre/s (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="nombres" name="nombres" value="<?php echo $fila["afi_nombres"]; ?>"required />
                            <div class="invalid-feedback">Por favor ingrese su Nombre.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="nacionalidad" name="nacionalidad" value="<?php echo $fila["afi_nacionalidad"]; ?>" required />
                        </div>
                        <div class="col-md-4">
                            <label for="dni" class="form-label">Nº DNI (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $fila["afi_dni"]; ?>" required />
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label">Tel. Contacto (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $fila["afi_telefono"]; ?>" required />
                        </div>
                        <div class="col-md-4">
                            <label for="sexo" class="form-label">Sexo (<span class="text-danger">*</span>)</label>
                            <select id="sexo" name="sexo" class="form-control" value="<?php echo $fila["afi_sexo"]; ?>" required>
                                <option selected disabled value="">Seleccione Sexo...</option>
                                <option value="FEMENINO">FEMENINO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="estadocivil" class="form-label">Estado Civil (<span class="text-danger">*</span>)</label>
                            <select id="estadocivil" name="estadocivil" class="form-control">
                                <option value="CASADA/O" selected>CASADA/O</option>
                                <option value="SOLTERA/O">SOLTERA/O</option>
                                <option value="DIVORCIADA/O">DIVORCIADA/O</option>
                                <option value="VIUDA/O">VIUDA/O</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="fechanacimiento" class="form-label">Fecha de Nacimiento (<span class="text-danger">*</span>)</label>
                            <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required />
                        </div>
                        <div class="col-md-6">
                            <label for="domicilio" class="form-label">Domicilio (Calle y Nº) (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="domicilio" name="domicilio" required />
                        </div>
                        <div class="col-md-3">
                            <label for="localidad" class="form-label">Localidad (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="localidad" name="localidad" required />
                        </div>
                        <div class="col-md-3">
                            <label for="codigopostal" class="form-label">Código Postal (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control" id="codigopostal" name="codigopostal" required />
                        </div>
                        <div class="col-md-5">
                            <label for="provincia" class="form-label">Provincia (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="provincia" name="provincia" required />
                        </div>
                        <div class="col-md-7">
                            <label for="mail" class="form-label">Email (<span class="text-danger">*</span>)</label>
                            <input type="email" class="form-control" id="mail" name="mail" required />
                        </div>
                        <div class="col-md-6">
                            <label for="estudios" class="form-label">Estudios </label>
                            <select id="estudios" name="estudios" class="form-control">
                                <option value="UNIVERSITARIO" selected>UNIVERSITARIO</option>
                                <option value="POSGRADO">POSGRADO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="carrera" class="form-label">Título/Carrera</label>
                            <input type="text" class="form-control UpperCase" id="carrera" name="carrera" />
                        </div>
                        <div class="col-md-12">
                            <div class="paragraph"><strong>Datos Laborales: </strong></div>
                        </div>
                        <div class="col-md-6">
                            <label for="legajo" class="form-label">Nº de Legajo (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control" id="legajo" name="legajo" required />
                        </div>
                        <div class="col-md-6">
                            <label for="organismo" class="form-label">Organismo que liquida su haber (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="organismo" name="organismo" required />
                        </div>
                        <div class="col-md-6">
                            <label for="cuil" class="form-label">Nº de CUIL (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control" id="cuil" name="cuil" required />
                        </div>
                        <div class="col-md-6">
                            <label for="trabajo" class="form-label">Organismo donde trabaja (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="trabajo" name="trabajo" required />
                        </div>
                        <div class="col-md-6">
                            <label for="domiciliotrabajo" class="form-label">Domicilio del lugar de trabajo: (Calle y Nº)(<span class="text-danger">*</span>)
                            </label>
                            <input type="text" class="form-control UpperCase" id="domiciliotrabajo" name="domiciliotrabajo" required />
                        </div>
                        <div class="col-md-6">
                            <label for="locatrabajo" class="form-label">Localidad (<span class="text-danger">*</span>)</label>
                            <input type="text" class="form-control UpperCase" id="locatrabajo" name="locatrabajo" required />
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="acepto" name="acepto" required />
                                <label class="form-check-label" for="acepto">
                                    DECLARO Y ACEPTO (<span class="text-danger">*</span>)
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="aceptopago" name="aceptopago" required />
                                <label class="form-check-label" for="aceptopago">
                                    ACEPTO PAGO DEBITO AUTOMATICO (<span class="text-danger">*</span>)
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <label for="ctactesuc" class="form-label">Caja de Ahorro </label> -->

                            <div class="row">

                                <div class="col-md-5">
                                    <label for="ctacte" class="form-label">Caja de Ahorro </label>
                                    <!-- <input type="number" class="form-control" id="ctacte" name="ctacte" placeholder="00000000000000" required min="00000000000001" max="99999999999999" maxlength="14" oninput="if(this.value.length = this.maxLength ) this.value = this.value.slice(0, this.maxLength);"/> -->
                                    <!-- minlength="14" maxlength="14" -->
                                    <input type="text" class="form-control" id="ctacte" name="ctacte" placeholder="00000000000000" required minlength="14" maxlength="14" pattern="[0-9]+" />
                                    <small id="emailHelp" class="form-text text-muted">Número de Cuenta (<span class="text-danger">*</span>)</small>
                                    <div class="invalid-feedback">
                                        Por favor ingrese los 14 dígitos numéricos de su Caja de Ahorro.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php require_once("include/parte_inferior.php"); ?>