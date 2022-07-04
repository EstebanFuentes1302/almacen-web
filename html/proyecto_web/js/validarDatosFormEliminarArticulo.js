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
    password: /^(([\w!@#\.])+){4,}$/,
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
                    
                    document.getElementById('tblEliminarArticuloDatos').style.display = 'block';
                    //console.log(response);
                    let articulo = JSON.parse(response);
                    let template = '';
                    template+= `
                        <tr>
                          <td class="txtForm" width="169" height="35">Código</td>
                          <td width="333" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${articulo.codigo}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm" width="169" height="35">Nombre</td>
                          <td width="333" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtNombre" id="txtNombre" value="${articulo.nombre}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm" height="35">Cantidad</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" type="text" readonly name="txtCantidad" id="txtCantidad" value="${articulo.cantidad}"></td>
                          </tr>
                        <tr>
                          <td class="txtForm" height="35">Fecha de Registro</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${articulo.fecha_registro}"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar"></td>
                      </tr>
                    `
                    $('#tbodyArticulo').html(template);
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar Artículo',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    $('#tbodyArticulo').html('');
                    $('#tbodyArticulo2').html('');
                    $('#tbodyArticulo3').html('');
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
            console.log(response);
            if(JSON.parse(response)=='true'){
                Swal.fire({
                    title: 'Artículo Eliminado!',
                    text: 'El artículo ha sido eliminado correctamente',
                    icon: 'success',
                    background: '#121212',
                    color: 'white'
                })
                document.getElementById('tblEliminarArticuloDatos').style.display = 'none';
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
                text: 'No se puede eliminar el artículo porque ya ha tiene registros',
                icon: 'error',
                background: '#121212',
                color: 'white'
                })
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