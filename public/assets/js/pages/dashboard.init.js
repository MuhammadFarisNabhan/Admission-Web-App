
/*
Template Name: Minible - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: support@themesbrand.com
File: Dashboard
*/


//
// Total Revenue Chart
//
// var options1 = {
//     series: [{
//         data: [25, 66, 41, 89, 63, 25, 44, 20, 36, 40, 54]
//     }],
//     fill: {
//         colors: ['#5b73e8']
//     },
//     chart: {
//         type: 'bar',
//         width: 70,
//         height: 40,
//         sparkline: {
//             enabled: true
//         }
//     },
//     plotOptions: {
//         bar: {
//             columnWidth: '50%'
//         }
//     },
//     labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
//     xaxis: {
//         crosshairs: {
//             width: 1
//         },
//     },
//     tooltip: {
//         fixed: {
//             enabled: false
//         },
//         x: {
//             show: false
//         },
//         y: {
//             title: {
//                 formatter: function (seriesName) {
//                     return ''
//                 }
//             }
//         },
//         marker: {
//             show: false
//         }
//     }
// };

// var chart1 = new ApexCharts(document.querySelector("#total-revenue-chart"), options1);
// chart1.render();

// //
// // Orders Chart
// //
// var options = {
//     fill: {
//         colors: ['#f1b44c']
//     },
//     series: [70],
//     chart: {
//         type: 'radialBar',
//         width: 45,
//         height: 45,
//         sparkline: {
//             enabled: true
//         }
//     },
//     dataLabels: {
//         enabled: false
//     },
//     plotOptions: {
//         radialBar: {
//             hollow: {
//                 margin: 0,
//                 size: '60%'
//             },
//             track: {
//                 margin: 0
//             },
//             dataLabels: {
//                 show: false
//             }
//         }
//     }
// };

// var chart = new ApexCharts(document.querySelector("#orders-chart"), options);
// chart.render();


// // 
// // Customers Chart
// //

// var options = {
//     fill: {
//         colors: ['#34c38f']
//     },
//     series: [55],
//     chart: {
//         type: 'radialBar',
//         width: 45,
//         height: 45,
//         sparkline: {
//             enabled: true
//         }
//     },
//     dataLabels: {
//         enabled: false
//     },
//     plotOptions: {
//         radialBar: {
//             hollow: {
//                 margin: 0,
//                 size: '60%'
//             },
//             track: {
//                 margin: 0
//             },
//             dataLabels: {
//                 show: false
//             }
//         }
//     }
// };

// var chart = new ApexCharts(document.querySelector("#customers-chart"), options);
// chart.render();


// // 
// // Growth Chart
// //
// var options2 = {
//     series: [{
//         data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
//     }],
//     fill: {
//         colors: ['#f1b44c']
//     },
//     chart: {
//         type: 'bar',
//         width: 70,
//         height: 40,
//         sparkline: {
//             enabled: true
//         }
//     },
//     plotOptions: {
//         bar: {
//             columnWidth: '50%'
//         }
//     },
//     labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
//     xaxis: {
//         crosshairs: {
//             width: 1
//         },
//     },
//     tooltip: {
//         fixed: {
//             enabled: false
//         },
//         x: {
//             show: false
//         },
//         y: {
//             title: {
//                 formatter: function (seriesName) {
//                     return ''
//                 }
//             }
//         },
//         marker: {
//             show: false
//         }
//     }
// };

// var chart2 = new ApexCharts(document.querySelector("#growth-chart"), options2);
// chart2.render();

var options = {
    chart: {
        height: 375,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '45%',
            endingShape: 'rounded'	
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Pendaftar',
        data : pendaftar,
    }, {
        name: 'Belum Daftar Ulang',
        data : belum_daftar,
    }, {
        name: 'Daftar Ulang',
        data : daftar_ulang,
    }],
    colors: ['#5b73e8', '#f1b44c', '#34c38f'],
    xaxis: {
        categories: categories,
    },
    yaxis: {
        title: {
            text: 'Orang'
        }
    },
    grid: {
        borderColor: '#f1f1f1',
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return  val + " orang"
            }
        }
    }
}
var chart = new ApexCharts(
    document.querySelector("#column_chart"),
    options
    );

chart.render();