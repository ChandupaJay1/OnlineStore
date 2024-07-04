// document.addEventListener('DOMContentLoaded', () => {
//     const paymentDetailsElement = document.getElementById('payment-details');
//     const paymentDetails = {
//         merchant_id: paymentDetailsElement.getAttribute('data-merchant-id'),
//         order_id: paymentDetailsElement.getAttribute('data-order-id'),
//         items: paymentDetailsElement.getAttribute('data-items'),
//         amount: paymentDetailsElement.getAttribute('data-amount'),
//         currency: paymentDetailsElement.getAttribute('data-currency'),
//         hash: paymentDetailsElement.getAttribute('data-hash'),
//         first_name: paymentDetailsElement.getAttribute('data-first-name'),
//         last_name: paymentDetailsElement.getAttribute('data-last-name'),
//         email: paymentDetailsElement.getAttribute('data-email'),
//         phone: paymentDetailsElement.getAttribute('data-phone'),
//         address: paymentDetailsElement.getAttribute('data-address'),
//         city: paymentDetailsElement.getAttribute('data-city')
//     };

//     window.paymentGateway = function () {
//         var payment = {
//             "sandbox": true,
//             "merchant_id": paymentDetails.merchant_id,
//             "return_url": "http://localhost/onlinestore/invoice.php",
//             "cancel_url": "http://localhost/onlinestore/payment.php",
//             "notify_url": "http://sample.com/notify",
//             "order_id": paymentDetails.order_id,
//             "items": paymentDetails.items,
//             "amount": paymentDetails.amount,
//             "currency": paymentDetails.currency,
//             "hash": paymentDetails.hash,
//             "first_name": paymentDetails.first_name,
//             "last_name": paymentDetails.last_name,
//             "email": paymentDetails.email,
//             "phone": paymentDetails.phone,
//             "address": paymentDetails.address,
//             "city": paymentDetails.city,
//             "country": "Sri Lanka",
//             "delivery_address": "No. 46, Galle road, Kalutara South",
//             "delivery_city": "Kalutara",
//             "delivery_country": "Sri Lanka",
//             "custom_1": "",
//             "custom_2": ""
//         };
//         payhere.startPayment(payment);
//     }

    
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const paymentDetailsElement = document.getElementById('payment-details');
//     const paymentDetails = {
//         merchant_id: paymentDetailsElement.getAttribute('data-merchant-id'),
//         order_id: paymentDetailsElement.getAttribute('data-order-id'),
//         items: paymentDetailsElement.getAttribute('data-items'),
//         amount: paymentDetailsElement.getAttribute('data-amount'),
//         currency: paymentDetailsElement.getAttribute('data-currency'),
//         hash: paymentDetailsElement.getAttribute('data-hash'),
//         first_name: paymentDetailsElement.getAttribute('data-first-name'),
//         last_name: paymentDetailsElement.getAttribute('data-last-name'),
//         email: paymentDetailsElement.getAttribute('data-email'),
//         phone: paymentDetailsElement.getAttribute('data-phone'),
//         address: paymentDetailsElement.getAttribute('data-address'),
//         city: paymentDetailsElement.getAttribute('data-city')
//     };

//     window.paymentGateway = function () {
//         var payment = {
//             "sandbox": true,
//             "merchant_id": paymentDetails.merchant_id,
//             "return_url": "http://localhost/onlinestore/invoice.php?order_id=" + paymentDetails.order_id,
//             "cancel_url": "http://localhost/onlinestore/payment.php",
//             "notify_url": "http://sample.com/notify",
//             "order_id": paymentDetails.order_id,
//             "items": paymentDetails.items,
//             "amount": paymentDetails.amount,
//             "currency": paymentDetails.currency,
//             "hash": paymentDetails.hash,
//             "first_name": paymentDetails.first_name,
//             "last_name": paymentDetails.last_name,
//             "email": paymentDetails.email,
//             "phone": paymentDetails.phone,
//             "address": paymentDetails.address,
//             "city": paymentDetails.city,
//             "country": "Sri Lanka",
//             "delivery_address": "No. 46, Galle road, Kalutara South",
//             "delivery_city": "Kalutara",
//             "delivery_country": "Sri Lanka",
//             "custom_1": "",
//             "custom_2": ""
//         };
//         payhere.startPayment(payment);
//     };
// });

document.addEventListener('DOMContentLoaded', () => {
    const paymentDetailsElement = document.getElementById('payment-details');
    const paymentDetails = {
        merchant_id: paymentDetailsElement.getAttribute('data-merchant-id'),
        order_id: paymentDetailsElement.getAttribute('data-order-id'),
        items: paymentDetailsElement.getAttribute('data-items'),
        amount: paymentDetailsElement.getAttribute('data-amount'),
        currency: paymentDetailsElement.getAttribute('data-currency'),
        hash: paymentDetailsElement.getAttribute('data-hash'),
        first_name: paymentDetailsElement.getAttribute('data-first-name'),
        last_name: paymentDetailsElement.getAttribute('data-last-name'),
        email: paymentDetailsElement.getAttribute('data-email'),
        phone: paymentDetailsElement.getAttribute('data-phone'),
        address: paymentDetailsElement.getAttribute('data-address'),
        city: paymentDetailsElement.getAttribute('data-city')
    };

    window.paymentGateway = function () {
        var payment = {
            "sandbox": true,
            "merchant_id": paymentDetails.merchant_id,
            "return_url": "http://localhost/onlinestore/invoice.php?order_id=" + paymentDetails.order_id,
            "cancel_url": "http://localhost/onlinestore/payment.php",
            "notify_url": "http://sample.com/notify",
            "order_id": paymentDetails.order_id,
            "items": paymentDetails.items,
            "amount": paymentDetails.amount,
            "currency": paymentDetails.currency,
            "hash": paymentDetails.hash,
            "first_name": paymentDetails.first_name,
            "last_name": paymentDetails.last_name,
            "email": paymentDetails.email,
            "phone": paymentDetails.phone,
            "address": paymentDetails.address,
            "city": paymentDetails.city,
            "country": "Sri Lanka",
            "delivery_address": "No. 46, Galle road, Kalutara South",
            "delivery_city": "Kalutara",
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
        };

        payhere.onCompleted = function onCompleted(orderId) {
            // Payment completed successfully
            // Note: return_url will also be called
            window.location.href = "http://localhost/onlinestore/invoice.php?order_id=" + orderId;
        };

        payhere.onDismissed = function onDismissed() {
            // User dismissed the payment without completing
            window.location.href = "http://localhost/onlinestore/payment.php";
        };

        payhere.onError = function onError(error) {
            // An error occurred
            alert("Payment error: " + error);
        };

        payhere.startPayment(payment);
    };
});


