<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion_afiliados.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="far fa-plus-square fa-1x"> </i> Agregar </i></button>
        </div>
    </div>
</div>
<br>
<div class="container caja">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> <h3>AFILIADOS AGAE </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaPadron" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Código</th>
                                    <th>Apellido/s</th>
                                    <th>Nombre/s</th>
                                    <th>D.N.I</th>
                                    <th>Caja Ahorro</th>
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>F. Afiliación</th>
                                    <th>Acción</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin del contenido Principal -->

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" cabecera="cabecera">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form id="formPadron">
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" id="id" name="id">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card mr-1"></i> Dni</div>
                            </div>
                            <input type="text" class="form-control" id="dni" name="dni" autocomplete="off" tabindex="0" required>


                        </div>
                    
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card mr-1"></i> Apellidos</div>
                            </div>
                            <input type="text" class="form-control UpperCase" id="apellido" name="apellido" autocomplete="off">
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card mr-1"></i> Nombres</div>
                            </div>
                            <input type="text" class="form-control UpperCase" id="nombre" name="nombre" autocomplete="off">
                        </div>
                        <div class="input-group mt-3 col-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text "> T</div>
                            </div>
                            <input type="text" class="form-control" id="t" name="t" autocomplete="off">
                        </div>
                        <div class="input-group mt-3 col-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text "> F</div>
                            </div>
                            <input type="text" class="form-control " id="f" name="f" autocomplete="off">
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt mr-1"></i> Cel.</div>
                            </div>
                            <input type="text" class="form-control" id="celular" name="celular" autocomplete="off">
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text "><i class="fas fa-male mr-1"></i>Referente</div>
                            </div>
                            <input type="text" class="form-control UpperCase" id="referente" name="referente" autocomplete="off">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form> -->
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="frmafiliado"	action="alta_afiliacion.php" method="post" 	autocomplete="off" class="row g-3 px-5 needs-validation" novalidate onsubmit="return checkSubmit();">
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label"
                                >Apellido/s (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="apellidos"
                                name="apellidos"
                                required
                            />
                            <div class="invalid-feedback">Por favor ingrese su Apellido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombres" class="form-label"
                                >Nombre/s (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="nombres"
                                name="nombres"
                                required
                            />
                            <div class="invalid-feedback">Por favor ingrese su Nombre.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="nacionalidad" class="form-label"
                                >Nacionalidad (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="nacionalidad"
                                name="nacionalidad"
                                required
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="dni" class="form-label"
                                >Nº DNI (<span class="text-danger">*</span>)</label
                            >
                            <input type="text" class="form-control" id="dni" name="dni" required />
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label"
                                >Tel. Contacto (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="telefono"
                                name="telefono"
                                required
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="sexo" class="form-label"
                                >Sexo (<span class="text-danger">*</span>)</label
                            >
                            <select id="sexo" name="sexo" class="form-select" required>
                                <option selected disabled value="">Seleccione Sexo...</option>
                                <option value="FEMENINO">FEMENINO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="estadocivil" class="form-label"
                                >Estado Civil (<span class="text-danger">*</span>)</label
                            >
                            <select id="estadocivil" name="estadocivil" class="form-select">
                                <option value="CASADA/O" selected>CASADA/O</option>
                                <option value="SOLTERA/O">SOLTERA/O</option>
                                <option value="DIVORCIADA/O">DIVORCIADA/O</option>
                                <option value="VIUDA/O">VIUDA/O</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="fechanacimiento" class="form-label"
                                >Fecha de Nacimiento (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="date"
                                class="form-control"
                                id="fechanacimiento"
                                name="fechanacimiento"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="domicilio" class="form-label"
                                >Domicilio (Calle y Nº) (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="domicilio"
                                name="domicilio"
                                required
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="localidad" class="form-label"
                                >Localidad (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="localidad"
                                name="localidad"
                                required
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="codigopostal" class="form-label"
                                >Código Postal (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="codigopostal"
                                name="codigopostal"
                                required
                            />
                        </div>
                        <div class="col-md-5">
                            <label for="provincia" class="form-label"
                                >Provincia (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="provincia"
                                name="provincia"
                                required
                            />
                        </div>
                        <div class="col-md-7">
                            <label for="mail" class="form-label"
                                >Email (<span class="text-danger">*</span>)</label
                            >
                            <input type="email" class="form-control" id="mail" name="mail" required />
                        </div>
                        <div class="col-md-6">
                            <label for="estudios" class="form-label">Estudios </label>
                            <select id="estudios" name="estudios" class="form-select">
                                <option value="UNIVERSITARIO" selected>UNIVERSITARIO</option>
                                <option value="POSGRADO">POSGRADO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="carrera" class="form-label">Título/Carrera</label>
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="carrera"
                                name="carrera"
                            />
                        </div>
                        <div class="paragraph"><strong>Datos Laborales: </strong></div>
                        <div class="col-md-6">
                            <label for="legajo" class="form-label"
                                >Nº de Legajo (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="legajo"
                                name="legajo"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="organismo" class="form-label"
                                >Organismo que liquida su haber (<span class="text-danger">*</span
                                >)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="organismo"
                                name="organismo"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="cuil" class="form-label"
                                >Nº de CUIL (<span class="text-danger">*</span>)</label
                            >
                            <input type="text" class="form-control" id="cuil" name="cuil" required />
                        </div>
                        <div class="col-md-6">
                            <label for="trabajo" class="form-label"
                                >Organismo donde trabaja (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="trabajo"
                                name="trabajo"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="domiciliotrabajo" class="form-label"
                                >Domicilio del lugar de trabajo: (Calle y Nº)(<span class="text-danger"
                                    >*</span
                                >)
                            </label>
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="domiciliotrabajo"
                                name="domiciliotrabajo"
                                required
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="locatrabajo" class="form-label"
                                >Localidad (<span class="text-danger">*</span>)</label
                            >
                            <input
                                type="text"
                                class="form-control UpperCase"
                                id="locatrabajo"
                                name="locatrabajo"
                                required
                            />
                        </div>
                        <div class="container">
                            <div class="paragraph" style="text-align: justify">
                                Dejo expresa constancia que de solicitar en el futuro mi desafiliación, lo
                                hare mediante nota individual presentada personalmente ante la entidad
                                gremial, o bien, por telegrama o carta documento individual (no
                                colectiva); ello en un todo de acuerdo a lo reglamentado por la Ley
                                Nº23.551, su Decreto Reglamentario y su Estatuto Social a fin de
                                garantizar la expresa voluntad del afiliado. Declaro conocer y aceptar las
                                normas vigentes para el uso de los servicios al momento de requerir los
                                mismos. &nbsp;<br />​<br />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="acepto"
                                    name="acepto"
                                    required
                                />
                                <label class="form-check-label" for="acepto">
                                    DECLARO Y ACEPTO (<span class="text-danger">*</span>)
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="aceptopago"
                                    name="aceptopago"
                                    required
                                />
                                <label class="form-check-label" for="aceptopago">
                                    ACEPTO PAGO DEBITO AUTOMATICO (<span class="text-danger">*</span>)
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <label for="ctactesuc" class="form-label">Caja de Ahorro </label> -->

                            <div class="row">
                                <!-- <div class="col-md-4">
                                <select id="tipocta" name="tipocta" class="form-select" required>
                                    <option selectec value="CA">Caja de ahorro</option>
                                    <option value="CC">Cuenta Corriente</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Tipo de Cuenta. (<span class="text-danger">*</span>)</small>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="ctactesuc" name="ctactesuc" placeholder="000" required />
                                <small id="emailHelp" class="form-text text-muted">Sucursal. (<span class="text-danger">*</span>)</small>
                            </div> -->
                                <div class="col-md-5">
                                    <label for="ctacte" class="form-label">Caja de Ahorro </label>
                                    <!-- <input type="number" class="form-control" id="ctacte" name="ctacte" placeholder="00000000000000" required min="00000000000001" max="99999999999999" maxlength="14" oninput="if(this.value.length = this.maxLength ) this.value = this.value.slice(0, this.maxLength);"/> -->
                                    <!-- minlength="14" maxlength="14" -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ctacte"
                                        name="ctacte"
                                        placeholder="00000000000000"
                                        required
                                        minlength="14"
                                        maxlength="14"
                                        pattern="[0-9]+"
                                    />
                                    <small id="emailHelp" class="form-text text-muted"
                                        >Número de Cuenta (<span class="text-danger">*</span>)</small
                                    >
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

<script src="js/panel-afiliado.js"></script>