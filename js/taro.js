$(document).ready(function () {
	var selectedCards = [];
	var currentThemeLevel = null;

//1) welcome
	typingEffect($('#taroWelcome'), function() {
		$('#taroInputName').show(300);
	});

//2) after input name
	var userName = $("#taroNameSubmit").bind("click", function (e) {
		userName = $("[name=taroUserName]").val();
		if (validateName(userName)) {
			$.each($('.taroUserName'), function (key, value) {
				$(value).html(userName);
			});

			typingEffect($('#taroFortunetellerName'), function () {
				$('#taroWelcome').hide('slow');
				$('#taroInputName').hide('slow');
				typingEffect($('#taroWhatYouWant'), function () {
					$('#taroTheme').show('slow');
				});
			});

		} else {
			userName = null;
		}
		e.preventDefault();
		return userName;
	});

// 3) choose theme and cards
	//first question
	$('#taroThemeSubmit').live('click', function (e) {
		var theme = $('#taroTheme [name=taroTheme]:checked').val();
		var idTheme = 'taro_' + theme;
		console.log(idTheme);
		$('#' + idTheme).show('slow');
		$('#taroTheme').hide('slow');
		typingEffect($('#taroExactWish'));


		//second question
		$('#' + idTheme + '_submit').bind('click', function (e) {
			$('#' + idTheme).hide('slow');
			typingEffect($('#taroVeryExactWish'), function () {
				console.log(idTheme);
				var subTheme = $('#' + idTheme + ' [name=' + idTheme + ']:checked').val();
				console.log(subTheme);
				var idSubTheme = idTheme + '_' + subTheme;
				$('#' + idSubTheme).show('slow');


				//third question
				currentThemeLevel = idSubTheme;
				$('#' + idSubTheme + '_submit').bind('click', function (e) {
					$('#'+currentThemeLevel).hide('slow');
					typingEffect($('#taroUnderstanding'), function () {
						$('#taroFortunetellerName').hide(500);
						$('#taroWhatYouWant').hide(500);
						$('#taroExactWish').hide(500);
						$('#taroVeryExactWish').hide(500);
						$('#taroUnderstanding').hide(3000);
						$('#taroCards').show();
						typingEffect($('#taroSelectPlease'));
						$('#resultTaroBlockDisabled').show();
						printCards();
						chooseCards();
					});
					e.preventDefault();
				});
			});
			e.preventDefault();
		});
		e.preventDefault();
	});

	//after choose
	$('#afterCardsChoose').bind('click', function(e) {
		$('#taroSelectPlease').hide('slow');
		$('#afterCardsChoose').hide(2000);
		$('#firstChooseCard').html(getCardValue(selectedCards[0]));
		$('#secondChooseCard').html(getCardValue(selectedCards[1]));
		$('#thirdChooseCard').html(getCardValue(selectedCards[2]));
		printDateForm();
		typingEffect($('#taroUserChoice'), birthdayBlock);
		e.preventDefault();
	});

	//after input bithday
	$('#taroUserBirthday').bind('click', function(e) {

		$('#taroUserBirthdayBlock').hide(1000);

		var day = $("#taroUserDay option:selected").val();
		var month = $("#taroUserMonth option:selected").val();
		var year = $("#taroUserYear option:selected").val();
		var text = 'Дата моего рождения: ' + day + '/' + month + '/' + year;
		$('#taroUserDate').html(text);
		typingEffect($('#taroUserDate'));
		var userDate = new Date(year, month - 1, day);
		var userAge = new Date().getTime() - userDate.getTime();
		var age = Math.floor(userAge/(1000*60*60*24*365));
		if (age < 18) {
			showQuestionAndAnswers('isRightDate');
		} else {
			$('#resultTaroBlockDisabled').hide(500);
			showQuestionAndAnswers('getAnswer');
		}
		e.preventDefault();
	});

	//age confirmation
	$('#isRightDateSubmit').bind('click', function(e) {
			if ($('input[name=isRightDate]:checked').val() == 'true') {
				typingEffect($('#isRightDateYes'));
			} else {
				birthdayBlock();
			}
		$('#isRightDate').hide(300);
		$('#isRightDateTest').hide(300);
		$('#taroUserDate').hide();
		e.preventDefault();
	});

	//consent to the mailing
	$('#getAnswerSubmit').bind('click', function() {
		$('#isRightDate').hide(300);
		if ($('input[name=getAnswer]:checked').val() == 'true') {
			$('#getAnswerTest').hide(300);
			typingEffect($('#taroUserSayYes'));
			typingEffect($('#taroWhatUserEmail'), function() {
				$('#taroUserEmailForm').show();
			});
		} else {
		//TODO::are you sure?
		}
	});

	//check user email
	$('#taroUserEmailSumbit').bind('click', function() {
		var email = $('input[name=taroUserEmail]').val();
		if (validateEmail(email)) {
			showQuestionAndAnswers('taroUserSex');
		}
	});

	$('#taroUserSexSubmit').bind('click', function() {
		$('#taroUserSexSay')
			.html('Я - ' + $('input[name=taroUserSex]:checked').text());
		typingEffect($('#taroThanks'), function() {
			typingEffect($('#taroCheckEmail'), function() {
				showQuestionAndAnswers('taroAskPhone');
			});
		});
		$('input[name=taroAskPhoneTest]').mask("999-999-99-99");
	});


	/**
	 * saved selected cards to selectedCards variable
	 */
	function chooseCards() {
		$(".cardsTaroBlock").sortable({
			connectWith: ".cardsTaroBlock",
			stop: function() {
				$usedCards = $('#resultTaroBlock li');
				$usedCards.each(function() {
					var id = $( this ).attr('id');
					var cardNumber = id.replace("card_","");
					console.log(cardNumber);
					$('#resultTaroBlockDisabled').append($('#'+id));
					selectedCards.push(cardNumber);
					$('#'+id + ' img')
						.hide('highlight',  {color:'#343434'}, 500)
						.attr('src', './img/cards/' + cardNumber + '.png')
						.show('highlight',  {color:'#343434'}, 2000);
				});
				if ($('#resultTaroBlockDisabled li').size() == 3) {
					$(".cardsTaroBlock").sortable("disable");
					$('#taroContainer').hide("puff", 3000);
					$('#afterCardsChoose').show(3000);
				}
			}
		});
	}

});