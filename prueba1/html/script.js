// Obtener elementos del DOM
var usernameElement = document.getElementById("nombre_usuario");
var usernameInput = document.getElementById("username-input");
var updateButton = document.getElementById("update-username");
const postContainer = document.getElementById("post-container");
const postForm = document.getElementById("post-form");
const postContent = document.getElementById("post-content");

// Manejar evento de envío del formulario de publicación
document.getElementById("post-form").addEventListener("submit", function(event) {
  event.preventDefault();

  var text = document.getElementById("text-input").value;
  var image = document.getElementById("image-input").files[0];
  var username = usernameElement.textContent;

  var post = {
    username: username,
    text: text,
    image: image ? URL.createObjectURL(image) : null
  };

  // Obtener publicaciones del almacenamiento local
  var posts = JSON.parse(localStorage.getItem("posts")) || [];

  // Agregar la nueva publicación al principio del array
  posts.unshift(post);

  // Limitar el número de publicaciones a mostrar (opcional)
  const maxPostsToShow = 0;
  if (posts.length > maxPostsToShow) {
    posts.splice(maxPostsToShow);
  }

  // Almacenar publicaciones en el almacenamiento local
  localStorage.setItem("posts", JSON.stringify(posts));

  // Redirigir al inicio
  window.location.href = "/inicio.html";
});
