let buttonLogin = document.querySelector(".button_login");
let buttonSignIn = document.querySelector(".button_sign-in");
let buttonCreatePost = document.querySelector(".button_create_post");
let modalLogin = document.querySelector(".modal_login");
let modalSignIn = document.querySelector(".modal_sign-in");
let modalCreatePost = document.querySelector(".modal_create_post");
let formLogin = document.querySelector(".form_login");
let formSignIn = document.querySelector(".form_sign-in");
let formCreatePost = document.querySelector(".form_create_post");

buttonLogin?.addEventListener("click", () => {
  modalLogin.classList.toggle("modal_closed");
  formLogin.querySelector("input").focus();
});

buttonSignIn?.addEventListener("click", () => {
  modalSignIn.classList.toggle("modal_closed");
  formSignIn.querySelector("input").focus();
});

buttonCreatePost?.addEventListener("click", () => {
  modalCreatePost.classList.toggle("modal_closed");
  formCreatePost.querySelector("input").focus();
});

let buttonsLogin = formLogin.querySelectorAll("button");
buttonsLogin.forEach((button) => {
  button?.addEventListener("click", () => {
    modalLogin.classList.toggle("modal_closed");
  });
});

let buttonsSignIn = formSignIn.querySelectorAll("button");
buttonsSignIn.forEach((button) => {
  button?.addEventListener("click", () => {
    modalSignIn.classList.toggle("modal_closed");
  });
});

let buttonsCreatePost = formCreatePost.querySelectorAll("button");
buttonsCreatePost.forEach((button) => {
  button?.addEventListener("click", () => {
    modalSignIn.classList.toggle("modal_closed");
  });
});

modalLogin?.addEventListener("click", function (event) {
  const isOutside = !event.target.closest(".form_login");
  if (isOutside) {
    modalLogin.classList.toggle("modal_closed");
  }
});

modalSignIn?.addEventListener("click", function (event) {
  const isOutside = !event.target.closest(".form_sign-in");
  if (isOutside) {
    modalSignIn.classList.toggle("modal_closed");
  }
});

modalCreatePost?.addEventListener("click", function (event) {
  const isOutside = !event.target.closest(".form_create_post");
  if (isOutside) {
    modalCreatePost.classList.toggle("modal_closed");
  }
});

document.querySelectorAll("textarea").forEach((textarea) => {
  textarea.addEventListener("input", () => {
    textarea.style.height = `${textarea.scrollHeight}px`;
  });
});
