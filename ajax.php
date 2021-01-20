<?php

function _pa($a) {
    echo "<pre>";
    print_R($a);
    echo "</pre>";
}

if (!empty($_FILES) && isset($_POST['action']) && $_POST['action'] == 'upload_image') {
    $uploaded_files = array();
    $errors_count = 0;
    $errors = array();
    foreach ($_FILES as $key => $value) {
        $filename = $value["name"];
        $extension = explode(".", $value["name"]);
        $newfilename = date("Y-m-d-H-i-s") . "-image-" . $key . "." . end($extension);

        if (move_uploaded_file($value["tmp_name"], "uploads/" . $newfilename)) {
            $HTTP_REFERER = $_SERVER['HTTP_REFERER'];
            $BASE_URL = explode('admin/', $HTTP_REFERER)[0];
            $uploaded_files[] = $BASE_URL . "bl-themes/amzingMarketingPro/uploads/" . $newfilename;
        } else {
            $errors_count++;
        }
    }

    echo json_encode(array('uploaded_files' => $uploaded_files, 'errors' => $errors_count));
}

if (isset($_POST['action']) && $_POST['action'] == 'save_content') {
    $formdata = $_POST;
    $myFile = "json/home-content.json";
    $arr_data = array();

    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    foreach ($_POST as $key => $value) {
        $arr_data[$key] = $value;
    }

    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    if (file_put_contents($myFile, $jsondata)) {
        echo json_encode(array('msg' => 'success'));
    } else {
        echo json_encode(array('msg' => 'error'));
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'save_menu') {
    $formdata = $_POST;
    $myFile = "json/menu-content.json";
    $arr_data = array();

    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    foreach ($_POST as $key => $value) {
        $arr_data[$key] = $value;
    }

    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    if (file_put_contents($myFile, $jsondata)) {
        echo json_encode(array('msg' => 'success'));
    } else {
        echo json_encode(array('msg' => 'error'));
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'save_extra_menu') {
    $formdata = $_POST;
    $myFile = "json/extra_menus.json";
    $arr_data = array();

    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    foreach ($_POST as $key => $value) {
        $arr_data[$key] = $value;
    }

    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    if (file_put_contents($myFile, $jsondata)) {
        echo json_encode(array('msg' => 'success'));
    } else {
        echo json_encode(array('msg' => 'error'));
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'save_color_settings') {
    $formdata = $_POST;
    $myFile = "json/color_settings.json";
    $arr_data = array();

    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    foreach ($_POST as $key => $value) {
        $arr_data[$key] = $value;
    }

    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    if (file_put_contents($myFile, $jsondata)) {
        echo json_encode(array('msg' => 'success'));
    } else {
        echo json_encode(array('msg' => 'error'));
    }
}