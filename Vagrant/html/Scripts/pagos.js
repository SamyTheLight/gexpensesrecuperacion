const formulario = `
<div id="back-form1">
            <div id="form-act1">
                <section class="cantact_info1">
                    <section class="info_title1">
                        <h2>REPARTE TUS GASTOS</h2>
                        <section class="info_items1">
                            <p>¡Reparte el gasto con tus amigos! </p>
                        </section>
                    </section>
                </section>
                <form action="" id="act-form1" method="POST">
                <button id="btn-cerrar1">X</button>
                <div id="form-pay1">
                    <label for="tipusAct1">Tipo de pago: </label>
                    <select name="tipusActivitat" id="tipusActivitat1" class="form-control1" >
                        <option value=""selected disabled>Selecciona un pago</option>
                        <option value="Pago básico">Pago básico</option>
                        <option value="Pago avanzado">Pago avanzado</option>
                    </select>
                </div>
                    <button class="btn-card1" id="afegirActivitat1" name="enviarActivitat">SELECCIONAR</button>
            </div>
            </form>
        </div>
`;

const btn_form = document.getElementById("btn-form");
const form_act1 = document.getElementById("form-act");

function repartir(importe, miembros) {
  const resultado = importe / miembros;
  return resultado;
}
document.querySelector(".btn-card").addEventListener("click", function (e) {
  e.preventDefault();
  btn_form.insertAdjacentHTML("afterend", formulario);
  form_act1.classList.add("form-act");
});
