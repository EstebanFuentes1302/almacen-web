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

const validarFormModificarPedido = (e) => {
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
}

var codigo = null;
var cod_articulo = null;
var old_cantidad = null;


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
                console.log(JSON.parse(response));
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Pedido Encontrado!',
                        text: 'El pedido ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    document.getElementById('tblModificarPedido').style.display = 'block';
                    //console.log(response);
                    let pedido = JSON.parse(response);
                    let template = '';
                    cod_articulo = pedido.codigo_articulo;
                    old_cantidad = pedido.cantidad;
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
                          <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad" value="${pedido.cantidad}"></td>
                        </tr>
                    `;
                    template2=`
                        <tr>
                          <td class="txtForm" height="35">Fecha de Pedido</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${pedido.fecha_registro}"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar"></td>
                      </tr>
                    `;
                    $('#tbodyPedido').html(template);
                    $('#tbodyPedido2').html(template2);
                    const formModificarPedidoInputs = document.querySelectorAll('#formModificarPedido input');
                    //console.log(formModificarArticuloInputs);
                    formModificarPedidoInputs.forEach((input)=>{
                        input.addEventListener('keyup',validarFormModificarPedido);
                        input.addEventListener('blur',validarFormModificarPedido);
                    })
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Pedido',
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
                text: 'Error al encontrar Pedido',
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

$('#formModificarPedido').submit(function(e){
    e.preventDefault();
    
    let cantidad = $('#txtCantidad').val();
    let codigo_articulo = cod_articulo;
    let oldcantidad = old_cantidad;
    //let dataModificar={codigo, nombre, cantidad}
    //console.log(JSON.stringify(dataModificar));
    //console.log(codigo);
    if(oldcantidad != cantidad){
        if(camposModificar['cantidad']){
            $.ajax({
                url: '../controlador/CtrlModificarPedido.php',
                type: 'POST',
                data: {codigo, codigo_articulo, cantidad, oldcantidad},
                success: function(response){
                    console.log(response);
                    if(JSON.parse(response)=='true'){
                        Swal.fire({
                            title: 'Pedido Modificado!',
                            text: 'El artículo ha sido modificado correctamente',
                            icon: 'success',
                            background: '#121212',
                            color: 'white'
                            })
                        }

                    },
                    fail: function(res){
                        Swal.fire({
                        title: 'Error',
                        text: 'Error al modificar Pedido',
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
    }else{
        Swal.fire({
                title: 'Aviso',
                text: 'No se han realizado cambios',
                icon: 'warning',
                background: '#121212',
                color: 'white'
        })
    }
    
});