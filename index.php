<?php
mysqli_report(MYSQLI_REPORT_OFF);

// 1. Kiểm tra môi trường
if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1:8082')) {
    // Nếu chạy DOCKER LOCAL
    $host = 'db'; 
    $user = 'root';
    $pass = 'rootpassword';
    $db   = 'shop_db';
} else {
    // Nếu chạy ONLINE (Thông số lấy từ Clever Cloud ở Bước 1)
    $host = 'b3yl5pdhjcswozvgdaqq-mysql.services.clever-cloud.com'; 
    $user = 'uyzm4vveddconv5s';
    $pass = 'bz1CWtiaUG8L0VUVVBnM';
    $db   = 'b3yl5pdhjcswozvgdaqq';
}

$conn = @new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    $db_status = "Lỗi kết nối: " . $conn->connect_error;
    $products = [];
} else {
    $db_status = "Kết nối Database thành công!";
    $result = $conn->query("SELECT * FROM phones");
    $products = ($result && $result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Project 2 Docker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <h1>Bai Kiem Tra-DH52200547 </h1>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-900 text-white p-4 flex justify-between items-center shadow-xl">
        <div class="text-2xl font-black italic">TECHSTORE PHP</div>
        <span class="bg-yellow-400 text-black px-4 py-1 rounded-full font-bold text-sm">MSSV: Của Bạn</span>
    </nav>

    <div class="max-w-6xl mx-auto mt-4 px-4">
        <p class="text-sm <?php echo ($conn->connect_error) ? 'text-red-500' : 'text-green-600'; ?>">
            ● <?php echo $db_status; ?>
        </p>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-4 grid grid-cols-2 md:grid-cols-5 gap-6">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $item): ?>
                <div class="bg-white rounded-lg p-4 shadow hover:shadow-2xl transition border-b-4 border-blue-500">
                    <div class="text-5xl text-center mb-4"><?php echo $item['icon']; ?></div>
                    <h3 class="font-bold text-gray-800 h-12 overflow-hidden text-center"><?php echo $item['name']; ?></h3>
                    <p class="text-red-600 font-bold mt-2 text-lg text-center"><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</p>
                    <div class="mt-4 py-2 bg-blue-600 text-white text-center rounded text-sm hover:bg-blue-700 cursor-pointer italic">Mua ngay</div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full bg-white p-10 rounded-lg shadow text-center">
                <p class="text-gray-500 italic">Chưa có dữ liệu. Vui lòng chạy Docker Compose để xem sản phẩm mẫu.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>