const btn_sel = document.getElementById("afegirActivitat1");
const btn_acc = document.getElementById("aceptar");

btn_sel.addEventListener("click", function (e) {
  e.preventDefault();
  const select =
    document.getElementById("tipusActivitat1").options[
      document.getElementById("tipusActivitat1").selectedIndex
    ].value;

  if (select == "Pago básico") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");
  } else if (select == "Pago avanzado") {
    console.log(2);
  }
});
btn_acc.addEventListener("click", function (e) {
  e.preventDefault();
  window.location = "detallActivitat.php";
});
