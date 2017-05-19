<?php
//echo $_POST['name'].$_POST['phone'];

	$temail =  $_POST['temail'];
	$name = $_POST['name'];			
	$phone = $_POST['phone'];

	if($temail)
	{
		$to = "timotheus@list.ru";

		$subject = "Новый подписчик с лендинга sauko.by";
		$txt = "Вот его почта: ". $temail;
		$headers = "From: robot@sauko.by";

		mail($to,$subject,$txt,$headers);

		echo 'Спасибо за доверие! Ждите писем!';
	}
		elseif($name and $phone)
			{
				$to = "timotheus@list.ru";

				$subject = "Перезвонить заказчику | sauko.by";
				$txt = "Имярек: ". $name.'<br>';
				$txt .= "Телефон: ". $phone;
				$headers = "From: robot@sauko.by";

				mail($to,$subject,$txt,$headers);

				echo 'Ура! Мы получили уведомление и скоро вам перезвоним!';
			} else
			{
				echo 'Что-то пошло не так.. попробуйте позже?';
			}
