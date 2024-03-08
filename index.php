<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kayıt Sıralama</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            li {
                margin: 5px;
                padding: 10px;
                background-color: #f0f0f0;
                cursor: grab;
            }
        </style>
    </head>
    <body>

        <ul id="sortable">
            <li data-id="soru1">1. Kayıt</li>
            <li data-id="soru2">2. Kayıt</li>
            <li data-id="soru3">3. Kayıt</li>
            <li data-id="soru4">4. Kayıt</li>
            <!-- İstediğiniz kadar kayıt ekleyebilirsiniz -->
        </ul>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#sortable").sortable({
                    update: function(event, ui) {
                        var order = $(this).sortable('toArray', { attribute: 'data-id' });

                        // AJAX ile sıralama bilgisini PHP'ye gönderme
                        $.ajax({
                            url: 'siralama/update_order.php',
                            type: 'POST',
                            data: { order: order },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });
                $("#sortable").disableSelection();
            });
        </script>
    </body>
</html>
