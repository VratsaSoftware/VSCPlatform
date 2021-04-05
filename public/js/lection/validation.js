$(document).ready(function() {
    /* Create lection Change input css messages */
    changeValidation('.create-lection-title');
    changeValidation('.create-lection-first_date');
    changeValidation('.create-lection-second_date');
    changeValidation('.create-lection-description');

    /* Create lection Click input css messages */
    clickValidation('.create-lection-title');
    clickValidation('.create-lection-first_date');
    clickValidation('.create-lection-second_date');
    clickValidation('.create-lection-description');

    /* Edit lection Change input css messages */
    changeValidation('.edit-lection-title');
    changeValidation('.edit-lection-first_date');
    changeValidation('.edit-lection-second_date');
    changeValidation('.edit-lection-description');

    /* Edit lection Click input css messages */
    clickValidation('.edit-lection-title');
    clickValidation('.edit-lection-first_date');
    clickValidation('.edit-lection-second_date');
    clickValidation('.edit-lection-description');

    // --- functions --- //
    /* Change input css messages - function */
    function changeValidation(inputName) {
        $(inputName).change(function() {
            if ($(this).val() !== '') {
                correctCss(this);
            } else {
                errorCss(this);
            }
        });
    }

    /* Click input css messages - function */
    function clickValidation(inputName) {
        $('.submit-form').click(function() {
            if ($(inputName).val() !== '') {
                correctCss(inputName);
            } else {
                errorCss(inputName);
            }
        });
    }

    /**
	 * Correct css function
	 *
	 * @param inputId
	 */
    function correctCss(inputId) {
        $(inputId).css("border-color", "");
        $(inputId).css("box-shadow", "");
    }

    /**
	 * Error css function
	 *
	 * @param inputId
	 */
    function errorCss(inputId) {
        $(inputId).css("border-color", "#ff4d4d");
        $(inputId).css("box-shadow", "0 0 8px 0 #ff4d4d");
    }
});
