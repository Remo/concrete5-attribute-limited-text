$(document).ready(function() {
    $(".attribute-limited-text").on("change", function () {
        alert(2);
    });
    $(".attribute-limited-text").on("keyup", function () {
        alert(3);
    });

});
alert($(".attribute-limited-text").length);

$(".attribute-limited-text").on("keyup", function () {
    alert(3);
});