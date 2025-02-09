// // Call the dataTables jQuery plugin
// $(document).ready(function () {
//   $("#dataTable").DataTable({
//     dom: "Bfrtip",
//     buttons: [
//       { extend: "copyHtml5", footer: true },
//       { extend: "excelHtml5", footer: true },
//       {
//         extend: "csvHtml5", footer: true },
//       { extend: "pdfHtml5", footer: true },
//       {
//         extend: "print",
//         footer: true,
//         customize: function (win) {
//           $(win.document.body).find("h1").css("text-align", "center");
//           $(win.document.body)
//             .find("table")
//             .addClass("compact")
//             .css("font-size", "inherit");
//           $(win.document.body).find("th").css("background-color", "#f2f2f2");
//           $(win.document.body).find("th:last-child, td:last-child").hide();
//         },
//       },
//     ],
//   });
// });



$(document).ready(function() {
  $("#dataTable").DataTable({
    dom: "Bfrtip",
    buttons: [
      { extend: "copyHtml5", footer: true },
      { extend: "excelHtml5", footer: true },
      {
        extend: "csvHtml5",
        footer: true,
        exportOptions: {
          columns: ":not(:last-child)" // Exclude the last column from export
        }
      },
      { extend: "pdfHtml5", footer: true },
      {
        extend: "print",
        footer: true,
        customize: function(win) {
          $(win.document.body).find("h1").css("text-align", "center");
          $(win.document.body)
            .find("table")
            .addClass("compact")
            .css("font-size", "inherit");
          $(win.document.body).find("th").css("background-color", "#f2f2f2");
          $(win.document.body).find("th:last-child, td:last-child").hide();
        }
      }
    ]
  });
});