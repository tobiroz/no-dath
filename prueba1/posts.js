// Obtener referencia a los elementos del DOM
var usernameElement = document.getElementById("nombre_usuario");
var usernameInput = document.getElementById("username-input");
var updateButton = document.getElementById("update-username");
const postContainer = document.getElementById('post-container');
const postForm = document.getElementById('post-form');
const postContent = document.getElementById('post-content');

// Función para mostrar los posts
function showPost(content) {
  // Ejemplo de cómo agregar un post al contenedor
  const post = document.createElement('div');
  post.classList.add('post');
  post.innerHTML = `
    <img class="foto_perfil" src="../iconos" alt="Foto de perfil">
    <span class="nombre_usuario">Usuario</span>
    <p>${content}</p>
    <button class="delete-post">Eliminar</button>
  `;
  postContainer.prepend(post); // Agregar el nuevo post al principio del contenedor

  // Asignar un controlador de eventos al botón de eliminar
  const deleteButton = post.querySelector('.delete-post');
  deleteButton.addEventListener('click', () => {
    // Remover el post del contenedor
    post.remove();
  });
}

// Asignar un controlador de eventos al envío del formulario
postForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const content = postContent.value;

  // Validar si el contenido del post no está vacío
  if (content.trim() !== '') {
    // Mostrar el nuevo post
    showPost(content);

    // Limpiar el campo del formulario
    postContent.value = '';
  }
});
