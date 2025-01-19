<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Poppins", serif;
        }
    </style>
</head>

<body class="h-full bg-white py-12">
    <button onclick="history.back()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-6">
        Back
    </button>

    <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
        
        <div class="w-full max-w-2xl">
            <img class="w-full h-[600px] max-h-screen object-contain mr-52" src="{{ session('image') }}" alt="Product Image">
        </div>
        <div class="w-full max-w-2xl">
            <h3 class="text-4xl font-poppins font-semibold text-center text-gray-800 mb-10 mt-10">Produk Dipesan</h3>

            <!-- Menampilkan data produk dari session -->
            <div class="mb-6">
                <div class="flex flex-col space-y-4">
                    <div>
                        <p class="font-poppins capitalize font-semibold text-2xl text-gray-600">{{ session('name') }}</p>
                        <p class="font-poppins text-xl text-gray-600">{{ session('description') }}</p>
                        <p class="font-poppins font-semibold text-xl text-gray-700">Price <span>Rp.</span> {{ number_format(session('price'), 0, ',', '.') }}</p>
                        <p class="text-gray-600 text-lg">Quantity: {{ session('quantity') }}</p>
                        <p class="text-green-600 font-bold text-xl">Total : Rp. {{ number_format(session('total'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Form untuk proses pembayaran dengan Stripe -->
            <form action="{{ route('stripe.post') }}" method="POST" id="checkout-form">
                @csrf
                <!-- Card Element -->
                <div id="card-element" class="form-control mb-6 border border-gray-300 rounded-md p-4"></div>

                <!-- Hidden input untuk token -->
                <input type="hidden" name="stripeToken" id="stripe-token-id">
                <div class="flex justify-center">
                    <button id="pay-btn" class="w-[150px] py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150"
                            type="button" onclick="createToken()">
                        Bayar
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
            if (typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            if (typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>

</html>
