// JavaScript Document

const formEliminarArticulo = document.getElementById('formEliminarArticulo');
const formBuscarArticulo = document.getElementById('formBuscarArticulo');

const formBuscarArticuloInputs = document.querySelectorAll('#formBuscarArticulo input');


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

const validarFormBuscarArticulo = (e) => {
    switch(e.target.name){
        case "txtCodigoBuscar":
            if(expresiones.codigo.test(e.target.value)){
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

formBuscarArticuloInputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormBuscarArticulo);
    input.addEventListener('blur',validarFormBuscarArticulo);
})

$('#formBuscarArticulo').submit(function(e){
    e.preventDefault();
    codigo = $('#txtCodigoBuscar').val();
    //console.log(codigo);
    if(camposBuscar['codigo']){
        
        $.ajax({
            url: '../controlador/CtrlBuscarArticulo.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Artículo Encontrado!',
                        text: 'El artículo ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    
                    //console.log(response);
                    let articulo = JSON.parse(response);
                    let template = '';
                    template+= `
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Código</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${articulo.codigo}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Nombre</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtNombre" id="txtNombre" value="${articulo.nombre}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Cantidad</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" type="text" readonly name="txtCantidad" id="txtCantidad" value="${articulo.cantidad}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Fecha de Registro</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${articulo.fecha_registro}">
                            </div>
                        </div>
                        <input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar">
                    `
                    document.getElementById('divEliminarArticulo').innerHTML = template;
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Artículo',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    
                }
            },
            fail: function(response){
                Swal.fire({
                title: 'Error',
                text: 'Error al encontrar Artículo',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
        })
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

$('#formEliminarArticulo').submit(function(e){
    e.preventDefault();
    //console.log(codigo);
    $.ajax({
        url: '../controlador/CtrlEliminarArticulo.php',
        type: 'POST',
        data: {codigo},
        success: function(response){
            //console.log(response);
            if(JSON.parse(response)=='true'){
                Swal.fire({
                    title: 'Artículo Eliminado!',
                    text: 'El artículo ha sido eliminado correctamente',
                    icon: 'success',
                    background: '#121212',
                    color: 'white'
                })
                document.getElementById('divEliminarArticulo').innerHTML = '';
            }else if(JSON.parse(response) == 'false'){
                Swal.fire({
                title: 'Error',
                text: 'Error al eliminar Artículo',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }else if(JSON.parse(response) == 'used'){
                Swal.fire({
                title: 'Error',
                text: 'No se puede eliminar el artículo porque ya tiene registros en el sistema',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
                document.getElementById('divEliminarArticulo').innerHTML = '';
            }
        },
        fail: function(res){
            Swal.fire({
            title: 'Error',
            text: 'Error al eliminar Artículo',
            icon: 'error',
            background: '#121212',
            color: 'white'
            })
        }
    });

    
});

function verArticulos(){
    let action = 'popup';
    $.ajax({
        url: '../controlador/CtrlShowVerArticulos.php',
        data: { action },
        type: 'POST',
        success: function (response){
            console.log(response);
            var VerArticulosPopUp = window.open('', '', 'width=700, height=900');
            VerArticulosPopUp.document.write(response);
        }
    });
    
}