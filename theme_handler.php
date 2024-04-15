<?php
function setThemePreference($theme) {
    setcookie('theme_preference', $theme, time() + (86400 * 30), '/'); // Cookie set to expire in 30 days
}

function getThemePreference() {
    if(isset($_COOKIE['theme_preference'])) {
        return $_COOKIE['theme_preference'];
    } else {
        return 'light'; // Default theme
    }
}
?>