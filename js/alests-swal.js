function swalRegisterSuccess() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Cadastrada com Sucesso!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalRegisterEditError() {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Erro ao Cadastrar, tente novamente!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalEditSuccess() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Editado com Sucesso!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalEditError() {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Erro ao Editar, tente novamente!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalDelete() {
    Swal.fire({
        title: 'Deseja excluir?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir.',
        confirmButtonColor: '#87adbd',
        cancelButtonText: 'Não',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Excluida com Sucesso!',
                showConfirmButton: false,
                timer: 3000
            })

            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Erro ao Editar, tente novamente!',
                showConfirmButton: false,
                timer: 3000
            })

        }
    })
}