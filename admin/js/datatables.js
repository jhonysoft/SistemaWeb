var myTable = document.querySelector("#myTable");
var dataTable = new DataTable(myTable,{
  perPage:5,
  perPageSelect:[5,10,15,20],
  labels: {
    placeholder: "Buscar...",
    perPage: "{select} Páginas",
    noRows: "No se encontraron resultados",
    info: "Vistas {start} al {end} de {rows} entradas",
   
}
});