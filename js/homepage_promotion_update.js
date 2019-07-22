$(document).ready(function () {

    

    makeAjaxRequest();
    setInterval(makeAjaxRequest, 2500);

});

var imageShowed = 0;

function makeAjaxRequest() {
    $.get("../controller/get_promotion_service.php", getPromotionCallBack);
}

function getPromotionCallBack(results) {

    $("table#promotion_result tbody").empty();


    if (results.length > 0) {
        var result = results[0];

        var newrow = $("<b></b>");

        newrow.append("New promotional offer running. Get " + result.DISCOUNT_AMOUNT + " % discount on " + result.MODEL_NAME + " | Expiry date: " + result.EXPIRY_DATE);

        if (localStorage["imageShowed"] == null) {
            localStorage["imageShowed"] = 100;

            $("#promo_header").html("Discount on " + result.MODEL_NAME);
            $("#promo_body").html("GET " + result.DISCOUNT_AMOUNT + "% discount");
            $("#promo_car").attr("src", ("../images/" + result.MODEL_NAME + ".jpg").toLowerCase());

            $("#myModal").modal();

        }

        $("div#home_promo_div").show();
        $("div#home_promo_div span#home_message").html(newrow);

    } else {
        $("div#home_promo_div").hide();
    }

}
