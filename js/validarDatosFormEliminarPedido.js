// JavaScript Document

const formEliminarPedido = document.getElementById('formEliminarPedido');
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
    input.addEventListener('keyup',validarFormBuscarPedido);
    input.addEventListener('blur',validarFormBuscarPedido);
})

var codigo = null;
var cod_articulo = null;
var cant_pedido = null;


$('#formBuscarPedido').submit(function(e){
    e.preventDefault();
    codigo = $('#txtCodigoBuscar').val();
    //console.log(codigo);
    if(camposBuscar['codigo']){
        $.ajax({
            url: '../controlador/CtrlBuscarPedido.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                if(response){
                    Swal.fire({
                        title: 'Pedido Encontrado!',
                        text: 'El pedido ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    document.getElementById('tblEliminarPedido').style.display = 'block';
                    //console.log(response);
                    let pedido = JSON.parse(response);
                    let template = '';
                    cod_articulo = pedido.codigo_articulo;
                    cant_pedido = pedido.cantidad;
                    template+= `
                        <tr>
                          <td class="txtForm" width="169" height="35">Código de Pedido</td>
                          <td width="333" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${pedido.codigo_pedido}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm" width="169" height="35">Código de Artículo</td>
                          <td width="333" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtNombre" id="txtNombre" value="${pedido.codigo_articulo}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm" height="35">Código de Solicitante</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCodigoSolicitante" id="txtCodigoSolicitante" value="${pedido.codigo_solicitante}"></td>
                          </tr>
                        <tr>
                          <td class="txtForm" height="35">Cantidad</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCantidad" id="txtCantidad" value="${pedido.cantidad}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm" height="35">Fecha de Pedido</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${pedido.fecha_registro}"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Eliminar"></td>
                      </tr>
                    `;
                    $('#tbodyEliminarPedido').html(template);
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Artículo',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    $('#tbodyArticulo').html('');
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

$('#formEliminarPedido').submit(function(e){
    e.preventDefault();

    let codigo_articulo = cod_articulo;
    let cantidad_pedido = cant_pedido;
    //let dataModificar={codigo, nombre, cantidad}
    //console.log(JSON.stringify(dataModificar));
    //console.log(codigo);
    $.ajax({
        url: '../controlador/CtrlEliminarPedido.php',
        type: 'POST',
        data: { codigo, codigo_articulo, cantidad_pedido },
        success: function(response){
            //console.log(response);
            if(JSON.parse(response)=='true'){
                Swal.fire({
                    title: 'Pedido Eliminado!',
                    text: 'El pedido se ha eliminado correctamente',
                    icon: 'success',
                    background: '#121212',
                    color: 'white'
                    })
                }
                document.getElementById('tblEliminarPedido').style.display = 'none';
            },
            fail: function(){
                Swal.fire({
                title: 'Error',
                text: 'Error al modificar Pedido',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }
        });    
    
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