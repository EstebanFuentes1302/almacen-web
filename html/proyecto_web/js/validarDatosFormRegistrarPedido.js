const formRegistrarPedido = document.getElementById('formRegistrarPedido');
const formRegistrarPedidoInputs = document.querySelectorAll('#formRegistrarPedido input');

var codigo_articulo;
var codigo_solicitante;

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

const campos = {
    cod_articulo: false,
    codigo_solicitante: false,
    cantidad: false,
    date: false
}

const validarFormRegistrarPedido = (e) => {
    switch(e.target.name){
        case "txtCodigoArticulo":
            if(expresiones.codigo.test(e.target.value)){
                document.getElementById('txtCodigoArticulo').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigoArticulo').classList.remove('txtErrorShow');
                campos['cod_articulo']=true;
            }else{
                document.getElementById('txtCodigoArticulo').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigoArticulo').classList.add('txtErrorShow');
                campos['cod_articulo']=false;
            }
            break;
        case "txtCantidad":
            if(expresiones.form_cantidad.test(e.target.value)){
                document.getElementById('txtCantidad').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCantidad').classList.remove('txtErrorShow');
                campos['cantidad']=true;
            }else{
                document.getElementById('txtCantidad').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCantidad').classList.add('txtErrorShow');
                campos['cantidad']=false;
            }
            break;
        case "txtCodigoSolicitante":
            if(expresiones.codigo_solicitante.test(e.target.value)){
                document.getElementById('txtCodigoSolicitante').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigoSolicitante').classList.remove('txtErrorShow');
                campos['codigo_solicitante']=true;
            }else{
                document.getElementById('txtCodigoSolicitante').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigoSolicitante').classList.add('txtErrorShow');
                campos['codigo_solicitante']=false;
            }
            console.log(campos)
            break;
        case "date":
            //console.log(Date.parse($('#date').val()));
            if(Date.parse($('#date').val())){
                document.getElementById('date').classList.remove('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.remove('txtErrorShow');
                campos['date']=true;
            }else{
                document.getElementById('date').classList.add('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.add('txtErrorShow');
                campos['date']=false;
            }
            break;
    }
}

formRegistrarPedidoInputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormRegistrarPedido);
    input.addEventListener('blur',validarFormRegistrarPedido);
});

$('#formRegistrarPedido').submit(function(e){
    e.preventDefault();
    
    const data = {
        cod_solicitante: codigo_solicitante,
        cod_articulo: codigo_articulo,
        date: $('#date').val(),
        cantidad: $('#txtCantidad').val(),
        estado: $('#sEstado').val()
    }
    if(codigo_solicitante != '' && codigo_articulo != '' && campos ['cantidad'] && campos['date']){
        $.post('../controlador/CtrlRegistrarPedido.php',data, function (response){
            //console.log(response);
            if(JSON.parse(response)=='true'){
                Swal.fire({
                        title: 'Pedido Registrado!',
                        text: 'El pedido ha sido registrado correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    });
                $('#formRegistrarPedido').trigger('reset');
                document.getElementById('divArticulo').innerHTML = '';
                document.getElementById('divSolicitante').innerHTML = '';
                codigo_articulo = null;
                codigo_solicitante = null;
            }else if(JSON.parse(response)=='false'){
                Swal.fire({
                title: 'Error',
                text: 'No se pudo realizar Pedido',
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
})

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

function buscarArticulo(){
    let codigo = $('#txtCodigoArticulo').val();
    if(campos['cod_articulo']){
        $.ajax({
                url: '../controlador/CtrlBuscarArticulo.php',
                type: 'POST',
                data: { codigo },
                success: function(response){
                    //console.log(response);
                    if(JSON.parse(response) != 'null'){
                        Swal.fire({
                            title: 'Artículo Encontrado!',
                            text: 'El artículo ha sido encontrado',
                            icon: 'success',
                            background: '#121212',
                            color: 'white'
                        })
                        //document.getElementById('tblModificarArticulo').style.display = 'block';
                        //console.log(response);
                        let articulo = JSON.parse(response);
                        codigo_articulo = articulo.codigo;
                        let temp = '';
                        temp = `
                            <div class="div-ver">
                                <table class="tblShow">
                                    <tbody>
                                        <tr>
                                          <th class="txtHeader">Código</th>
                                          <th class="txtHeader">Nombre</th>
                                          <th class="txtHeader">Cantidad</th>
                                          <th class="txtHeader" width="150px">Fecha de Registro</th>
                                        </tr>
                                        <tr>
                                          <td class="txtRow">${articulo.codigo}</td>
                                          <td class="txtRow">${articulo.nombre}</td>
                                          <td class="txtRow">${articulo.cantidad}</td>
                                          <td class="txtRow">${articulo.fecha_registro}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        `;
                        document.getElementById('divArticulo').innerHTML = temp;
                        const formModificarArticuloInputs = document.querySelectorAll('#formModificarArticulo input');
                    }else{
                        Swal.fire({
                        title: 'Error',
                        text: 'No se pudo encontrar Artículo',
                        icon: 'error',
                        background: '#121212',
                        color: 'white'
                        })
                        /*$('#tbodyArticulo').html('');
                        $('#tbodyArticulo2').html('');
                        $('#tbodyArticulo3').html('');*/
                        document.getElementById('divArticulo').innerHTML = '';
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
    
    
}

function verSolicitantes(){
    let action = 'popup';
    $.ajax({
        url: '../controlador/CtrlShowVerSolicitantes.php',
        data: { action },
        type: 'POST',
        success: function (response){
            console.log(response);
            var VerArticulosPopUp = window.open('', '', 'width=700, height=900');
            VerArticulosPopUp.document.write(response);
        }
    });
}

function buscarSolicitante(){
    codigo = $('#txtCodigoSolicitante').val();
    //console.log(codigo);
    if(campos['codigo_solicitante']){
        $.ajax({
            url: '../controlador/CtrlBuscarSolicitante.php',
            type: 'POST',
            data: { codigo },
            success: function(response){
                //console.log(response);
                if(JSON.parse(response) != 'null'){
                    //console.log(response);
                    
                    let solicitante = JSON.parse(response);
                    codigo_solicitante = solicitante.codigo_solicitante;
                    let template = '';
                    template+= `
                        <div class="div-ver">
                            <table class="tblShow">
                                <tbody>
                                    <tr>
                                      <th class="txtHeader">Código</th>
                                      <th class="txtHeader">Nombre</th>
                                      <th class="txtHeader">Correo Electrónico</th>
                                      <th class="txtHeader">Teléfono</th>
                                    </tr>
                                    <tr>
                                      <td class="txtRow">${solicitante.codigo_solicitante}</td>
                                      <td class="txtRow">${solicitante.nombre}</td>
                                      <td class="txtRow">${solicitante.email}</td>
                                      <td class="txtRow">${solicitante.telefono}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
       document.getElementById('divSolicitante').innerHTML = '';
        Swal.fire({
                title: 'Error',
                text: 'Los datos ingresados no son correctos',
                icon: 'error',
                background: '#121212',
                color: 'white'
        })
    }
};