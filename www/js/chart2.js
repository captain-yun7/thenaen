const value = 40;

new Chart(document.getElementById("myChart"), {
    type : 'doughnut',
    data : {
        datasets: [
            {
            data: [value, 100 - value],
            backgroundColor: ["#78B3FE", "#ffffff00"],
            borderWidth: 0,
            borderRadius: 30,
            },
        ],
    },    
    options : {
        cutout: '80%',
        hover: { mode: null },
            plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                enabled: false,
            },
        },
    },
});


const value2 = 60;

new Chart(document.getElementById("myChart2"), {
    type : 'doughnut',
    data : {
        datasets: [
            {
            data: [value2, 100 - value2],
            backgroundColor: ["#31619F", "#ffffff00"],
            borderWidth: 0,
            borderRadius: 30,
            },
        ],
    },    
    options : {
        cutout: '75%',
        hover: { mode: null },
            plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                enabled: false,
            },
        },
    },
});



const value3 = 60;

new Chart(document.getElementById("myChart3"), {
    type : 'doughnut',
    data : {
        datasets: [
            {
            data: [value3, 100 - value3],
            backgroundColor: ["#173357", "#ffffff00"],
            borderWidth: 0,
            borderRadius: 30,
            },
        ],
    },    
    options : {
        cutout: '60%',
        hover: { mode: null },
            plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                enabled: false,
            },
        },
    },
});