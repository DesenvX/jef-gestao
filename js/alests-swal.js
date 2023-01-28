function swalLoginFail() {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Usuário ou Senha Incorreta!',
        showConfirmButton: false,
        confirmButtonColor: '#2ECC71',
        timer: 3000
    })
}
function swalLogout() {
    Swal.fire({
        title: 'Deseja sair?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sim, sair.',
        confirmButtonColor: '#87adbd',
        cancelButtonText: 'Não',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace('../controllers/LogoutController.php')
        }
    })
}


function swalRegisterSuccess() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Cadastrado com Sucesso!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalRegisterError() {
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


function swalDeleteSuccess() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Deletado com Sucesso!',
        showConfirmButton: false,
        timer: 3000
    })
}
function swalDeleteError() {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Erro ao Deletar, tente novamente!',
        showConfirmButton: false,
        timer: 3000
    })
}


function swalValidateCpfError() {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'CPF inválidado!',
        showConfirmButton: false,
        timer: 3000
    })
}