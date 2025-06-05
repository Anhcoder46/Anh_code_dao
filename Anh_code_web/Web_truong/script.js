// Thiết lập biểu đồ (sử dụng Chart.js)
const ctx = document.getElementById('gradeChart').getContext('2d');
const gradeChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Môn A', 'Môn B', 'Môn C'],
        datasets: [{
            label: 'Điểm',
            data: [75, 85, 90],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
