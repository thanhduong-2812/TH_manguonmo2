<?php
// 1. Cấu hình kết nối Database dựa trên docker-compose.yml
$host = 'db'; // Tên service database trong docker-compose [cite: 26]
$user = 'root';
$pass = 'rootpassword';
$db   = 'shop_db';

// Tạo kết nối tới MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    $db_status = "Kết nối thất bại: " . $conn->connect_error;
    $products = [];
} else {
    $db_status = "Kết nối Database thành công!";
    // 2. Lấy dữ liệu từ bảng phones đã tạo trong data.sql
    $sql = "SELECT * FROM phones";
    $result = $conn->query($sql);
    $products = ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore PHP - Project 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-900 text-white p-4 flex justify-between items-center shadow-xl">
        <div class="text-2xl font-black italic">TECHSTORE PHP</div>
        <div class="flex items-center gap-4">
            <span class="bg-yellow-400 text-black px-4 py-1 rounded-full font-bold text-sm">Chiều Thứ Hai - ca 3</span>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto mt-4 px-4">
        <p class="text-sm <?php echo ($conn->connect_error) ? 'text-red-500' : 'text-green-600'; ?>">
            ● <?php echo $db_status; ?>
        </p>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-4 grid grid-cols-2 md:grid-cols-5 gap-6">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $item): ?>
                <div class="bg-white rounded-lg p-4 shadow hover:shadow-2xl transition">
                    <div class="text-5xl text-center mb-4"><?php echo $item['icon']; ?></div>
                    <h3 class="font-bold text-gray-800 h-12 overflow-hidden"><?php echo $item['name']; ?></h3>
                    <p class="text-red-600 font-bold mt-2 text-lg"><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</p>
                    <div class="mt-4 py-2 bg-blue-600 text-white text-center rounded text-sm hover:bg-blue-700 cursor-pointer">Mua ngay</div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="col-span-full text-center text-gray-500 italic">Chưa có sản phẩm nào trong Database.</p>
        <?php endif; ?>
    </div>
</body>
</html>