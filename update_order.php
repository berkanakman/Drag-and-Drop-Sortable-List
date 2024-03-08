<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $order = $_POST['order'];

        // $order dizisindeki sıralama bilgisini kullanarak veritabanındaki kayıtları güncelle
        // Örnek: Bu noktada veritabanı bağlantısı kurulup güncelleme işlemi yapılabilir
        // Örneğin: UPDATE your_table SET order_column = ? WHERE id = ?
        print_r($order);
        // Başarı durumunda bir yanıt gönder
        echo json_encode(['status' => 'success']);
    } else {
        // POST request harici bir talep geldiyse hata mesajı gönder
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    }
?>
