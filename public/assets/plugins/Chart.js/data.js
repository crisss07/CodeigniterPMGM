$(function() {
		
    
    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart_tramite"),
        {
            "type":"line",
            "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
            "datasets":[{
                            "label":"Tramites por Mes",
                            "data":[65,59,80,81,56,s	],
                            "fill":false,
                            "borderColor":"rgb(86, 192, 216)",
                            "lineTension":0.1
                        }]
        },"options":{}});
    
    /*<!-- ============================================================== -->*/
    /*<!-- Bar Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart_predrios"),
        {
            "type":"bar",
            "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
            "datasets":[{
                            "label":"Predios Registrados por Mes",
                            "data":[65,59,80,81,56,55,40],
                            "fill":false,
                            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                            "borderColor":["rgb(239, 83, 80)","rgb(255, 159, 64)","rgb(255, 178, 43)","rgb(86, 192, 216)","rgb(57, 139, 247)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                            "borderWidth":1}
                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });
    
 
   
    
});