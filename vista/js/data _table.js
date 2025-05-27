$(document).ready(function () {
    $('#tabla').dataTable();
});

window.addEventListener("DOMContentLoaded", () => {
    const tabla = document.querySelector("#tabla");
    if (tabla) {
      const dataTable = new DataTable(tabla, {
        language: {
          lengthMenu: "Mostrar _MENU_ registros por página",
          zeroRecords: "No se encontraron resultados",
          info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
          infoEmpty: "Mostrando 0 a 0 de 0 registros",
          infoFiltered: "(filtrado de _MAX_ registros totales)",
          search: "Buscar:",
          paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
          }
        }
      });
  
      // Añadir lupa como antes
      setTimeout(() => {
        const searchInput = document.querySelector(".dataTable-input");
        if (searchInput && !searchInput.dataset.iconAdded) {
          const icon = document.createElement("i");
          icon.className = "fa fa-search";
          icon.style.marginLeft = "8px";
          icon.style.fontSize = "16px";
          icon.style.color = "#555";
          searchInput.parentNode.appendChild(icon);
          searchInput.dataset.iconAdded = "true";
        }
      }, 100);
    }
  });


