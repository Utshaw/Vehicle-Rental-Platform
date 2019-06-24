$(document).ready(function() {

    makeAjaxRequest();
    setInterval(makeAjaxRequest, 2500);

});

function makeAjaxRequest() {
    $.get("../controller/get_promotion_service.php", getPromotionCallBack);
}

function getPromotionCallBack(results) {

    $("table#promotion_result tbody").empty();


    if(results.length > 0 ){
        var result = results[0];

        var newrow = $("<b></b>");

        newrow.append("New promotional offer running. Get " + result.DISCOUNT_AMOUNT + " % discount on our every bus | Expiry date: " +  result.EXPIRY_DATE);

        $("div#home_promo_div").show();
        $("div#home_promo_div span#home_message").html(newrow);

    }else{
        $("div#home_promo_div").hide();
    }

}
