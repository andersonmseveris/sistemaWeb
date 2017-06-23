$(function() {

    var data = [{
        label: "Acre (AC)",
        data: 1
    }, {
        label: "Alagoas (AL)",
        data: 0

    }, {
        label: "Amapá (AP)",
        data: 0
    }, {
        label: "Amazonas (AM)",
        data: 0
    },{
        label: "Bahia (BA)",
        data: 0
    },{
        label: "Ceará (CE)",
        data: 0
    },{
        label: "Distrito Federal (DF)",
        data: 0
    },{
        label: "Espírito Santo (ES)",
        data: 0
    },{
        label: "Goiás (GO)",
        data: 0
    },{
        label: "Maranhão (MA)",
        data: 0
    },{
        label: "Mato Grosso (MT)",
        data: 0
    },{
        label: "Mato Grosso do Sul (MS)",
        data: 0
    },{
        label: "Minhas Gerais (MG)",
        data: 0
    },{
        label: "Pará (PA)",
        data: 0
    },{
        label: "Paraíba (PB)",
        data: 0
    },{
        label: "Paraná (PR)",
        data: 0
    },{
        label: "Pernambuco (PE)",
        data: 0
    },{
        label: "Piauí (PI)",
        data: 0
    },{
        label: "Rio de Janeiro (RJ)",
        data: 0
    },{
        label: "Rio Grande do Norte (RN)",
        data: 0
    },{
        label: "Rio Grande do Sul (RS)",
        data: 0
    },{
        label: "Rondônia (RO)",
        data: 0
    },{
        label: "Roraima (RR)",
        data: 0
    },{
        label: "Santa Catarina (SC)",
        data: 0
    },{
        label: "São Paulo (SP)",
        data: 0
    },{
        label: "Sergipe (SE)",
        data: 0
    },{
        label: "Tocantins (TO)",
        data: 0
    },

    ];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});
