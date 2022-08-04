// JavaScript Document

const formModificarPedido = document.getElementById('formModificarPedido');
const formBuscarPedido = document.getElementById('formBuscarPedido');

const formBuscarPedidoInputs = document.querySelectorAll('#formBuscarPedido input');


const expresiones = {
    nombre: /^(([ \u00c0-\u00ffa-zA-Z'\-])+){3,}$/,
    form_nombre: /^((\w|[ \u0021-\u002f]|[\u00c0-\u00ff])+){2,}/,
    form_cantidad: /^\d+$/,
    celular: /9\d{2}[\s-]?\d{3}[\s-]?\d{3}/,
    correo: /^[\w-._]+@\w+\.[a-zA-Z]+$/,
    codigo_solicitante: /^2\d{7}$/,
    codigo: /^(?!1000)[1-9][0-9][0-9][0-9]$/,
    usuario: /^\w+(\S?\w+?)+$/,
    password: /^(([\w!@#\.])+){4,}$/,
}

const camposBuscar = {
    codigo: false
}

const camposModificar = {
    cantidad: true
}

const validarFormBuscarPedido = (e) => {
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

formBuscarPedidoInputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormBuscarPedido);
    input.addEventListener('blur', validarFormBuscarPedido);
})

/*const validarFormModificarPedido = (e) => {
    switch(e.target.name){
        case "txtCantidad":
            if(expresiones.form_cantidad.test(e.target.value)){
                document.getElementById('txtCantidad').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCantidad').classList.remove('txtErrorShow');
                camposModificar['cantidad']=true;
            }else{
                document.getElementById('txtCantidad').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCantidad').classList.add('txtErrorShow');
                camposModificar['cantidad']=false;
            }
        break;
    }
}*/

var codigo = null;
var estado = null;

function buscarPedido(){
     codigo = $('#txtCodigoBuscar').val();
    //console.log(codigo);
    if(camposBuscar['codigo']){
        $.ajax({
            url: '../controlador/CtrlBuscarPedido.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                //console.log(JSON.parse(response));
                if(JSON.parse(response) != 'dev' && JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Pedido Encontrado!',
                        text: 'El pedido ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    let pedido = JSON.parse(response);
                    console.log(JSON.parse(response));
                    estado = pedido.estado;
                    let template = '';
                    template += `
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Código de Pedido</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${pedido.codigo_pedido}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Código de Solicitante</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante" value="${pedido.codigo_solicitante}">
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Estado</span>
                            </div>
                            <div class="div-input-form-row">
                                <select id="sEstado" class="selectForm">
                                    <option value="Entregado">Entregado</option>
                                    <option value="Por Entregar">Por Entregar</option>
                                </select>
                            </div>
                        </div>
                        <div class="div-form-row">
                            <div class="div-txt-form-row">
                                <span class="txtForm">Fecha de Pedido</span>
                            </div>
                            <div class="div-input-form-row">
                                <input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${pedido.fecha_pedido}">
                            </div>
                        </div>
                        <input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar">
                    `;
                    document.getElementById('divModificarPedido').innerHTML = template;
                    
                    /*const formModificarPedidoInputs = document.querySelectorAll('#formModificarPedido input');
                    formModificarPedidoInputs.forEach((input)=>{
                        input.addEventListener('keyup',validarFormModificarPedido);
                        input.addEventListener('blur',validarFormModificarPedido);
                    })*/
                }else if(JSON.parse(response) == 'null'){
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Pedido',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }else if(JSON.parse(response) == 'dev'){
                    Swal.fire({
                    title: 'Error',
                    text: 'El pedido ya ha sido devuelto, no se puede modificar',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }
            },
            fail: function(response){
                Swal.fire({
                title: 'Error',
                text: 'Error al encontrar Pedido',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
        })
    }
}

$('#formModificarPedido').submit(function(e){
    e.preventDefault();
    let estado = $('#sEstado').val();
    if($('#sEstado').val() == estado){
        $.ajax({
            url: '../controlador/CtrlModificarPedido.php',
            type: 'POST',
            data: {codigo, estado},
            success: function(response){
                console.log(response);
                if(JSON.parse(response) == 'true'){
                    Swal.fire({
                        title: 'Estado Modificado!',
                        text: 'El pedido ha sido modificado correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                        })
                    document.getElementById('divModificarPedido').innerHTML = '';
                    codigo = null;
                    estado = null;
                }else if(JSON.parse(response) == 'false'){
                    Swal.fire({
                    title: 'Error',
                    text: 'Error al modificar estado',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }
            },
            fail: function(res){
                Swal.fire({
                title: 'Error',
                text: 'Error al modificar estado',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
        });    
    }
    
});

function verPedidos(){
    let action = 'popup';
    $.ajax({
        url: '../controlador/CtrlShowVerPedidos.php',
        data: { action },
        type: 'POST',
        success: function (response){
            var VerArticulosPopUp = window.open('', '', 'width=1200, height=900');
            VerArticulosPopUp.document.write(response);
        }
    });
    
}