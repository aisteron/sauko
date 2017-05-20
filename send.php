<?php<?php

		if($_POST['temail'])
		{	
		$to = 'timotheus@list.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Новый подписчик с лендинга sauko.by'; //Заголовок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
					<h3>Вот его почта</h3>
                        <p><b>Почта: </b>'.$_POST['temail'].'</p>
						<p><small>Не забудь включить его в список для рассылки ^_^</small></p>
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: robot <robot@sauko.by>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
		echo 'Спасибо за доверие! Ждите писем!';
		}
		elseif($_POST['name'] and $_POST['phone'])
		{
		$to = 'timotheus@list.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Перезвонить заказчику | sauko.by'; //Заголовок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
					<h3>Форма обратной связи на сайте sauko.by:</h3>
                        <p><b>Имя: </b>'.$_POST['name'].'</p>
						<p><b>Телефон: </b>'.$_POST['phone'].'</p>                      
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: robot <robot@sauko.by>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
		echo 'Ура! Мы получили уведомление и скоро вам перезвоним!';

		}
		 else
			{
				echo 'Что-то пошло не так.. попробуйте позже?';
			}