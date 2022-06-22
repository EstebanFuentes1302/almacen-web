const formBuscarArticulo = document.getElementById('formBuscarArticulo');

const formBuscarArticuloinputs = document.querySelectorAll('#formBuscarArticulo input');

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

const campos = {
    codigo: false
}

const validarFormBuscarArticulo = (e) => {
    console.log("hola");
    switch(e.target.name){
        case "txtCodigo":
            if(expresiones.codigo.test(e.target.value)){
                document.getElementById('txtCodigo').classList.remove('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigo').classList.remove('txtErrorShow');
                campos['codigo']=true;
            }else{
                document.getElementById('txtCodigo').classList.add('txtFieldFormIncorrecto');
                document.getElementById('txtErrorCodigo').classList.add('txtErrorShow');
                campos['codigo']=false;
            }
        break;
    }
}

formBuscarArticuloinputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormBuscarArticulo);
    input.addEventListener('blur',validarFormBuscarArticulo);
})

/*formRegistrarArticulo.addEventListener('submit',(e) => {
    e.preventDefault();
    var datos = new FormData(formRegistrarArticulo);
    
    
    if(campos['codigo']){
        fetch('../controlador/CtrlBuscarArticulo.php',{
            method: 'POST',
            body: datos
        })
            .then( res => res.json())
            .then( data => {
            if (data == 'true'){
                Swal.fire({
                    title: 'Artículo Encontrado!',
                    text: 'El artículo ha sido registrado correctamente',
                    icon: 'success',
                    background: '#121212',
                    color: 'white'
                }
                )
            }else if(data == 'false'){
                Swal.fire({
                    title: 'Error',
                    text: 'No se encontró el Artículo',
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
    
})*/
