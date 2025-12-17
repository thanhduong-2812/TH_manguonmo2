<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Mobile Shop PHP - Project 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold italic">TECH MOBILE PHP</h1>
        <span class="bg-yellow-400 text-black px-4 py-1 font-bold">Chiều Thứ Hai - ca 3</span>
    </nav>

    <div class="max-w-6xl mx-auto py-10 px-4 grid grid-cols-1 md:grid-cols-5 gap-4">
        <?php
        $phones = [
            ['n' => 'iPhone 15 Pro', 'p' => '28.990.000', 'i' => '📱'],
            ['n' => 'Samsung S24 Ultra', 'p' => '26.500.000', 'i' => '📲'],
            ['n' => 'Oppo Find X7', 'p' => '18.200.000', 'i' => '🤳'],
            ['n' => 'Xiaomi 14 Pro', 'p' => '16.900.000', 'i' => '🦾'],
            ['n' => 'Google Pixel 8', 'p' => '15.500.000', 'i' => '📸']
        ];
        foreach ($phones as $p) {
            echo "<div class='bg-white p-4 rounded-lg shadow hover:shadow-lg transition'>
                    <div class='text-4xl text-center mb-2'>{$p['i']}</div>
                    <h3 class='font-bold text-sm h-10'>{$p['n']}</h3>
                    <p class='text-red-600 font-bold mt-2'>{$p['p']}đ</p>
                    <button class='w-full mt-3 bg-blue-600 text-white py-1 rounded text-sm'>Trả góp 0%</button>
                  </div>";
        }
        ?>
    </div>
</body>
</html>