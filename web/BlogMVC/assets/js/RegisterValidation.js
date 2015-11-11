window.onload = function () {

    var form = document.getElementById('registerform');

    form.onsubmit = function () {

        var values = [
            form.username.value,
            form.password.value,
            form.email.value
        ];
        var samples = [
            /[a-zA-z0-9]{4,}/,
            /[a-zA-z0-9]{4,}/,
            /[^.]+@[^.]+/
        ];
        var messages = [
            'Username must have at least 4 characters and contain only letters and numbers!',
            'Password must have at least 4 characters and contain only letters and numbers!',
            'Provided e-mail address is not valid.'
        ];

        flag = true;

        for(var v in values) {
            if(!samples[v].test(values[v])) {
                flag = false;
                alert(messages[v]);

            }
        }

        return flag;

    };

};