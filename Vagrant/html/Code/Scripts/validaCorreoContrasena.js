/*
const nombreUsuario = document.getElementById('input-nameuser-register').value;
const contrasena1 = document.getElementById('input-password-register').value;
const contrasena2 = document.getElementById('input-password2-register').value;
const email = document.getElementById('input-mail-register').value;


// -- VALIDAR CORREO --
function validarCorreo(correo) {
	const expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
	const esValido = expReg.test(correo);


	const mail = document.getElementById('input-mail-register');
	if (esValido == false) {
		const p = document.createElement('p');
		p.append('El correo no es correcto, porfavor introduzca los carácteres necesarios');
		mail.appendChild(p);
		mail.insertAdjacentElement('afterend',p);
	}
}
// -- VALIDAR CONTRASEÑA -- 
function validarContrasena(contrasena) {
	const expReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;
	const esValido = expReg.test(contrasena);


	const contrasena1 = document.getElementById('input-password-register');
	if (esValido == false) {
		const p = document.createElement('p');
		p.append('La contraseña no es correcta, porfavor introduzca los carácteres necesarios.');
		contrasena1.appendChild(p);
		contrasena1.insertAdjacentElement('afterend',p);
	}
}
// --VALIDAR  QUE SE REPITA LA CONTRASEÑA -- 
function validarContrasenas(contrasena, contrasena2) {

	const contrasenas = document.getElementById('input-password2-register');
	if (contrasena != contrasena2) {
		const p = document.createElement('p');
		p.append('Las contraseñas no coinciden,por favor revíselas.');
		contrasenas.appendChild(p);
		contrasenas.insertAdjacentElement('afterend',p);
	}
}



document.querySelector(".btn-enviar").addEventListener("click", e => {
	e.preventDefault();
	validarContrasena(contrasena1);
	validarContrasenas(contrasena1, contrasena2);
	validarCorreo(email);


});*/