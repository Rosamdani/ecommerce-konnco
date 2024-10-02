<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client_key')}}"></script>
    <title>Payment</title>

</head>

<body>
    <div class="w-full h-screen">
        <div id="snap-container" class="mx-auto max-w-2xl"></div>
        <button id="pay-button">Bayar</button>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        window.snap.pay('{{$snapToken}}', {
        onSuccess: function (result) {
          /* You may add your own implementation here */
        //   Redirect to home
          alert("payment success!"); console.log(result);
          window.location.href = "{{route('payment.success')}}";
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          window.location.href = "{{route('payment.failed')}}";
          },
        onClose: function () {
          window.location.href = "{{route('payment.cancel')}}";
        }
      });
    // trigger on click pay-button
    document.getElementById('pay-button').onclick = function () {
        window.snap.pay('{{$snapToken}}', {
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          window.location.href = "{{route('payment.failed')}}";
          },
        onClose: function () {
          window.location.href = "{{route('payment.cancel')}}";
        }
      });
    };

    </script>


</body>

</html>
