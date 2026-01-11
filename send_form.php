<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // البريد الإلكتروني للمالك
    $to = "owner@example.com";  // ضع هنا عنوان بريدك الإلكتروني
    $subject = "رسالة تواصل جديدة من العميل: $name";
    $body = "
    الاسم: $name
    رقم التليفون: $phone
    البريد الإلكتروني: $email

    الرسالة:
    $message
    ";

    // إرسال البريد الإلكتروني
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // بعد إرسال البيانات، العميل يرى رسالة تأكيد
        header('Location: thank_you.html');
        exit();
    } else {
        // في حالة وجود مشكلة أثناء إرسال الرسالة
        echo "حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.";
    }
}
?>
