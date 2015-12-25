<?php

namespace templates;

use Views\AbstractView;

class Register extends AbstractView
{

    protected function outputHTML()
    {

        ?>

        <div class="container">
            <h1 align="center">Join TwitterApp today</h1>
            <hr/>

            <form class="form-horizontal" id="register-form" role="form" method="post" action="">

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label for="first-name">Name:</label>
                        <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter first name">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter last name">
                    </div>
                </div>

<!--                <div class="form-group">-->
<!--                    <div class="col-md-4 col-md-offset-4">-->
<!--                        <label for="date-of-birth">Date of birth:</label>-->
<!--                        <input type="date" class="form-control" id="date-of-birth" value="--><?php //echo date('Y-m-d'); ?><!--">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label for="first-name">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm password">
                        <div style="color: red" id="passwordCheck"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label for="security">Please enter number between 1113 and 1207.</label>
                        <input type="text" class="form-control" name="security" id="security" placeholder="Enter numbers">
                        <div style="color: red" id="registerError"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" class="btn btn-info btn-block" name="register" id="register" value="Sign up">
                        <div style="color: red" id="failedRegister"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <p>By signing up, you agree to the Terms of Service and Privacy Policy, including Cookie Use. Others will be able to find you by email or phone number when provided.</p>
                    </div>
                </div>

            </form>
        </div>

        <?php

    }

}