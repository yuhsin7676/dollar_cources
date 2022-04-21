$("#mainForm").submit(function(e) {

    e.preventDefault(); // тормозим дефолтное событие

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements. (см: https://ruseller.com/jquery.php?id=8)
        success: function(data)
        {
            data = JSON.parse(data); // Должен вернуться массив 2-х массивов
            createChart(data[1],data[0]);
        }
    });

});

function createChart(xData, yData){

    // создаем диаграмму:
    Highcharts.chart('container', {

    // Заголовок диаграммы
    title: {
        text: 'Курс доллара к рублю'
    },

    // значения горизонтальной оси
    xAxis: {
        categories: xData
    },

    // Заголовок вертикальной оси
    yAxis: {
        title: {
            text: 'Цена доллара в рублях'
        }
    },

    // Расположение надписи yAxis.title.text
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    // серия значений
    series: [{
        name: 'Курс',
        data: yData
    }],

    // ???
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
        }

    });

};