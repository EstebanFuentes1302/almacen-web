const formRegistrarPedido = document.getElementById('formRegistrarPedido');
const formRegistrarPedidoInputs = document.querySelectorAll('#formRegistrarPedido input');

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
                campos['cod_solicitante']=true;
            }else{
                document.getElementById('txtCodigoSolicitante').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigoSolicitante').classList.add('txtErrorShow');
                campos['cod_solicitante']=false;
            }
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
        cod_solicitante: $('#txtCodigoSolicitante').val(),
        cod_articulo: $('#txtCodigoArticulo').val(),
        date: $('#date').val(),
        cantidad: $('#txtCantidad').val(),
        estado: $('#sEstado').val()
    }
    if(campos['cod_articulo'] && campos['cod_solicitante'] && campos ['cantidad'] && campos['date']){
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