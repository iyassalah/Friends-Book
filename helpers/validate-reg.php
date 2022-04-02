<?php
function validateReg(array $data): bool
{
    $fields = [
        "firstname",
        "lastname",
        "username",
        "email",
        "password",
        "flexRadioDefault",
        "tele-number",
        "address",
    ];
    foreach ($fields as $field) {
        if (!isset($data[$field])) {
            return false;
        }
    }
    return true;
}
