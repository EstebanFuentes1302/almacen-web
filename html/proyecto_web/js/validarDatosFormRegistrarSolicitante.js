const formRegistrarSolicitante = document.getElementById('#formRegistrarSolicitante')
const formRegistrarSolicitanteInputs = document.querySelectorAll('#formRegistrarSolicitante input');

const expresiones = {
    nombre: /^(([ \u00c0-\u00ffa-zA-Z'\-])+){3,}$/,
    form_nombre: /^((\w|[ \u0021-\u002f]|[\u00c0-\u00ff])+){2,}/,
    form_cantidad: /^\d+$/,
    celular: /9\d{2}[\s-]?\d{3}[\s-]?\d{3}/,
    correo: /^[\w-._]+@(\w+\.[a-zA-Z]+){1,2}$/,
    codigo_solicitante: /^[1-9]\d{7}$/,
    codigo: /^(?!1000)[1-9][0-9][0-9][0-9]$/,
    usuario: /^\w+(\S?\w+?)+$/,
    password: /^(([\w!@#\.])+){4,}$/,
    foto: /^.+\.(jpeg||png||jpg)$/
}

const campos = {
    nombre: false,
    correo: false,
    telefono: false,
    foto: false
}

const validarFormRegistrarSolicitante = (e) => {
    switch(e.target.name){
        case "txtNombreSolicitante":
            if(expresiones.form_nombre.test(e.target.value)){
                document.getElementById('txtNombreSolicitante').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.remove('txtErrorShow');
                campos['nombre']=true;
            }else{
                document.getElementById('txtNombreSolicitante').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.add('txtErrorShow');
                campos['nombre']=false;
            }
        break;
        case "txtCorreo":
            if(expresiones.correo.test(e.target.value)){
                document.getElementById('txtCorreo').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCorreo').classList.remove('txtErrorShow');
                campos['correo']=true;
            }else{
                document.getElementById('txtCorreo').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCorreo').classList.add('txtErrorShow');
                campos['correo']=false;
            }
        break;
        case "txtTelefono":
            if(expresiones.celular.test(e.target.value)){
                document.getElementById('txtTelefono').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorTelefono').classList.remove('txtErrorShow');
                campos['telefono']=true;
            }else{
                document.getElementById('txtTelefono').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorTelefono').classList.add('txtErrorShow');
                campos['telefono']=false;
            }
        break;
        case "foto":
            console.log(e.target.value);
            if(expresiones.foto.test(e.target.value)){
                document.getElementById('foto').classList.remove('fileFormIncorrecto');
                document.getElementById('txtErrorFoto').classList.remove('txtErrorShow');
                campos['foto']=true;
            }else{
                document.getElementById('foto').classList.add('fileFormIncorrecto');
                document.getElementById('txtErrorFoto').classList.add('txtErrorShow');
                campos['foto']=false;
            }
        break;
    }
}

formRegistrarSolicitanteInputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormRegistrarSolicitante);
    input.addEventListener('blur',validarFormRegistrarSolicitante);
})


$('#formRegistrarSolicitante').submit(function(e){
    e.preventDefault();
    //console.log(date);
    //var file_data = $('#foto').prop('files')[0];   
    var formData = new FormData(document.getElementById('formRegistrarSolicitante'));
    //foto.append('foto', file_data);
    var nombre = $('#txtNombreArticulo').val();
    var correo = $('#txtCorreo').val();
    var telefono = $('#txtTelefono').val();
    
    //PARA VER EL FORMDATA
    /*for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }*/
    
    if(campos['foto']){
        if(campos['nombre'] && campos['correo'] && campos['telefono']){
            $.ajax({
                url: '../controlador/CtrlRegistrarSolicitante.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response){
                    //console.log(response);
                    if(JSON.parse(response)=='true'){
                        Swal.fire({
                                title: 'Solicitante Registrado!',
                                text: 'El solicitante ha sido registrado correctamente',
                                icon: 'success',
                                background: '#121212',
                                color: 'white'
                            });
                        $('#formRegistrarSolicitante').trigger('reset');
                    }else if(JSON.parse(response)=='false'){
                        Swal.fire({
                        title: 'Error',
                        text: 'No se pudo registrar Solicitante',
                        icon: 'error',
                        background: '#121212',
                        color: 'white'
                        })
                    }else if(JSON.parse(response) == 'noupload'){
                        Swal.fire({
                        title: 'Warning',
                        text: 'No se puede subir la foto',
                        icon: 'error',
                        background: '#121212',
                        color: 'white'
                        })
                        $('#formRegistrarSolicitante').trigger('reset');
                    }
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
                    title: 'Error',
                    text: 'El formato de imagen es incorrecto',
                    icon: 'error',
                    background: '#121212',
                    color: 'white'
            })
    }
    
})


