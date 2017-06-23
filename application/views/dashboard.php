<script type="text/javascript">
$(function() {
    var data = [{
        label: "Acre (AC)",
        data: <?php echo $lista['AC'];?>
    }, {
        label: "Alagoas (AL)",
        data: <?php echo $lista['AL'];?>

    }, {
        label: "Amapá (AP)",
        data: <?php echo $lista['AP'];?>
    }, {
        label: "Amazonas (AM)",
        data: <?php echo $lista['AM'];?>
    },{
        label: "Bahia (BA)",
        data: <?php echo $lista['BA'];?>
    },{
        label: "Ceará (CE)",
        data: <?php echo $lista['CE'];?>
    },{
        label: "Distrito Federal (DF)",
        data: <?php echo $lista['DF'];?>
    },{
        label: "Espírito Santo (ES)",
        data: <?php echo $lista['ES'];?>
    },{
        label: "Goiás (GO)",
        data: <?php echo $lista['GO'];?>
    },{
        label: "Maranhão (MA)",
        data: <?php echo $lista['MA'];?>
    },{
        label: "Mato Grosso (MT)",
        data: <?php echo $lista['MT'];?>
    },{
        label: "Mato Grosso do Sul (MS)",
        data: <?php echo $lista['MS'];?>
    },{
        label: "Minhas Gerais (MG)",
        data: <?php echo $lista['MG'];?>
    },{
        label: "Pará (PA)",
        data: <?php echo $lista['PA'];?>
    },{
        label: "Paraíba (PB)",
        data: <?php echo $lista['PB'];?>
    },{
        label: "Paraná (PR)",
        data: <?php echo $lista['PR'];?>
    },{
        label: "Pernambuco (PE)",
        data: <?php echo $lista['PE'];?>
    },{
        label: "Piauí (PI)",
        data: <?php echo $lista['PI'];?>
    },{
        label: "Rio de Janeiro (RJ)",
        data: <?php echo $lista['RJ'];?>
    },{
        label: "Rio Grande do Norte (RN)",
        data: <?php echo $lista['RN'];?>
    },{
        label: "Rio Grande do Sul (RS)",
        data: <?php echo $lista['RS'];?>
    },{
        label: "Rondônia (RO)",
        data: <?php echo $lista['RO'];?>
    },{
        label: "Roraima (RR)",
        data: <?php echo $lista['RR'];?>
    },{
        label: "Santa Catarina (SC)",
        data: <?php echo $lista['SC'];?>
    },{
        label: "São Paulo (SP)",
        data: <?php echo $lista['SP'];?>
    },{
        label: "Sergipe (SE)",
        data: <?php echo $lista['SE'];?>
    },{
        label: "Tocantins (TO)",
        data: <?php echo $lista['TO'];?>
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
            content: "%p.0%, %s", // mostra a porcentagem com um digito decimal
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: true
        }
    });

});


$(function() {
    var data = [{
        label: "Acre (AC)",
        data: <?php echo $lista2['AC'];?>
    }, {
        label: "Alagoas (AL)",
        data: <?php echo $lista2['AL'];?>

    }, {
        label: "Amapá (AP)",
        data: <?php echo $lista2['AP'];?>
    }, {
        label: "Amazonas (AM)",
        data: <?php echo $lista2['AM'];?>
    },{
        label: "Bahia (BA)",
        data: <?php echo $lista2['BA'];?>
    },{
        label: "Ceará (CE)",
        data: <?php echo $lista2['CE'];?>
    },{
        label: "Distrito Federal (DF)",
        data: <?php echo $lista2['DF'];?>
    },{
        label: "Espírito Santo (ES)",
        data: <?php echo $lista2['ES'];?>
    },{
        label: "Goiás (GO)",
        data: <?php echo $lista2['GO'];?>
    },{
        label: "Maranhão (MA)",
        data: <?php echo $lista2['MA'];?>
    },{
        label: "Mato Grosso (MT)",
        data: <?php echo $lista2['MT'];?>
    },{
        label: "Mato Grosso do Sul (MS)",
        data: <?php echo $lista2['MS'];?>
    },{
        label: "Minhas Gerais (MG)",
        data: <?php echo $lista2['MG'];?>
    },{
        label: "Pará (PA)",
        data: <?php echo $lista2['PA'];?>
    },{
        label: "Paraíba (PB)",
        data: <?php echo $lista2['PB'];?>
    },{
        label: "Paraná (PR)",
        data: <?php echo $lista2['PR'];?>
    },{
        label: "Pernambuco (PE)",
        data: <?php echo $lista2['PE'];?>
    },{
        label: "Piauí (PI)",
        data: <?php echo $lista2['PI'];?>
    },{
        label: "Rio de Janeiro (RJ)",
        data: <?php echo $lista2['RJ'];?>
    },{
        label: "Rio Grande do Norte (RN)",
        data: <?php echo $lista2['RN'];?>
    },{
        label: "Rio Grande do Sul (RS)",
        data: <?php echo $lista2['RS'];?>
    },{
        label: "Rondônia (RO)",
        data: <?php echo $lista2['RO'];?>
    },{
        label: "Roraima (RR)",
        data: <?php echo $lista2['RR'];?>
    },{
        label: "Santa Catarina (SC)",
        data: <?php echo $lista2['SC'];?>
    },{
        label: "São Paulo (SP)",
        data: <?php echo $lista2['SP'];?>
    },{
        label: "Sergipe (SE)",
        data: <?php echo $lista2['SE'];?>
    },{
        label: "Tocantins (TO)",
        data: <?php echo $lista2['TO'];?>
    },
    ];
    var plotObj = $.plot($("#flot-pie-chart2"), data, {
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
            content: "%p.0%, %s", // mostra a porcentagem com dois digitos decimais
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

$(function() {

    var barOptions = {
        series: {
            bars: {
                show: false,
                barWidth: 100
            }
        },
       
        grid: {
            hoverable: true
        },
        legend: {
            show: true
        },
        tooltip: false,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    var barData = {
        label: "Número de ocorrências por idade",
        data: [
            [0,<?php echo $lista3['0-10'];?>,1],
            [10,<?php echo $lista3['0-10'];?>,1],
            [20,<?php echo $lista3['11-20'];?>,2],
            [30,<?php echo $lista3['21-30'];?>,3],
            [40,<?php echo $lista3['31-40'];?>,4],
            [50,<?php echo $lista3['41-50'];?>,5],
            [60,<?php echo $lista3['51-60'];?>,6],
            [70,<?php echo $lista3['61-70'];?>,7],
            [80,<?php echo $lista3['71-80'];?>,8],
            [90,<?php echo $lista3['81-90'];?>,9],
            [100,<?php echo $lista3['91-100'];?>,10],

        ]
    };
    $.plot($("#flot-bar-chart"), [barData], barOptions);

});
</script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
 
<div class="row">
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gráfico de pessoas desaparecidas
            </div>
                        
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                </div>
            </div>
                       
        </div>
    </div>



    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gráfico de pessoas encontradas
            </div>
                        
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart2"></div>
                </div>
            </div>
                       
        </div>
    </div>
</div>

<div class="col-lg-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"> Gráfico de idades </h3>
        </div>
        <div class="panel-body">
            <div class="flot-chart">
            <div class="text-left">
               <strong> Ocorrências </strong>
            </div>
                <div class="flot-chart-content" id="flot-bar-chart"></div>
            </div>
           
        </div>
        <div class="text-right">
               <strong> Idade </strong>
            </div>
    </div>
</div>