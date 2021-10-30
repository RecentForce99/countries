<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/public/views/layouts/header.html';
?>
<br>
<link rel="stylesheet" href="/public/styles/countries.css">
<main>

        <div class="notif-block">
            <span class="close-message ">&times;</span>
                <div class="message-block">

                </div>
        </div>

        <div class="block">
            <input class="form-control" type="text" id="country" name="country" placeholder="Введите название страны">
            <input class="btn btn-primary button-submit" type="submit">
            <div class="country-list">
                <p  class="btn btn-warning" id="country-btn">Показать список стран</p>
            </div>
        </div>

        <div id="country-window" class="country-window">
            <div class="model-content" id="model-content">

            </div>
        </div>

</main>
<script src="../public/scripts/countries.js"></script>
