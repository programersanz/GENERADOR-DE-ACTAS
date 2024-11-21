function enviarFormulario() {

 

    var mensajesError = [];

  
    if (fecha.value === null  || fecha.value === '' ){
        mensajesError.push('Ingresa tu fecha')
        error.innerHTML= mensajesError.join(' ')
        return false;  
          
    }
    

    if (hora.value === null  || hora.value === '' ){
        mensajesError.push('Confirma tu hora')
        error.innerHTML= mensajesError.join(' ')
        return false;  
          
    }

    if (sucursal.value === null  || sucursal.value === '' ){
     mensajesError.push('elige sucursal')
     error.innerHTML= mensajesError.join(' ')
     return false;  
       
 }

 if (examenes.value === null  || examenes.value === '' ){
     mensajesError.push('elige tu examen')
     error.innerHTML= mensajesError.join(' ')
     return false;  
       
 }


 
 const formulario = document.querySelector('#formulario');
 formulario.addEventListener('submit', function(e) {
     e.preventDefault();
   
 })


 const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger',
    cancelButtontext: 'cancelar',
    confirmButtonText: 'Agendar',

  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'AGENDAR ',
  text: "Quieres agendar esta cita ?",
  icon: 'question',
  showCancelButton: true,
  confirmButtonText: 'Agendar',
  cancelButtonText: 'Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {

    

 formulario.submit();

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelada',
      'Tu cita fue cancelada :)',
      'error'
    )
  }
})

}