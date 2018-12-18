$(document).ready(function(){
		//3 dots showing options
		$('.edit-right-menu').on('click', function(){
			var oldText = $(this).parent().parent().find('.stats-text').html();
			if(!$(this).next('.edit-items-wrap').hasClass('box-opened')){
				$(this).next('.edit-items-wrap').css('display','flex');
				$(this).next('.edit-items-wrap').addClass('box-opened')
				$(this).css('color','#f00');
				$(this).find('i').removeClass('fas fa-ellipsis-v');
				$(this).find('i').addClass('fas fa-times');
			}else{
				$(this).find('i').removeClass('fas fa-times');
				$(this).find('i').addClass('fas fa-ellipsis-v');
				$(this).next('.edit-items-wrap').removeClass('box-opened');
				$(this).next('.edit-items-wrap').css('display','none');
				$(this).css('color','#000');
				$(this).parent().parent().find('.edu-boxes').remove();
				$(this).parent().parent().find('.add-text').parent().remove();
				$(this).parent().parent().find('.save-edit-box').parent().remove();
				$(this).next('.edit-items-wrap').find('.edit-items').find('.pencil').find('a').removeClass('edit-opened');
			}
		});

		//adding inputs
		$('.edit-btn').on('click',function(e){
			// $(this).addClass('save-edit');
			var oldText = $(this).prev('span').text();
			if($(this).parent().find('img').hasClass('profile-pic') && !$(this).parent().find('img').hasClass('edit-img')){
				$(this).parent().find('img').addClass('edit-img');
				$(this).parent().find('img').after('<p class="input-img"><input type="file" id="picture" name="picture" onChange="imagePreview(this);"></p>');
				$(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
				$(this).removeClass('edit-btn');
				e.preventDefault();
				// $(this).removeClass('save-edit');
			}
			$('.loader-wrapper').css('display','flex').fadeOut('slow');
			if($(this).hasClass('edit-btn')){
					e.preventDefault();
					$(this).removeClass('edit-btn');
					if($(this).prev('span').hasClass('location')){
						$(this).prev('span').html('<br><input type="text" class="edit-user-items" id="location" name="location" value="'+oldText+'"></br>');
					}
					if($(this).prev('span').hasClass('birthday')){
						$(this).prev('span').html('<br><input type="date" class="edit-user-items" id="dob" name="dob" value="'+oldText+'"></br>');
					}
					if($(this).prev('span').hasClass('mail-txt')){
						$(this).prev('span').html('<br><input type="text" class="edit-user-items" id="email" name="email" value="'+oldText+'"></br>');
					}
					if($(this).prev('span').hasClass('name')){
						$(this).prev('span').html('<br><input type="text" class="edit-user-items" id="name" name="name" value="'+oldText+'"></br>');
					}
				$(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
			}
		});

		//social networks adding fields
		$('.social-edit').on('click', function(e){
			if(!$(this).hasClass('editing')){
				e.preventDefault();
				$(this).addClass('editing');
				$('.edit-social').show();
				$(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
				$('.loader-wrapper').css('display','flex').fadeOut();
			}
		});

		//adding textareas to the boxes with options
		$('.edit-bio').on('click', function(e){
			e.preventDefault();
			var oldText = $(this).parent().parent().find('.bio-text').text();
			if(!$(this).hasClass('editing')){
					$(this).addClass('editing');
					$(this).parent().parent().find('.bio-text').html('<p class="edit-box"><textarea rows="20" cols="30">'+$(this).parent().parent().find('.bio-text').html()+'</textarea></p>');
					$(this).find('i').removeClass('fa-pencil-alt').addClass('fa-save');
			}else{
				$(this).find('i').removeClass('fa-save').addClass('fa-pencil-alt');
				$(this).parent().parent().find('.bio-text').html(oldText);
				$('.loader-wrapper').css('display','flex').fadeOut();
			}
		});

		$('.education-edit').on('click', function(e){
			e.preventDefault();
			if(!$(this).hasClass('edit-opened')){
				$(this).addClass('edit-opened');
				$('.live-edu').fadeOut();
				$('.edit-edu').fadeIn();
			}else{
				$(this).removeClass('edit-opened');
			}
		});

		$('.create-btn').on('click', function(e){
			e.preventDefault();
			$('.edu-no-info').fadeOut();
			$(this).fadeOut();
			$('.create-form').fadeIn();
		});

		var eduFormscloned = 0;
		$('.edu-add-new').on('click', function(e){
			e.preventDefault();
			$('.edu-no-info').fadeOut();
			if($('.create-form').is(":visible")){
				$('.create-form').last().after($('.create-form').last().clone(true));
				$('.create-form').last().find('.suggestion-ins-name').html('');
				$('.create-form').last().find('#institution_name').val('');
			}
			$('.create-form').fadeIn();
			eduFormscloned++;
			if(eduFormscloned > 5){
				$('.edu-add-new').fadeOut();
			}
		});

        //work section
        $('.work-edit').on('click', function(e){
            e.preventDefault();
            $('.live-work').fadeOut();
            $('.edit-work').fadeIn();
        });

        $('.create-btn-work').on('click', function(e){
            e.preventDefault();
            $('.work-no-info').fadeOut();
            $(this).fadeOut();
            $('.create-form-work').fadeIn();
        });


        var workFormsCloned = 0;
		$('.work-add-new').on('click', function(e){
			e.preventDefault();
			$('.work-no-info').fadeOut();
			if($('.create-form-work').is(":visible")){
				$('.create-form-work').last().after($('.create-form-work').last().clone(true));
				$('.create-form-work').last().find('.suggestion-ins-name').html('');
				$('.create-form-work').last().find('#institution_name').val('');
			}
			$('.create-form-work').fadeIn();
			workFormsCloned++;
			if(workFormsCloned > 5){
				$('.work-add-new').fadeOut();
			}
		});
	})
