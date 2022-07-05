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
                    document.getElementById('tblEliminarSolicitante').style.display = 'block';
                    console.log(response);
                    let solicitante = JSON.parse(response);
                    let template = '';
                    template+= `
                        <tr>
                          <td class="txtForm"  width="182" height="35">Código</td>
                          <td width="270" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtCodigo" id="txtCodigo" value="${solicitante.codigo_solicitante}"></td>
                        </tr>
                        <tr>
                          <td class="txtForm"  width="182" height="35">Nombre</td>
                          <td width="270" align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="text" name="txtNombre" id="txtNombre" value="${solicitante.nombre}"></td>
                          </tr>
                        <tr>
                          <td class="txtForm"  height="35">Correo Electrónico</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly  type="email" name="txtCorreo" id="txtCorreo" value="${solicitante.email}"></td>
                          </tr>
                        <tr>
                          <td class="txtForm"  height="35">Teléfono</td>
                          <td align="center" valign="middle"><input class="txtFieldFormReadonly" readonly type="tel" name="txtTelefono" id="txtTelefono" value="${solicitante.telefono}"></td>
                        </tr>
                        <tr>
                          <td height="72" colspan="2" align="center" valign="middle"><img class="fotoShow" src="${solicitante.foto}" width="200px" height="200px"></td>
                        </tr>
                        <tr>
                          <td height="39" colspan="2" align="center" valign="middle"><input class="button-submit" type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar">
                            </td>
                          </tr>
                    `;
                    $('#tbodyEliminarSolicitante').html(template);
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'No se pudo encontrar al Solicitante',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
                    })
                    document.getElementById('tblEliminarSolicitante').style.display = 'none';
                    $('#tbodyEliminarSolicitante').html('');
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
            text: 'Error al modificar Solicitante',
            icon: 'error',
            background: '#121212',
            color: 'white'
            })
        }
    });
    
});