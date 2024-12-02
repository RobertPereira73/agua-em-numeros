function loadCounts() {
  let counts = document.querySelectorAll('.cardCountable');
  counts.forEach(async(count) => {
    let type = count.getAttribute('data-type');
    let form = formData();
    form.append('type', type);

    let config = configObj('POST', form);
    let response = await sendData('/dashboard/counts', config) 

    setCount(count, response);
  })
}

function setCount(element, total) {
  element.querySelector('.count').innerHTML = `<span class="colorWhite roboto">${total}</span>`;
}


function loadChart2() {
    var chartDom = document.getElementById('main');
    var myChart = echarts.init(chartDom);
    var option;

    option = {
        xAxis: {
            type: 'category',
            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
            data: [120, 200, 150, 80, 70, 110, 130],
            type: 'bar'
            }
        ]
    };

    myChart.setOption(option);
}

document.addEventListener('DOMContentLoaded', () => {
    // loadChart();
    loadCounts();
    loadChart2();
})