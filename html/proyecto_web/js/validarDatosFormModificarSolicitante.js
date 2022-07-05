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
                    document.getElementById('tblModificarSolicitante').style.display = 'block';
                    //console.log(response);
                    let solicitante = JSON.parse(response);
                    let template = '';
                    template+= `
                        <tr>
                          <td class="txtForm"  width="182" height="35">Código</td>
                          <td width="270" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${solicitante.codigo_solicitante}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm"  width="182" height="35">Nombre</td>
                          <td width="270" align="center" valign="middle"><input class="txtFieldForm" type="text" name="txtNombre" id="txtNombre" value="${solicitante.nombre}"></td>
                          </tr>
                        `;
                    template2=`
                        <tr>
                          <td class="txtForm"  height="35">Correo Electrónico</td>
                          <td align="center" valign="middle"><input class="txtFieldForm"  type="email" name="txtCorreo" id="txtCorreo" value="${solicitante.email}"></td>
                          </tr>
                        `;
                    template3=`
                        <tr>
                          <td class="txtForm"  height="35">Teléfono</td>
                          <td align="center" valign="middle"><input class="txtFieldForm" type="tel" name="txtTelefono" id="txtTelefono" value="${solicitante.telefono}"></td>
                        </tr>`
                    template4=`
                        <tr>
                          <td height="72" colspan="2" align="center" valign="middle"><img class="fotoShow" src="${solicitante.foto}" width="200px" height="200px"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnModificar" id="btnModificar" value="Modificar">
                            </td>
                          </tr>
                    `;
                    $('#tbodyModificarSolicitante').html(template);
                    $('#tbodyModificarSolicitante2').html(template2);
                    $('#tbodyModificarSolicitante3').html(template3);
                    $('#tbodyModificarSolicitante4').html(template4);
                    const formModificarSolicitanteInputs = document.querySelectorAll('#formModificarSolicitante input');
                    //console.log(formModificarArticuloInputs);
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
                    document.getElementById('tblModificarSolicitante').style.display = 'none';
                    $('#tbodyModificarSolicitante').html('');
                    $('#tbodyModificarSolicitante2').html('');
                    $('#tbodyModificarSolicitante3').html('');
                    $('#tbodyModificarSolicitante4').html('');
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
                    document.getElementById('tblModificarSolicitante').style.display = 'none';
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