const data = document.querySelector(".data");
const data_login = document.querySelector(".formulari-login");
const data_register = document.querySelector(".formulari-register");
const back_login = document.querySelector(".back-box-login");
const back_register = document.querySelector(".back-box-register");
const button_login = document.querySelector("#buttonLogin");
const button_register = document.querySelector("#buttonRegister");
const register = document.querySelector(".Register");
const buttonBackLogin = document.querySelector("#BackBoxButtonLogin");
const buttonBackRegister = document.querySelector("#BackBoxButtonRegister");
const registeredAlert = document.getElementById("has_registered");
const email = document.getElementById("input-mail-register");
const usernameRegister = document.getElementById("input-nameuser-register");
const passwordRegister = document.getElementById("input-password2-register");
const alert = document.querySelector(".alert-success");
const formRegistre = document.getElementById("formRegistre");
const password = document.getElementById("input-password2-register");
const buttonRegister = document.getElementById("buttonRegister");
const exprMail = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
const exprPassword =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

let validR = 0;

buttonBackRegister.addEventListener("click", registrar);
buttonBackLogin.addEventListener("click", loguear);

if (registeredAlert) registrar(true);
else loguear(true);

function validarDades(email, password, validR) {
  if (exprMail.test(email.value)) {
    email.style.backgroundColor = "green";
    validR = 0;
  } else {
    email.style.backgroundColor = "red";
    validR = 1;
  }

  if (exprPassword.test(password.value)) {
    password.style.backgroundColor = "green";
    validR = 0;
  } else {
    password.style.backgroundColor = "red";
    validR = 1;
  }
  return validR;
}

formRegistre.addEventListener("submit", (e) => {
  e.preventDefault();

  let dadesvalidades = validarDades(email, password, validR);

  if (dadesvalidades == 0) {
    formRegistre.submit();
  }

  formRegistre.reset();
});

function registrar(first_time = false) {
  document.querySelectorAll(".form_block").forEach((element) => {
    element.classList.remove("active");
  });
  data_register.classList.add("active");

  data.style.left = "300px";

  back_login.style.opacity = "1";
  back_register.style.opacity = "0";
}

function loguear(first_time = false) {
  document.querySelectorAll(".form_block").forEach((element) => {
    element.classList.remove("active");
  });
  data_login.classList.add("active");
  data.style.left = "-380px";
  back_login.style.opacity = "0";
  back_register.style.opacity = "1";
}

//Validar inputs login
// const form = document.querySelector('.form_block formulari-login');
// const usernameInput = document.querySelector('.input-nameuser-login');
// const passwordInput = document.querySelector('.input-password-login');
// const errorMessage = document.querySelector('#error-message');

// form.addEventListener('submit', (event) => {
//   event.preventDefault();

//   const username = usernameInput.value.trim();
//   const password = passwordInput.value.trim();

//   if(username === ''){
    
//   }
// })