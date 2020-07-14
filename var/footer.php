<script>
$(function() {
    /* скрипты для скрытия/отображения форм входа/регистрации и смены пароля/ФИО */
    $("form[name=reg]").hide();
    $("button.logging").click(function() {
        if ( !$(this).hasClass("active") ) {
            $("button.logging.active").removeClass("active");
            $(this).addClass("active");
            $("form").slideToggle();
        }
    });
    $("form[name=changePas]").hide();
    $("form[name=changeFIO]").hide();
    $("button.change").click(function() {
        if ( $(this).hasClass("pas") ) $("form[name=changePas]").slideToggle();
        else $("form[name=changeFIO]").slideToggle();
    });
    <?php
    if ( isset($msgReg)) {
    ?>
    $("button.logging.reg").click();
    <?php
    }
    ?>
});
</script>
</body>
</html>