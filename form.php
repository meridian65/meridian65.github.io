<?php
if(isset($_POST["submit"])){
    // проверяем чтобы поля не были пустыми..
    if($_POST["vname"] == "" || $_POST["vemail"] == "" || $_POST["sub"] == "" || $_POST["msg"] == ""){
        echo "Ошибка: Заполните все поля..";
    }else{
        // Проверяем e-mail отправителя на соответствие формату
        $email = $_POST['vemail'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email){
            echo "Ошибка: Не верный формат Email адреса";
        }
        else{
            $subject = $_POST['sub'];
            $message = $_POST['msg'];
            $headers = 'From:'. $email2 . "\r\n"; // Адрес отправителя
            $headers .= 'Cc:'. $email2 . "\r\n"; // копия 
             
            // Если длина строки больше 70 символов делаем перенос
            $message = wordwrap($message, 70);
             
            // Отправляем почту php mail() функцией
            if(mail("meridian.65@yandex.ru", $subject, $message, $headers))
                echo "Ваше письмо отправлено! Спасибо за ваш отзыв!";
            else   
                echo "Ошибка при отправке письма!";
        }
    }
}
?>