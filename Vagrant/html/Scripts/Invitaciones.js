const error = document.getElementById("error");
error.className = "error";

function addAct() {
  const value = document.getElementById("mails").value;
  const actList = document.getElementById("emails");
  const element = document.createElement("div");
  const btn = document.createElement("btn");
  const input = document.createElement("input");

  element.classList.add("news-mails");
  actList.appendChild(element);
  input.type = "text";
  input.classList.add("input-mail");
  input.setAttribute("id", "input-mail");
  input.name = "emailEnviados[]";
  input.value = value;
  element.appendChild(input);
  btn.classList.add("btn-mail");
  btn.setAttribute("id", "btn-mail");
  btn.name = "btn-mail";
  btn.append("BORRAR");
  element.appendChild(btn);
}

function deleteAct(element) {
  if (element.name === "btn-mail") {
    element.parentElement.remove();
  }
}

function validarCorreo(mail) {
  const expReg =
    /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
  const esValido = expReg.test(mail);
  console.log(mail);
  console.log(esValido);

  if (esValido == true) {
    error.className = "error";
    addAct();
    const mail = document.getElementById("mails");
    mail.value = "";
  } else if (esValido == false) {
    error.className = "mostrar-error";
  }
}

document.querySelector(".btn-email").addEventListener("click", (e) => {
  const correo = document.getElementById("mails").value;
  e.preventDefault();
  validarCorreo(correo);
});
document.getElementById("emails").addEventListener("click", function (e) {
  deleteAct(e.target);
});
