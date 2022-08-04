// JavaScript Document

const formModificarSolicitante = document.getElementById('formModificarSolicitante');
const formBuscarSolicitante = document.getElementById('formBuscarSolicitante');

const formBuscarSolicitanteInputs = document.querySelectorAll('#formBuscarSolicitante input');


const expresiones = {
    nombre: /^(([ \u00c0-\u00ffa-zA-Z'\-])+){3,}$/,
    form_nombre: /^((\w|[ \u0021-\u002f]|[\u00c0-\u00ff])+){2,}/,
    form_cantidad: /^\d+$/,
    celular: /9\d{2}[\s-]?\d{3}[\s-]?\d{3}/,
    correo: /^[\w-._]+@\w+\.[a-zA-Z]+$/,
    codigo_solicitante: /^2\d{7}$/,
    codigo: /^(?!1000)[1-9][0-9][0-9][0-9]$/,
    usuario: /^\w+(\S?\w+?)+$/,
    password: /^(([\w!@#\.])+){4,}$/
}

const camposBuscar = {
    codigo: false
}

const camposModificar = {
    nombre: true,
    correo: true,
    telefono: true
}

const validarFormBuscarSolicitante = (e) => {
    switch(e.target.name){
        case "txtCodigoBuscar":
            if(expresiones.codigo_solicitante.test(e.target.value)){
                document.getElementById('txtCodigoBuscar').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigo').classList.remove('txtErrorShow');
                camposBuscar['codigo']=true;
            }else{
                document.getElementById('txtCodigoBuscar').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigo').classList.add('txtErrorShow');
                camposBuscar['codigo']=false;
            }
            break;
    }
}

const validarFormModificarArticulo = (e) => {
    switch(e.target.name){
        case "txtNombre":
            if(expresiones.form_nombre.test(e.target.value)){
                document.getElementById('txtNombre').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.remove('txtErrorShow');
                camposModificar['nombre']=true;
            }else{
                document.getElementById('txtNombre').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.add('txtErrorShow');
                camposModificar['nombre']=false;
            }
        break;
        case "txtCorreo":
            if(expresiones.correo.test(e.target.value)){
                document.getElementById('txtCorreo').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCorreo').classList.remove('txtErrorShow');
                camposModificar['correo']=true;
            }else{
                document.getElementById('txtCorreo').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCorreo').classList.add('txtErrorShow');
                camposModificar['correo']=false;
            }
        break;
        case "txtTelefono":
            if(expresiones.celular.test(e.target.value)){
                document.getElementById('txtTelefono').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorTelefono').classList.remove('txtErrorShow');
                camposModificar['telefono']=true;
            }else{
                document.getElementById('txtTelefono').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorTelefono').classList.add('txtErrorShow');
                camposModificar['telefono']=false;
            }
            break;
    }
}

var codigo;

formBuscarSolicitanteInputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormBuscarSolicitante);
    input.addEventListener('blur', validarFormBuscarSolicitante);
})


$('#formBuscarSolicitante').submit(function(e){
    e.preventDefault();
    codigo = $('#txtCodigoBuscar').val();
    //console.log(codigo);
    if(camposBuscar['codigo']){
        $.ajax({
            url: '../controlador/CtrlBuscarSolicitante.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                //console.log(response);
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Solicitante Encontrado!',
                        text: 'El solicitante se encuentra registrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    
                    //console.log(response);
                    let solicitante = JSON.parse(response);
                    let template = '';
                    template+= `
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Código</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${solicitante.codigo_solicitante}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Nombre</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm" type="text" name="txtNombre" id="txtNombre" value="${solicitante.nombre}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorNombre">El nombre debe tener 2 dígitos como mínimo</p>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Correo Electrónico</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm"  type="email" name="txtCorreo" id="txtCorreo" value="${solicitante.email}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorCorreo">El correo ingresado es incorrecto</p>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Teléfono</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldForm" type="tel" name="txtTelefono" id="txtTelefono" value="${solicitante.telefono}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorTelefono">El teléfono debe tener 9 dígitos y comenzar con "9"</p>
                        <div class="div-form-row">
                            <p class="txtBlock">Foto</p>
                        </div>
                        <div class="div-form-row">
                            <img class="fotoShow" src="${solicitante.foto}" width="200px" height="200px">
                        </div>

                        <input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar">
                    `;

                    const formModificarSolicitanteInputs = document.querySelectorAll('#formModificarSolicitante input');
                    //console.log(formModificarArticuloInputs);
                   document.getElementById('divModificarSolicitante').innerHTML = template;
                    formModificarSolicitanteInputs.forEach((input)=>{
                        input.addEventListener('keyup', validarFormModificarArticulo);
                        input.addEventListener('blur', validarFormModificarArticulo);
                    })
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar al Solicitante',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    document.getElementById('divModificarSolicitante').innerHTML = '';
                }
                
            },
            fail: function(response){
                Swal.fire({
                title: 'Error',
                text: 'Error al buscar Solicitante',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
            
        })
    }else{
        document.getElementById('tblModificarArticulo').style.display = 'none';
        Swal.fire({
                title: 'Error',
                text: 'Los datos ingresados no son correctos',
                icon: 'error',
                background: '#121212',
                color: 'white'
        })
    }
});

$('#formModificarSolicitante').submit(function(e){
    e.preventDefault();
    let nombre = $('#txtNombre').val();
    let email = $('#txtCorreo').val();
    let telefono = $('#txtTelefono').val();
    //let dataModificar={codigo, nombre, cantidad}
    //console.log(JSON.stringify(dataModificar));
    //console.log(codigo);
    if(camposModificar['nombre'] && camposModificar['correo'] && camposModificar['telefono']){
        $.ajax({
            url: '../controlador/CtrlModificarSolicitante.php',
            type: 'POST',
            data: {codigo, nombre, email, telefono},
            success: function(response){
                //console.log(response);
                if(JSON.parse(response) == 'true'){
                    Swal.fire({
                        title: 'Solicitante Modificado!',
                        text: 'El solicitante ha sido modificado correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                   document.getElementById('divModificarSolicitante').innerHTML = '';
                }else if(JSON.parse(response) == 'false'){
                    Swal.fire({
                    title: 'Error',
                    text: 'Error al modificar Solicitante',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }
                
            },
            fail: function(res){
                Swal.fire({
                title: 'Error',
                text: 'Error al modificar Solicitante',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
        });
    }else{
        Swal.fire({
                title: 'Error',
                text: 'Los datos ingresados no son correctos',
                icon: 'error',
                background: '#121212',
                color: 'white'
        })
    }
    
});

function verSolicitantes(){
    let action = 'popup';
    $.ajax({
        url: '../controlador/CtrlShowVerSolicitantes.php',
        data: { action },
        type: 'POST',
        success: function (response){
            console.log(response);
            var VerArticulosPopUp = window.open('', '', 'width=800, height=900');
            VerArticulosPopUp.document.write(response);
        }
    });
}