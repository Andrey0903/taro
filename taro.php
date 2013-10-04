<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<link type="text/css" rel="stylesheet" media="all" href="./css/taro.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/taro.js"></script>
	<script type="text/javascript" src="./js/taro_functions.js"></script>
	<script type="text/javascript" src="./js/plugins/jquery.maskedinput.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>

<div id="containerTaro">

<div id="taroTellet">

	<img src="./img/tellers/102.jpg" style="width: 100%; margin: 0 auto;"/>

	<p id="taroTellerName">Магистр Йода</p>

	<p class="specialization">Мастер-джедай</p>
	<span class="mainTellerInfo">Специализация:</span>
	<span class="tellerInfo">Гадания ТАРО</span>
	<span class="mainTellerInfo">Тематика консультаций:</span>
			<span class="tellerInfo">является одним из самых старых членов
				Совета джедаев и, скорее всего, самым мудрым и сильным джедаем своего времени.</span>

</div>

<div id="taroContent">
	<h1 id="taroTitle">БЕСПЛАТНОЕ ПРЕДСКАЗАНИЕ НА ТАРО</h1>

	<div id="taroDialog">
		<div class="taroPhrases" id="taroWelcome"><span class="taroTellerName"></span>: Здравствуйте, меня зовут <span
				class="taroTellerName"></span>. Это бесплатное предсказание по картам
			Таро. Но перед тем, как начать, не могли бы Вы назвать мне Ваше имя?
		</div>
		<div class="taroPhrases" id="taroInputName">
			<input type="text" name="taroUserName"/>
			<input type="submit" id="taroNameSubmit" value="Ok"/>
		</div>
		<div class="taroPhrases" id="taroFortunetellerName"><span class="taroUserPhrase">Вы&nbsp;</span>: Меня зовут <b
				class="taroUserName"></b></div>
		<div class="taroPhrases" id="taroWhatYouWant">Очень приятно, <b class="taroUserName"></b>. Сейчас я разложу
			перед Вами на экране
			карты
			Таро. Перед тем как выбрать 3 карты, сосредоточтесь и подумайте, пожалуйста, о чем-то очень важном для Вас
			или о том, чего бы Вам очень хотелось:
		</div>
		<div class="taroPhrases" id="taroTheme">
			<input type="radio" name="taroTheme" value="love">Любовь<br>
			<input type="radio" name="taroTheme" value="family">Семья<br>
			<input type="radio" name="taroTheme" value="chance">Удача<br>
			<input type="radio" name="taroTheme" value="couple">Вторая половина<br>
			<input type="radio" name="taroTheme" value="accommodation">Жилье<br>
			<input type="radio" name="taroTheme" value="diploma">Диплом<br>
			<input type="radio" name="taroTheme" value="children">Дети<br>
			<input type="radio" name="taroTheme" value="work">Работа<br>
			<input type="radio" name="taroTheme" value="me">Я и только я<br>
			<input type="radio" name="taroTheme" value="money">Деньги<br>
			<input type="submit" id="taroThemeSubmit" value="Ok"/>
		</div>
		<div class="taroPhrases" id="taroExactWish">
			Уточните, пожалуйста, Ваше желание, <b class="taroUserName"></b>?
		</div>
		<div class="taroPhrases" id="taroVeryExactWish">А если еще точнее?</div>
		<div class="taroPhrases" id="taroUnderstanding">Понимаю ...</div>

		<div class="taroPhrases" id="taroSelectPlease">А теперь, <b class="taroUserName"></b>, выберите, пожалуйста, 3
			карты из колоды Таро:
		</div>

		<div id="taroCards"></div>
		<div style="clear: both;"></div>

		<input type="submit" id="afterCardsChoose" value="Продолжить">

		<div class="taroPhrases" id="taroUserChoice">Вы вытянули следующие карты: <u id="firstChooseCard"></u>,
			<u id="secondChooseCard"></u> и <u id="thirdChooseCard"></u>.
		</div>
		<div id="taroUserBirthdayBlock">
			<div id="taroUserBirthdayQuestion">Не могли бы Вы назвать мне дату Вашего рождения, <b
					class="taroUserName"></b>?
			</div>
			<table class="taroUserBirthdayAnswer">
				<tr>
					<td>День</td>
					<td>Месяц</td>
					<td>Год</td>
				</tr>
				<tr>
					<td><select id="taroUserDay"></select></td>
					<td><select id="taroUserMonth"></select></td>
					<td><select id="taroUserYear"></select></td>
				</tr>
			</table>
			<input type="submit" value="Ok" id="taroUserBirthday">
		</div>
		<div class="taroPhrases" id="taroUserDate">Дата моего рождения:</div>
		<div id="isRightDate">Вы уверены, что указали правильную дату?</div>
		<div id="isRightDateTest">
			<input type="radio" name="isRightDate" value="true">Да, мне действительно еще не исполнилось 18 лет<br>
			<input type="radio" name="isRightDate" value="false">Нет, была допущена ошибка<br>
			<input type="submit" id="isRightDateSubmit" value="Ok"/>
		</div>
		<div id="isRightDateYes">Сожалею, <b class="taroUserName"></b>, но Вам должно быть не менее 18 лет, чтобы Вы
			смогли зарегистрироваться на моем сайте.
			К сожалению, на этом наше с Вами общение заканчивается.
		</div>
		<div id="getAnswer">Ваш случай меня заинтересовал, <b class="taroUserName"></b>.
			Согласитесь ли Вы БЕСПЛАТНО получить от меня подробное
			(примерно 6-7 страниц) индивидуальное предсказание по трем картам Таро,
			которые Вы вытянули? Я пришлю Вам его примерно в течение часа.
			Повторю, для Вас это будет СОВЕРШЕННО БЕСПЛАТНО.
		</div>
		<div id="getAnswerTest">
			<input type="radio" name="getAnswer" value="true">Да<br>
			<input type="radio" name="getAnswer" value="false">Нет<br>
			<input type="submit" id="getAnswerSubmit" value="Ok"/>
		</div>
		<div id="taroUserSayYes">
			Да, с удовольствием, {teller:name}.
		</div>
		<div id="taroUserSayNo">
			Нет, спасибо, {teller:name}, мне это не нужно.
		</div>
		<div id="taroWhatUserEmail">Какой у Вас адрес электронной почты?</div>
		<div id="taroUserEmailForm">
			<input type="text" name="taroUserEmail"/>
			<input type="submit" id="taroUserEmailSumbit" value="Ok"/>
		</div>
		<div class="taroPhrases" id="taroUserSex">
			Несмотря на то, что в большинстве случаев ответ на этот вопрос очевиден,
			для абсолютной точности предсказания мне необходимо Вам его задать: Вы - мужчина или женщина?
		</div>
		<div id="taroUserSexTest">
			<input type="radio" name="taroUserSex" value="female">Женщина<br>
			<input type="radio" name="taroUserSex" value="male">Мужчина<br>
			<input type="submit" id="taroUserSexSubmit" value="Ok"/>
		</div>
		<div class="taroPhrases" id="taroUserSexSay"></div>
		<div class="taroPhrases" id="taroThanks">
			Благодарю. Я прямо сейчас начну составление Вашего прогноза и как только закончу,
			сразу же отправлю его Вам. Это должно занять не более часа.
		</div>
		<div class="taroPhrases" id="taroCheckEmail">
			Проверяйте, пожалуйста Вашу электронную почту. Мое сообщение будет называться "В ответ на Вашу просьбу".
		</div>
		<div class="taroPhrases" id="taroAskPhone">
			Да, если хотите, Вы можете оставить Ваш номер телефона,
			мой ассистент сообщит Вам, когда Ваше предсказание будет готово,
			в случае необходимости ответит на Ваши вопросы и, если потребуется,
			расскажет Вам как со мной можно связаться.
		</div>
		<div class="taroPhrases" id="taroAskPhoneTest">
			<input type="text" name="taroAskPhoneTest">
			<input type="submit" id="taroAskPhoneSubmit" value="Ok"/>
		</div>
	</div>

</div>
</div>


</body>
</html>