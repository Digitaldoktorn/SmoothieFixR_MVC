<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success);
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    // Check that a name is passed in 
    // We are storimg the session 0$name as the KEY
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            // And we are storing the $message as the VALUE
            $_SESSION[$name] = $message;

            // setting the class inside of the session variable
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            // display it here, the div with the class
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            // unsetting it
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
