const formRegistrarDevolucion = document.getElementById('formRegistrarDevolucion');
const formBuscarDevolucion = document.getElementById('formBuscarDevolucion');

const formBuscarDevolucionInputs = document.querySelectorAll('#formBuscarDevolucion input');

const expresiones = {
    nombre: /^(([ \u00c0-\u00ffa-zA-Z'\-])+){3,}$/,
    form_nombre: /^((\w|[ \u0021-\u002f]|[\u00c0-\u00ff])+){2,}/,
    form_cantidad: /^\d+$/,
    celular: /9\d{2}[\s-]?\d{3}[\s-]?\d{3}/,
    correo: /^[\w-._]+@\w+\.[a-zA-Z]+$/,
    codigo_solicitante: /^[1-9]\d{7}$/,
    codigo: /^(?!1000)[1-9][0-9][0-9][0-9]$/,
    usuario: /^\w+(\S?\w+?)+$/,
    password: /^(([\w!@#\.])+){4,}$/,
}

var codigo;
var codigo_articulo;
var cantidad;
var txtAreaE;

const camposBuscar = {
    codigo: false
}

const camposRegistrar = {
    date: false,
    txtarea: true
}

const validarFormBuscarDevolucion = (e) => {
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

formBuscarDevolucionInputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormBuscarDevolucion);
    input.addEventListener('blur', validarFormBuscarDevolucion);
});

const validarFormRegistrarDevolucion = (e) => {
    //console.log(e.target.name);
    switch(e.target.name){
        case "fecha_devolucion":
            //console.log(Date.parse($('#date').val()));
            if(Date.parse($('#fecha_devolucion').val())){
                document.getElementById('fecha_devolucion').classList.remove('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.remove('txtErrorShow');
                camposRegistrar['date']=true;
            }else{
                document.getElementById('fecha_devolucion').classList.add('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.add('txtErrorShow');
                camposRegistrar['date']=false;
            }
            break;
        case "txtaDetalles":
            let n = $('#txtaDetalles').val(); 
            if(String.length(n)<=100){
                document.getElementById('txtaDetalles').classList.remove('dateFormIncorrecto');
                document.getElementById('txtaErrorDetalles').classList.remove('txtErrorShow');
                camposRegistrar['txtarea']=true;
            }else{
                document.getElementById('txtaDetalles').classList.add('dateFormIncorrecto');
                document.getElementById('txtaErrorDetalles').classList.add('txtErrorShow');
                camposRegistrar['txtarea']=false;
            }
            break;
    }
}

$('#formBuscarDevolucion').submit(function(e){
    e.preventDefault();
    codigo = $('#txtCodigoBuscar').val();
    //console.log(codigo);
    if(camposBuscar['codigo']){
        $.ajax({
            url: '../controlador/CtrlBuscarPedido.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                //console.log(JSON.parse(response));
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Pedido Encontrado!',
                        text: 'El pedido ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    document.getElementById('formRegistrarDevolucion').style.display = 'block';
                    //console.log(response);
                    let pedido = JSON.parse(response);
                    let template = '';
                    codigo_articulo = pedido.codigo_articulo;
                    cantidad = pedido.cantidad;
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
                          <td class="txtForm" height="35">Fecha de Devolución</td>
                          <td align="center" valign="middle"><input class="dateForm" type="date" name="fecha_devolucion" id="fecha_devolucion"></td>
                        </tr>`
                    template2=`
                        <tr>
                          <td class="txtForm" height="35">Detalles</td>
                          <td align="center" valign="middle"><textarea class="txtAreaForm" name="txtaDetalles" id="txtaDetalles"></textarea></td>
                        </tr>`
                    template3=`
                        <tr>
                            <td colspan="3"><p class="txtError" id="txtaErrorDetalles">Ha superado el límite de caracteres</p></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnDevolver" id="btnDevolver" value="Devolver Pedido">
                            </td>
                        </tr>
                    `;
                    $('#tbodyDevolucion').html(template);
                    $('#tbodyDevolucion2').html(template2);
                    $('#tbodyDevolucion3').html(template3);
                    const formRegistrarDevolucionInputs = document.querySelectorAll('#formRegistrarDevolucion input');
                    //console.log(formModificarArticuloInputs);
                    
                    formRegistrarDevolucionInputs.forEach((input)=>{
                        input.addEventListener('keyup', validarFormRegistrarDevolucion);
                        input.addEventListener('blur', validarFormRegistrarDevolucion);
                    })
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Pedido',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    $('#tbodyDevolucion').html('');
                    $('#tbodyDevolucion2').html('');
                    $('#tbodyDevolucion3').html('');
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


$('#formRegistrarDevolucion').submit(function(e){
    e.preventDefault();
    
    const data = {
        codigo: codigo,
        codigo_articulo: codigo_articulo,
        fecha_devolucion: $('#fecha_devolucion').val(),
        cantidad: cantidad,
        detalles: $('#txtaDetalles').val()
    }
    
    if(camposRegistrar['date'] && $('#txtaDetalles').val().length<=100){
        $.post('../controlador/CtrlRegistrarDevolucion.php',data, function (response){
            //console.log(response);
            if(JSON.parse(response) == 'true'){
                Swal.fire({
                        title: 'Pedido Devuelto!',
                        text: 'El pedido ha sido devuelto correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    });
                $('#formRegistrarPedido').trigger('reset');
                document.getElementById('formRegistrarDevolucion').style.display = 'none';
            }else if(JSON.parse(response)=='false'){
                Swal.fire({
                title: 'Error',
                text: 'No se pudo devolver Pedido',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
            }else if(JSON.parse(response) == 'dev'){
                Swal.fire({
                title: 'Error',
                text: 'El Pedido ya ha sido devuelto',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
                $('#formRegistrarPedido').trigger('reset');
                document.getElementById('formRegistrarDevolucion').style.display = 'none';
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
})