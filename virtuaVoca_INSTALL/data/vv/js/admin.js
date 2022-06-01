// Ventanita con tiempo arriba a la derecha
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

function emptyMessage() {
  if (localStorage.getItem('newUserCount') <= 0) {
    $("#admin_newUsers_emptyMessage").text("Nada por aquí...");
  } else {
    $("#admin_newUsers_emptyMessage").text("");
  }
}

// Función que quita a un usuario de la confirmación
function denyUserButton(user) {
  $("#deny"+user).click( () => {
    $.ajax({
        url: "db/api/userDelete.php",
        type: "POST",
        data: {
            username: user },
        success: function (e) {
            Toast.fire({
                icon: 'error',
                title: '"'+user+'" ha sido denegado/a'
            })
            $("#user"+user).remove()
            let count = localStorage.getItem('newUserCount')
            count--
            localStorage.setItem('newUserCount', count)
        }
    })
  })
}

// Función que aceputa a un usuario de la confirmación
function acceptUserButton(user, count) {
  $("#accept"+user).click( () => {
    $.ajax({
        url: "db/api/userUpdate.php",
        type: "POST",
        data: {
            column: "status",
            value: "1",
            username: user },
        success: function (e) {
          console.log(e)
            Toast.fire({
                icon: 'success',
                title: '"'+user+'" ha sido aceptado/a'
            })
            $("#user"+user).remove()
            let count = localStorage.getItem('newUserCount')
            count--
            localStorage.setItem('newUserCount', count)
        }
    })
  })
}

////
// Editar
////
const bEdit = document.querySelectorAll("button[type=edit]")
bEdit.forEach(button => {
  const id = button.id.substring(4,button.id.length)
  $(button).click( () => {
    $.ajax({
      url: "db/api/readOneUser.php",
      type: "POST",
      data: {user: id},
      success: function (e) {
        const user = JSON.parse(e)
        Swal.fire({
          title: 'Editar a '+id,
          html: `
          <input type="text" id="username" class="swal2-input" placeholder="Usuario" value="${user.body.user}">
          <input type="text" id="password" class="swal2-input" placeholder="Contraseña">`,
          confirmButtonText: 'Editar',
          focusConfirm: false,
          preConfirm: () => {
            const username = Swal.getPopup().querySelector('#username').value
            const password = Swal.getPopup().querySelector('#password').value
            return { username: username, password: password }
          }
        }).then((result) => {
          if (result.value.username.length > 0) {
            $.ajax({
              url: "db/api/userUpdate.php",
              type: "POST",
              data: {
                username: id,
                column: "username",
                value: result.value.username
              }, success: function (e) {
              }
            })
          }
          if (result.value.password.length > 0) {
            $.ajax({
              url: "db/api/userUpdate.php",
              type: "POST",
              data: {
                username: id,
                column: "password",
                value: result.value.password
              },
            })
          }
          Swal.fire({
            title: `Edición de ${id} completa`,
            html: `
            <strong>Nombre</strong>: ${result.value.username}<br>
            <strong>Contraseña</strong>: ${result.value.password}
            `
          })
        })
      }, error: function (e) {
        console.log("Error: "+e)
      }
    })
  })
})

////
// Banear
////
bBan = document.querySelectorAll("button[type=ban]")
bBan.forEach(button => {
  const id = button.id.substring(3,button.id.length)
  $(button).click( () => {
    Swal.fire({
      title: `¿Estás seguro/a de querer banear a "${id}"?`,
      showDenyButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          url: "db/api/userBan.php",
          type: "POST",
          data: {username: id},
          success: function (e) {
            $("#unban"+id).toggle()
            $("#unban"+id).removeClass("d-none")
            $("#ban"+id).toggle()
            Swal.fire(`${id} ha sido baneado/a`, '', 'info')
          }
        })
      }
    })
  })
});

////
// Desbanear
////
bUnban = document.querySelectorAll("button[type=unban]")
bUnban.forEach(button => {
  const id = button.id.substring(5,button.id.length)
  $(button).click( () => {
    Swal.fire({
      title: `¿Estás seguro/a de querer desbanear a "${id}"?`,
      showDenyButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          url: "db/api/userUnban.php",
          type: "POST",
          data: {username: id},
          success: function (e) {
            $("#unban"+id).toggle()
            $("#ban"+id).toggle()
            $("#ban"+id).removeClass("d-none")
            Swal.fire(`${id} ha sido desbaneado/a`, '', 'info')
          }
        })
      }
    })
  })
});

////
// Eliminar
////
bRemove = document.querySelectorAll("button[type=remove]")
bRemove.forEach(button => {
  const id = button.id.substring(3,button.id.length)
  $(button).click( () => {
    Swal.fire({
      title: `¿Estás seguro/a de querer borrar a "${id}"?<br>
              <strong>Esta acción no se puede deshacer</strong>`,
      showDenyButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          url: "db/api/userDelete.php",
          type: "POST",
          data: {username: id},
          success: function (e) {
            $("#user"+id).remove()
            Swal.fire(`${id} ha sido borrado/a`, '', 'info')
          }
        })
      }
    })
  })
});

// Aceptar usuario
bAccept = document.querySelectorAll("button[type=accept]")
bAccept.forEach(button => {
  const id = button.id.substring(6,button.id.length)
  acceptUserButton(id, localStorage.getItem('newUserCount'))
});

// Denegar usuario
bDeny = document.querySelectorAll("button[type=deny]")
bDeny.forEach(button => {
  const id = button.id.substring(4,button.id.length)
  // $(button).click( () => {
    denyUserButton(id, localStorage.getItem('newUserCount'))
  // })
});

// Te dice que no hay nada
setInterval(() => {
  emptyMessage()
}, 10);