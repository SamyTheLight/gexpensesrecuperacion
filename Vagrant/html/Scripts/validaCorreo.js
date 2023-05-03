function validarCorreo(correo) {
	const expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
	const esValido = expReg.test(correo);

	console.log(esValido);
	const error = document.querySelector(".error")
	if (esValido == false) {
		error.className = "mostrar-error";
			
	}
}
const correo = document.getElementById('mails');
document.querySelector(".btn-email").addEventListener("click", e => {
    e.preventDefault();
    validarCorreo(correo);
    

});

/*const correo = document.getElementById('input-mail');
document.querySelector(".btn-enviar").addEventListener("click", e => {
    e.preventDefault();
    validarCorreo(correo);
    

});*/