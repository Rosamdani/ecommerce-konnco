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
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
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
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    </script>


</body>

</html>