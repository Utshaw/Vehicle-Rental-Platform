
var shoppingCart = [];

var checkoutArray = [];


$(document).ready(function () {





    $("div.alert").hide();


    outputCart();

    function outputCart() {

        if (localStorage["shopCart"] != null) {
            shoppingCart = JSON.parse(localStorage["shopCart"].toString());
            console.log("session storage is not null");



            console.log(shoppingCart);

            var total = 0;
            var cartItemCount = 0;
            var holderHTML2 = "";

            checkoutArray = [];


            $.each(shoppingCart, function (index, value) {
                const date1 = new Date(value.date_from);
                const date2 = new Date(value.date_to);
                const diffTime = Math.abs(date2.getTime() - date1.getTime());
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                var stotal = parseFloat(value.price) * diffDays;
                cartItemCount += 1;
                total += stotal;
                holderHTML2 += '<tr><td>' + cartItemCount + '</td><td>' + value.make + '</td><td>' + value.model + '</td><td>' + value.date_from + '</td><td>' + value.date_to + '</td><td> &#2547;' + value.price + '</td><td><span class="remove-item btn btn-danger">x</span></td></tr>';
                checkoutArray.push({

                    id: value.id,
                    date: value.booking_date,
                    date_from: value.date_from,
                    date_to: value.date_to,
                    total: total
                });



            });

            holderHTML2 += '<tr><td colspan="5" class="text-xs-right">Total</td><td class="text-xs-right">&#2547;' + total + '</td></tr>';
            $('#cart_output_checklist').html(holderHTML2);

            $('#cart_output_modal').html(holderHTML2);




        } else {
            shoppingCart = [];
            checkoutArray = [];


            console.log("Session storage is null");
            $.get("../controller/get_customer_session_id_service.php", function (results) {
                if (results === "-1") {

                } else {
                    console.log(results);
                    $.get("../controller/get_cart_items_service.php?customer_id=" + results, function (results2) {

                        console.log(results2);
                        for (var i = 0; i < results2.length; i++) {


                            shoppingCart.push({
                                id: results2[i].VEHICLE_ID,
                                make: results2[i].MAKE_NAME,
                                model: results2[i].MODEL_NAME,
                                booking_date: results2[i].BOOKING_DATE,
                                price: results2[i].DAILY_RATE,
                                date_from: results2[i].DATE_FROM,
                                date_to: results2[i].DATE_TO
                            });
                        }



                        localStorage["shopCart"] = JSON.stringify(shoppingCart);

                        var total = 0;
                        var cartItemCount = 0;
                        var holderHTML2 = "";
                        console.log("Printing startA");
                        console.log(shoppingCart);
                        $.each(shoppingCart, function (index, value) {

                            const date1 = new Date(value.date_from);
                            const date2 = new Date(value.date_to);
                            const diffTime = Math.abs(date2.getTime() - date1.getTime());
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                            console.log(value);
                            var stotal = parseFloat(value.price) * diffDays;
                            cartItemCount += 1;
                            total += stotal;
                            holderHTML2 += '<tr><td>' + cartItemCount + '</td><td>' + value.make + '</td><td>' + value.model + '</td><td>' + value.date_from + '</td><td>' + value.date_to + '</td><td>&#2547;' + value.price + '</td><td><span class="remove-item btn btn-danger">x</span></td></tr>';

                            checkoutArray.push({

                                id: value.id,
                                date: value.booking_date,
                                date_from: value.date_from,
                                date_to: value.date_to,
                                total: total
                            });


                        });

                        holderHTML2 += '<tr><td colspan="5" class="text-xs-right">Total</td><td class="text-xs-right">&#2547;' + total + '</td></tr>';
                        $('#cart_output_checklist').html(holderHTML2);

                        $('#cart_output_modal').html(holderHTML2);

                        return;
                    });


                }
            });


        }




        if (shoppingCart.length === 0) {
            $("button#submit_checkout").prop("disabled", true);

        } else {
            $("button#submit_checkout").prop("disabled", false);

        }

    }




    $('#cart_output_checklist').on('click', '.remove-item', function () {
        var itemInfo = $(this.dataset)[0];



        var itemToDelete = $('.remove-item').index(this);

        var cartArray = [];
        cartArray.push({

            id: shoppingCart[itemToDelete].cart_id
        });

        $.post("../controller/cart_delete_service.php", { checkout_arr: cartArray }, function (data, status) {



        });


        console.log(shoppingCart);
        shoppingCart.splice(itemToDelete, 1);
        console.log(shoppingCart);
        localStorage["shopCart"] = JSON.stringify(shoppingCart);
        outputCart();


    });




    $("button#submit_checkout").click(function () {

        $.get("../controller/get_customer_session_id_service.php", function (results) {


            if (results === "-1") {


                window.location.href = "../view/login.php";



            } else {
                checkoutArray.push(
                    {
                        customer_id: results
                    });

                console.log("SOMEA");
                console.log(checkoutArray);
                console.log("SOMEB");
                $.post("../controller/checkout_post_service.php", { checkout_arr: checkoutArray }, function (data, status) {
                    console.log(data);

                    var divAlert = $("div.alert");
                    divAlert.show();
                    var divAlertSpan = $("div span#home_message");


                    // contingency support
                    divAlert.attr('class', 'alert alert-success alert-dismissable');
                    divAlertSpan.html("Your order has been accepted!");
                    localStorage.clear();
                    outputCart();


                    // if (data == "1") {

                    //     divAlert.attr('class', 'alert alert-success alert-dismissable');
                    //     divAlertSpan.html("Your order has been accepted!");
                    //     localStorage.clear();
                    //     outputCart();


                    // } else {

                    //     divAlert.attr('class', 'alert alert-danger alert-dismissable');
                    //     divAlertSpan.html("Your order couldn't be processed. Try again later.");

                    // }

                });
            }



        });


        console.log(checkoutArray);
    });



});


