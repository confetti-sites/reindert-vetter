<?php

require_once '/var/resources/confetti-cms__parser/Confetti/Helpers/utils.php';

// This file does nog always exists
if (file_exists('/var/resources/confetti-cms__structure/model.php')) {
    require_once '/var/resources/confetti-cms__structure/model.php';
}