var tabla= document.querySelector("#tabla");
var dataTable=new DataTable(tabla);

window.addEventListener("DOMContentLoaded", () => {
  const tabla = document.querySelector("#tabla");
  if (tabla) {
      const dataTable = new DataTable(tabla);
      setTimeout(() => {
      const searchInput = document.querySelector(".dataTable-input");
      if (searchInput && !searchInput.dataset.iconAdded) {
          const icon = document.createElement("i");
          icon.className = "fa fa-search";
          icon.style.marginLeft = "8px";
          icon.style.fontSize = "16px";
          icon.style.color = "#555";
          searchInput.parentNode.appendChild(icon);
          searchInput.dataset.iconAdded = "true"; // evitar duplicados
      }
      }, 100);
  }
  });


