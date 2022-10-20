$toEmail = implode(',', $recipientArr);
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        $response = mail($toEmail, $subject, $content, $mailHeaders);
        if ($response) {
            echo "<div class='success'><h1>Thank you for shopping with us.</h1>
                       Your order has been placed and the order reference id is <b>" . $orderId . ".</b><br/>
                       We will contact you shortly.</div>";
        } else {
            echo "<div class='Error'>Problem in Sending Mail.</div>";
        }

        return $response;
    }

    function sendAdminEmail($orderItemResult, $orderResult)
    {
        $name = $orderItemResult[0]["name"];
        $email = $orderResult[0]["email"];
        $currency = $orderResult[0]["currency"];
        $orderId = $orderItemResult[0]["order_id"];
        $price = $orderItemResult[0]["item_price"];
        $subject = "New order placed";
        $content = "New order is placed and the order reference id is $orderId.\n\nProduct Name: $name.\nPrice: $currency $price";

        $toEmail = Config::ADMIN_EMAIL;
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        $response = mail($toEmail, $subject, $content, $mailHeaders);
        return $response;
    }
}