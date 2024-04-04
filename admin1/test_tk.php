<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <!-- Link đến thư viện Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSS tùy chỉnh -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .chart-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Biểu đồ doanh thu</h2>
    <div>
        <label for="startDate">Ngày bắt đầu:</label>
        <input type="date" id="startDate" name="startDate">
        <label for="endDate">Ngày kết thúc:</label>
        <input type="date" id="endDate" name="endDate">
        <button id="searchButton">Tìm kiếm</button>
    </div>
    <canvas id="revenueChart" width="800" height="400"></canvas>
</div>

<script>
 document.addEventListener("DOMContentLoaded", function() {
    var revenueChart; // Biến để lưu trữ biểu đồ

    // Hàm tìm kiếm
    function search() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;

        // Gửi yêu cầu tìm kiếm dữ liệu
        fetch(`get_revenue_data.php?startDate=${startDate}&endDate=${endDate}`)
            .then(response => response.json())
            .then(data => {
                // Hiển thị biểu đồ với dữ liệu mới
                drawChart(data);
            })
            .catch(error => console.error('Lỗi khi tải dữ liệu:', error));
    }

    // Hàm vẽ biểu đồ
    function drawChart(data) {
        // Kiểm tra nếu đã có biểu đồ, hủy bỏ nó trước khi tạo biểu đồ mới
        if (revenueChart) {
            revenueChart.destroy();
        }

        var ctx = document.getElementById('revenueChart').getContext('2d');
        revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Đã thanh toán',
                    data: Object.values(data).map(item => item.paid),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Chưa thanh toán',
                    data: Object.values(data).map(item => item.unpaid),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    // Gán sự kiện onchange cho cả hai ô input ngày để khi người dùng thay đổi ngày, hàm search sẽ được gọi tự động.
    document.getElementById('startDate').onchange = search;
    document.getElementById('endDate').onchange = search;

    // Khi trang được tải lần đầu, thực hiện tìm kiếm lần đầu.
    search();
});
</script>
</body>
</html>
