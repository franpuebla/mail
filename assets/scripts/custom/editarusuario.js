var EditarUsuario = function () {

	var handleEdit = function () {

		function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }



        $('.edit-form').validate({
				lang: 'es',
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {

	                fullname: {
	                    required: true
	                },
	                email: {
	                    required: true
	                },
	                password: {
	                    required: false
	                },
	                rpassword: {
	                    equalTo: "#register_password"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                //form.submit();
					registrarUsuario();
	            }
	        });

			$('.edit-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.edit-form').validate().form()) {
	                    $('.edit-form').submit();
	                }
	                return false;
	            }
	        });

	}

    return {
        //main function to initiate the module
        init: function () {

            handleEdit();

        }

    };

}();