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

async function loadLineChart() {
  let config = configObj('POST', formData());
  let response = await sendData('/dashboard/line-chart', config);
  let chartDom = document.querySelector('#lineChart');
  let myChart = echarts.init(chartDom);

  let option = {
    textStyle: {
        color: '#ffffff'
    },
    title: {
      text: 'Repositórios criados por mês',
      textStyle: {
        color: '#ffffff'
      }
    },
    tooltip: {
      trigger: 'axis',
      textStyle: {
          color: '#000000'
      }
    },
    legend: {
      data: ['Repositórios'],
      textStyle: {
          color: '#ffffff'
      }
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
    },
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
    },
    yAxis: {
      type: 'value'
    },
    series: [
      {
        name: 'Repositórios',
        type: 'line',
        stack: 'Total',
        data: response
      },
    ]
  };

  myChart.setOption(option);
}

async function loadPieChart() {
  let config = configObj('POST', formData());
  let response = await sendData('/dashboard/pie-chart', config);

  let chartDom = document.querySelector('#pizzaChart');
  let myChart = echarts.init(chartDom);

  let option = {
    title: {
      text: 'Percentual de discussões',
      textStyle: {
        color: '#ffffff'
      }
    },
    tooltip: {
      trigger: 'item',
      textStyle: {
          color: '#000000'
      }
    },
    legend: {
      top: '5%',
      left: 'center',
      textStyle: {
          color: '#ffffff'
      }
    },
    series: [
      {
        name: 'Status discussões',
        type: 'pie',
        radius: ['40%', '70%'],
        avoidLabelOverlap: false,
        padAngle: 5,
        itemStyle: {
          borderRadius: 10
        },
        label: {
          show: false,
          position: 'center'
        },
        labelLine: {
          show: false
        },
        data: response
      }
    ]
  };

  myChart.setOption(option);
}

async function loadBarChart() {
  let config = configObj('POST', formData());
  let response = await sendData('/dashboard/bar-chart', config);
  let chartDom = document.querySelector('#barChart');
  let myChart = echarts.init(chartDom);

  let option = {
    title: {
      text: 'Top 10 repositórios',
      textStyle: {
        color: '#ffffff'
      }
    },
    legend: {
      textStyle: {
          color: '#ffffff'
      }
    },
    tooltip: {},
    dataset: {
      dimensions: ['Repositório', 'Total commits'],
      source: response
    },
    xAxis: { type: 'category' },
    yAxis: {},
    series: [{ type: 'bar' }]
  };

  myChart.setOption(option);
}

document.addEventListener('DOMContentLoaded', () => {
    loadCounts();
    loadLineChart();
    loadPieChart();
    loadBarChart();
})