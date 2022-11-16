$('.deleteTransaction').submit(function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Estas seguro que desea eliminar esta transacción?',
        text: "Esta acción es irreversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});