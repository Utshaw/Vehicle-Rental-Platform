var shoppingCart = [];

var cartArray = [];


$(document).ready(function () {


    window.location.hash = "#searched_buses";


    outputCart();

    $("div#home_bus_div").hide();


    $.get("../controller/get_customer_session_id_service.php", function (results) {
        if (results === "-1") {


        } else {

            if (localStorage["sign_in_state"] == null) {


                localStorage["sign_in_state"] = "signedin";

                $.each(shoppingCart, function (index, value) {

                    cartArray = [];


                    cartArray.push({

                        id: value.id,
                        date: value.reqdate
                    });

                    cartArray.push(
                        {
                            customer_id: results
                        });

                    $.post("../controller/cart_post_service.php", {checkout_arr: cartArray}, function (data, status) {


                        if (status === "success") {

                            value.cart_id = data;

                        }


                    });


                });




            }
        }

    });


    $(".cartitem").click(function (e) {
        e.preventDefault();

        var iteminfo = $(this.dataset)[0];

        var currentItem = $(this);

        var itemincart = false;

        $.each(shoppingCart, function (index, value) {

            if (value.id == iteminfo.id) {
                itemincart = true;
            }
        });

        if (!itemincart) {


            $.get("../controller/get_customer_session_id_service.php", function (results) {

                if (results === "-1") {


                    shoppingCart.push(iteminfo);

                    localStorage["shopCart"] = JSON.stringify(shoppingCart);

                    outputCart();


                } else {

                    cartArray.push({

                        id: iteminfo.id,
                        date: iteminfo.reqdate
                    });

                    cartArray.push(
                        {
                            customer_id: results
                        });

                    $.post("../controller/cart_post_service.php", {checkout_arr: cartArray}, function (data, status) {

                        iteminfo.cart_id = data;

                        shoppingCart.push(iteminfo);

                        localStorage["shopCart"] = JSON.stringify(shoppingCart);

                        outputCart();


                    });

                }
            });


            currentItem.css("pointer-events", "none");
            currentItem.css("cursor", "default");
            currentItem.text("Added to cart");
            currentItem.attr('class', 'cartitem btn btn-success');
        }

        localStorage["shopCart"] = JSON.stringify(shoppingCart);

        outputCart();

    });

    function outputCart() {

        if (localStorage["shopCart"] != null) {
            shoppingCart = JSON.parse(localStorage["shopCart"].toString());


            var total = 0;
            var cartItemCount = 0;
            var holderHTML2 = "";
            $.each(shoppingCart, function (index, value) {
                var stotal = parseFloat(value.price);
                cartItemCount += 1;
                total += stotal;
                holderHTML2 += '<tr><td>' + cartItemCount + '</td><td>' + value.make + '</td><td>' + value.model + '</td><td>' + value.reqdate + '</td><td>&#2547; ' + value.price + '</td><td><span class="remove-item btn btn-danger">x</span></td></tr>';

            });

            holderHTML2 += '<tr><td colspan="4" class="text-xs-right">Total</td><td class="text-xs-right">&#2547; ' + total + '</td></tr>';
            $('#cart_output_modal').html(holderHTML2);


        } else {
            $.get("../controller/get_customer_session_id_service.php", function (results) {
                if (results === "-1") {


                } else {
                    $.get("../controller/get_cart_items_service.php?customer_id=" + results, function (results2) {

                        for (var i = 0; i < results2.length; i++) {


                            shoppingCart.push({
                                id: results2[i].VEHICLE_ID,
                                make: results2[i].MAKE_NAME,
                                model: results2[i].MODEL_NAME,
                                reqdate: results2[i].BOOKING_DATE,
                                price: results2[i].DAILY_RATE,
                            });
                        }


                        localStorage["shopCart"] = JSON.stringify(shoppingCart);

                        var total = 0;
                        var cartItemCount = 0;
                        var holderHTML2 = "";
                        $.each(shoppingCart, function (index, value) {
                            var stotal = parseFloat(value.price);
                            cartItemCount += 1;
                            total += stotal;
                            holderHTML2 += '<tr><td>' + cartItemCount + '</td><td>' + value.make + '</td><td>' + value.model + '</td><td>' + value.reqdate + '</td><td>&#2547; ' + value.price + '</td><td><span class="remove-item btn btn-danger">x</span></td></tr>';

                        });

                        holderHTML2 += '<tr><td colspan="4" class="text-xs-right">Total</td><td class="text-xs-right">&#2547; ' + total + '</td></tr>';
                        $('#cart_output_modal').html(holderHTML2);

                        return;
                    });


                }
            });
        }


    }


    $('#cart_output_modal').on('click', '.remove-item', function () {
        var itemInfo = $(this.dataset)[0];

        var itemToDelete = $('.remove-item').index(this);


        var cartArray = [];
        cartArray.push({

            id: shoppingCart[itemToDelete].cart_id
        });

        $.post("../controller/cart_delete_service.php", {checkout_arr: cartArray}, function (data, status) {


        });


        shoppingCart.splice(itemToDelete, 1);
        localStorage["shopCart"] = JSON.stringify(shoppingCart);
        outputCart();
    });


    var totalBusInList = 0;
    $("button.cartitem").each(function () {
        totalBusInList += 1;

        var currentItem = $(this);

        var itemInfo = $(this.dataset)[0];

        var isItemInCart = false;

        $.each(shoppingCart, function (index, value) {
            if (value.id === itemInfo.id) {
                currentItem.prop("disabled", true);
                currentItem.text("Added to cart");
                currentItem.attr('class', 'cartitem btn btn-success');
                isItemInCart = true;

            }
        });

        if (!isItemInCart) {
            currentItem.prop("disabled", false);
            currentItem.text("Add to cart");
            currentItem.attr('class', 'cartitem btn btn-primary');
        }

    });

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };


    setInterval(updateBusEntry, 2500);


    function updateBusEntry() {
        var num_passengers = getUrlParameter('num_passengers');
        var license = getUrlParameter('license');
        var minCost = getUrlParameter('min_cost');
        var maxCost = getUrlParameter('max_cost');
        var date = getUrlParameter('date');

        var getUrl = "../controller/get_total_vehicle_service.php?num_passengers=" + num_passengers + "&license=" + license + "&min_cost=" + minCost + "&max_cost=" + maxCost + "&date=" + date;

        if (num_passengers !== undefined && license !== undefined && minCost !== undefined && maxCost !== undefined && date !== undefined) {
            $.get(getUrl, function (results) {

                var updateBusCount = parseInt(results);

                if (updateBusCount > totalBusInList) {

                    var sPageURL = window.location.href;

                    $("div#home_bus_div").show();

                    var updatedAlert = "A new bus in your searched criteria has been added. Please <a href='" + sPageURL + "'>Reload</a> this page to see the updated result!";
                    $("span#home_bus_entry").html(updatedAlert);


                }


            });
        }
    }


});
