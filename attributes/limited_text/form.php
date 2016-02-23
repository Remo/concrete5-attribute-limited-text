<?php

$dataText = t('%d characters left', 999);
$text = t('%d characters left', $maxLength);
$id = mt_rand(1, 10000000);

echo Core::make('helper/form')->text($this->field('value'), $value, ['class' => 'attribute-limited-text', 'data-id' => $id, 'maxlength' => $maxLength]);
?>
<div <?=$showCounter == 1 ? 'class:"hidden"' : ''?> data-text="<?= $dataText ?>" id="attribute-limited-text-counter-<?= $id ?>">
    <?= $text ?>
</div>
<script type="text/javascript">
    $(".attribute-limited-text[data-id=<?=$id?>]").on("keyup", function () {
        var textCounter = $("#attribute-limited-text-counter-<?=$id?>").data("text");
        textCounter = textCounter.replace('999', $(this).attr("maxlength") - $(this).val().length);
        $("#attribute-limited-text-counter-<?=$id?>").text(textCounter);
    });
</script>