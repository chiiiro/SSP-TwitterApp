document.addEventListener("DOMContentLoaded", function () {

    // JavaScript form validation

    var checkString = function (str) {
        var re = /^\w+.{3,}$/;
        return re.test(str);
    };

    var checkForm = function (e) {
        if (!checkString(this.galleryTitle.value)) {
            document.getElementById("titleError").innerHTML =
                "The title must contain at least 4 characters, which are only letters and numbers!";
            this.galleryTitle.focus();
            e.preventDefault();
            return;
        }

        if (!checkString(this.galleryTag.value)) {
            document.getElementById("tagError").innerHTML =
                "The title must contain at least 4 characters, which are only letters and numbers!";
            this.galleryTag.focus();
            e.preventDefault();
            return;
        }

        if (parseInt(this.security.value) < 1113 || parseInt(this.security.value) > 1207) {
            document.getElementById("securityError").innerHTML =
                "Please re-enter security number.";
            this.security.focus();
            e.preventDefault();
            return;
        }
    };

    var myForm = document.getElementById("create-gallery-form");
    myForm.addEventListener("submit", checkForm, true);

}, false);