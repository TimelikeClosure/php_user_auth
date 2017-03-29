<?php

/**
 * @param string[] $fields - an array of required fields
 * @return array - an array of errors
 */
function emptyFieldErrors($errors, $fields){
    for ($i = 0, $fieldCount = count($fields); $i < $fieldCount; $i++){
        if (empty($_POST[$fields[$i]]) && empty($errors[$fields[$i]])){
            $errors[$fields[$i]] = [
                "code" => 0,
                "message" => "{$fields[$i]} is a required field"
            ];
        }
    }
    return $errors;
}

/**
 * @param (string|int)[] $fields - a map of fields to their minimum length
 * @return array - an array of errors
 */
function shortFieldErrors($errors, $fields){
    foreach($fields as $field=>$minLength){
        if ((strlen($_POST[$field]) < $minLength) && empty($errors[$field])){
            $errors[$field] = [
                "code" => 1,
                "message" => "$field field is too short, it must be at least $minLength characters long"
            ];
        }
    }
    return $errors;
}

/**
 * @return array - an array of errors
 */
function validFieldErrors($errors){
    $field = 'email';
    if (empty(filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) && empty($errors[$field])){
        $errors[$field] = [
            "code" => 2,
            "message" => "email field is not a valid email address"
        ];
    }
    return $errors;
}

function displayErrors($errors){
    $result = '<ul style="padding: 20px; border: 1px solid gray; color: red;">';
    foreach($errors as $field => $error){
        $result .= "<li>({$error['code']}) : {$error['message']}</li>";
    }
    $result .= '</ul>';
    return $result;
}

?>