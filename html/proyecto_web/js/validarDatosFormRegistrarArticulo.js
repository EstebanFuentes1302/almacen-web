const formRegistrarArticulo = document.getElementById('#formRegistrarArticulo')
const formRegistrarArticuloInputs = document.querySelectorAll('#formRegistrarArticulo input');

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
    nombre: false,
    cantidad: false
}

const validarFormRegistrarArticulo = (e) => {
    switch(e.target.name){
        case "txtNombreArticulo":
            if(expresiones.form_nombre.test(e.target.value)){
                document.getElementById('txtNombreArticulo').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.remove('txtErrorShow');
                campos['nombre']=true;
            }else{
                document.getElementById('txtNombreArticulo').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorNombre').classList.add('txtErrorShow');
                campos['nombre']=false;
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
        case "date":
            //console.log(Date.parse($('#date').val()));
            if(Date.parse($('#date').val())){
                document.getElementById('date').classList.remove('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.remove('txtErrorShow');
            }else{
                document.getElementById('date').classList.add('dateFormIncorrecto');
                document.getElementById('txtErrorFecha').classList.add('txtErrorShow');
            }
            break;
    }
}

formRegistrarArticuloInputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormRegistrarArticulo);
    input.addEventListener('blur',validarFormRegistrarArticulo);
})

$('#formRegistrarArticulo').submit(function(e){
    e.preventDefault();
    let date = $('#date').val();
    //console.log(date);
    const data = {
        nombre: $('#txtNombreArticulo').val(),
        cantidad: $('#txtCantidad').val(),
        fecha: $('#date').val()
    }
    if(campos['nombre'] && campos ['cantidad'] && date){
        $.post('../controlador/CtrlRegistrarArticulo.php',data, function (response){
            console.log(response);
            if(JSON.parse(response)=='true'){
                Swal.fire({
                        title: 'Artículo Registrado!',
                        text: 'El artículo ha sido registrado correctamente',
                        icon: 'success',
                        background: '#121212',
                        color: 'white'
                    });
                $('#formRegistrarArticulo').trigger('reset');
            }else if(JSON.parse(response)=='false'){
                Swal.fire({
                title: 'Error',
                text: 'No se pudo agregar Artículo',
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


