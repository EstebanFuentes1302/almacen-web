// JavaScript Document

const formModificarArticulo = document.getElementById('formModificarArticulo');
const formBuscarArticulo = document.getElementById('formBuscarArticulo');

const formBuscarArticuloInputs = document.querySelectorAll('#formBuscarArticulo input');


const expresiones = {
    codigo: /^(?!1000)[1-9][0-9][0-9][0-9]$/,
    form_nombre: /^((\w|[ \u0021-\u002f]|[\u00c0-\u00ff])+){2,}/
}

const camposBuscar = {
    codigo: false
}

const camposModificar = {
    nombre: true,
    cantidad: true
}

const validadFormBuscarArticulo = (e) => {
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

var codigo;

formBuscarArticuloInputs.forEach((input)=>{
    input.addEventListener('keyup',validadFormBuscarArticulo);
    input.addEventListener('blur',validadFormBuscarArticulo);
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
                //console.log(response);
                if(JSON.parse(response) != 'null'){
                    Swal.fire({
                        title: 'Artículo Encontrado!',
                        text: 'El artículo ha sido encontrado',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    document.getElementById('tblModificarArticulo').style.display = 'block';
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
                          <td width="333" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombre" id="txtNombre" value="${articulo.nombre}"></td>
                        </tr>
                    `;
                    //console.log(template);
                    template2=`
                        <tr>
                          <td class="txtForm" height="35">Cantidad</td>
                          <td align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtCantidad" id="txtCantidad" value="${articulo.cantidad}"></td>
                          </tr>
                        
                    `
                    template3=`
                        <tr>
                          <td class="txtForm" height="35">Fecha de Registro</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtFecha" id="txtFecha" value="${articulo.fecha_registro}"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar"></td>
                      </tr>
                    `
                    $('#tbodyArticulo').html(template);
                    $('#tbodyArticulo2').html(template2);
                    $('#tbodyArticulo3').html(template3);
                    const formModificarArticuloInputs = document.querySelectorAll('#formModificarArticulo input');
                    //console.log(formModificarArticuloInputs);
                    formModificarArticuloInputs.forEach((input)=>{
                        input.addEventListener('keyup',validarFormModificarArticulo);
                        input.addEventListener('blur',validarFormModificarArticulo);
                    })
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

$('#formModificarArticulo').submit(function(e){
    e.preventDefault();
    //console.log($('#txtNombre').val());
    let nombre = $('#txtNombre').val();
    let cantidad = $('#txtCantidad').val();
    //let dataModificar={codigo, nombre, cantidad}
    //console.log(JSON.stringify(dataModificar));
    //console.log(codigo);
    if(camposModificar['nombre'] && camposModificar['cantidad']){
        $.ajax({
            url: '../controlador/CtrlModificarArticulo.php',
            type: 'POST',
            data: {codigo, nombre, cantidad},
            success: function(response){
                //console.log(response);
                if(JSON.parse(response)=='true'){
                    Swal.fire({
                        title: 'Artículo Modificado!',
                        text: 'El artículo ha sido modificado correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    })
                    document.getElementById('tblModificarArticulo').style.display = 'none';
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'Error al modificar Artículo',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                }
                
            },
            fail: function(res){
                Swal.fire({
                title: 'Error',
                text: 'Error al modificar Artículo',
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