// JavaScript Document

const formEliminarSolicitante = document.getElementById('formEliminarSolicitante');
const formBuscarSolicitante = document.getElementById('formBuscarSolicitante');

const formBuscarSolicitanteInputs = document.querySelectorAll('#formBuscarSolicitante input');


const expresiones = {
    codigo_solicitante: /^2\d{7}$/,
}

const camposBuscar = {
    codigo: false
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

var codigo;

formBuscarSolicitanteInputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormBuscarSolicitante);
    input.addEventListener('blur', validarFormBuscarSolicitante);
})

document.getElementById('btnBuscar').onkeypress=function(e){
    if(e.keyCode==13){
        document.getElementById('linkadd').click();
    }
}

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
                console.log(response);
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Solicitante Encontrado!',
                        text: 'El solicitante se encuentra registrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    
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
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtNombre" id="txtNombre" value="${solicitante.nombre}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorNombre">El nombre debe tener 2 dígitos como mínimo</p>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Correo Electrónico</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="email" name="txtCorreo" id="txtCorreo" value="${solicitante.email}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorCorreo">El correo ingresado es incorrecto</p>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Teléfono</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="tel" name="txtTelefono" id="txtTelefono" value="${solicitante.telefono}">
                            </div>
                        </div>
                        <p class="txtError" id="txtErrorTelefono">El teléfono debe tener 9 dígitos y comenzar con "9"</p>
                        <div class="div-form-row">
                            <p class="txtBlock">Foto</p>
                        </div>
                        <div class="div-form-row">
                            <img class="fotoShow" src="${solicitante.foto}" width="200px" height="200px">
                        </div>
                        <input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar">
                    `;
                    document.getElementById('divSolicitante').innerHTML = template;
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar al Solicitante',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }
                
            },
            fail: function(){
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
        document.getElementById('tblEliminarSolicitante').style.display = 'none';
        Swal.fire({
                title: 'Error',
                text: 'Los datos ingresados no son correctos',
                icon: 'error',
                background: '#121212',
                color: 'white'
        })
    }
});

$('#formEliminarSolicitante').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '../controlador/CtrlEliminarSolicitante.php',
        type: 'POST',
        data: { codigo },
        success: function(response){
            //console.log(response);
            if(JSON.parse(response) == 'true'){
                Swal.fire({
                    title: 'Solicitante Eliminado!',
                    text: 'El solicitante ha sido eliminado correctamente',
                    icon: 'success',
                    background: '#121212',
                    color: 'white'
                })
                document.getElementById('divSolicitante').innerHTML = '';
            }else if(JSON.parse(response) == 'false'){
                Swal.fire({
                title: 'Error',
                text: 'Error al eliminar Solicitante',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }else if(JSON.parse(response) == 'used'){
                Swal.fire({
                title: 'Error',
                text: 'No se puede eliminar solicitante porque tiene registros en el sistema',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }

        },
        fail: function(res){
            Swal.fire({
            title: 'Error',
            text: 'Error al eliminar Solicitante',
            icon: 'error',
            background: '#121212',
            color: 'white'
            })
        }
    });
    
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