/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Echarts Init Js File
*/

// pie chart

var dom = document.getElementById("pie-chart");
var myChart = echarts.init(dom);
// var app = {};
// option = null;
// option = {
//     tooltip : {
//         trigger: 'item',
//         formatter: "{a} <br/>{b} : {c} ({d}%)"
//     },
//     legend: {
//         orient: 'vertical',
//         left: 'left',
//         data: ['Laptop','Tablet','Mobile','Others','Desktop'],
//         textStyle: {color: '#8791af'}
//     },
//     color: ['#f46a6a', '#34c38f', '#50a5f1', '#f1b44c', '#556ee6'],
//     series : [
//         {
//             name: 'Total sales',
//             type: 'pie',
//             radius : '55%',
//             center: ['50%', '60%'],
//             data:[
//                 {value:335, name:'Laptop'},
//                 {value:310, name:'Tablet'},
//                 {value:234, name:'Mobile'},
//                 {value:135, name:'Others'},
//                 {value:1548, name:'Desktop'}
//             ],
//             itemStyle: {
//                 emphasis: {
//                     shadowBlur: 10,
//                     shadowOffsetX: 0,
//                     shadowColor: 'rgba(0, 0, 0, 0.5)'
//                 }
//             }
//         }
//     ]
// };
// ;
// if (option && typeof option === "object") {
//     myChart.setOption(option, true);
// }

// setInterval(function () {
//     option.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
//     myChart.setOption(option, true);
// },2000);
// ;
// if (option && typeof option === "object") {
//     myChart.setOption(option, true);
// }