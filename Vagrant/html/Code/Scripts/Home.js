const formulario = `
<div id="back-form">
            <div id="form-act">
                <section class="cantact_info">
                    <section class="info_title">
                        <h2>AÑADE UNA ACTIVIDAD</h2>
                        <section class="info_items">
                            <p>¡Añade una actividad para poder disfrutar de nuestra web! </p>
                        </section>
                    </section>
                </section>
                <form action="" id="act-form" method="POST"">
                <button id="btn-cerrar">X</button>
        <h2>Añade una actividad</h2>
        <div class=" user_info">
                    <label for="names">Nombre de la actividad </label>
                    <input type="text" id="names" placeholder="Nombre de la actividad" class="form-control" name="nomActivitat">

                    <label for="description">Descripción</label>
                    <input type="text" placeholder="Descripción de la actividad" class="form-control" name="descripcionActivitat">

                    <label for="mensaje">Divisa</label>
                    <select name="divisa" id="divisa" class="form-control" name="divisa">
                        <option value="$">$</option>
                        <option value="€">€</option>
                        <option value="¥">¥</option>
                    </select>
                    <label for="tipusAct">Tipo de actividad</label>
                    <select name="tipusActivitat" id="tipusActivitat" class="form-control" name="tipusActivitat">
                        <option value="Viajes">Viajes</option>
                        <option value="Comida">Comida</option>
                        <option value="Deportes">Deportes</option>
                        <option value="Ocio">Ocio</option>
                    </select>

                    <button class="btn-card" id="afegirActivitat" name="enviarActivitat">AÑADIR ACTIVIDAD</button>
            </div>
            </form>
        </div>
`;

const btn_cerrar = document.getElementById("btn-cerrar");
const btn_form = document.querySelector(".btn-form");
const div = document.querySelector(".face");
const face_card = document.querySelector(".img-card");

document.getElementById("form-btn").addEventListener("click", function () {
  btn_form.insertAdjacentHTML("afterend", formulario);
  const act = document.getElementById("tipusActivitat");
  document
    .getElementById("afegirActivitat")
    .addEventListener("click", function (e) {
      let selectedOption = act.options[act.selectedIndex];
      if (selectedOption.value == "Viajes") {
        const img = document.createElement("img");
        img.src = "/Code/PHP/Images/Viaje_Combinado.png";
        div.insertAdjacentElement("afterbegin", img);
      } else if (selectedOption.value == "Comida") {
        const img = document.createElement("img");
        img.src = "/Code/PHP/Images/comida.jpg";
        div.insertAdjacentElement("afterbegin", img);
      } else if (selectedOption.value == "Deportes") {
        const img = document.createElement("img");
        img.src = "/Code/PHP/Images/deportes.jpg";
        div.insertAdjacentElement("afterbegin", img);
      } else if (selectedOption.value == "Ocio") {
        const img = document.createElement("img");
        img.src = "/Code/PHP/Images/ocio.webp";
        div.insertAdjacentElement("afterbegin", img);
      }
      window.location.href = "Invitaciones.php";
    });
});
