<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<script src="https://www.paypal.com/sdk/js?client-id=AaqsMUWf6Kx2VV_NEkWzcv8faweBxX8b5qEru1vuX38qmsqbQKh4l6cmbbQs6DCWnqm6x2svsdkvS-IB&currency=MYR"></script>
<?
$itemNumber = "DP12345"; 
$itemName = "Demo Product"; 
$itemPrice = 75;  
$currency = "MYR"; 
?>
<? 
$cart = session()->get('cart') ?? [];
$total = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);
?>
    <section class="bg-ff">
        <div class="content cart">
            <h4>Shopping cart</h4>
        <?php foreach($cart as $id => $item): 
            $products = model(ProductsModel::class)->getProductById($id);
            $product_text = model(ProductText::class)->getTextLang($id, $locale);
        ?>
            <div class="cart__item">
                <div>
                    <img src="<?= base_url('images/'.$products['img']); ?>" alt="">
                </div>
                <div>
                    <p><?= esc($item['name']) ?> <? if(isset($product_text['title'])){ echo $product_text['title']; } ?></p>
                </div>
                <div>
                    <p></p>
                </div>
                <div>
                    <p></p>
                </div>
                <div>
                    <p><strong><?= number_format($item['price'], 2) ?>&nbsp;MYR</strong></p>
                </div> 
                <a href="<?= base_url($locale.'/cart/del/'.$id) ?>" class="del">×</a>
            </div>
            <? endforeach; ?>
            <div class="total">
                <p>Total: <?= number_format($total, 2) ?> MYR</strong></p>
            </div> 
        </div>
        <?  
            $p = array();
foreach ($cart as $id => $item) {
    $p[] = [
        'id' => $id,
        'name' => $item['name'],
        'price' => $item['price']
    ];
}
        ?>
        <div class="content cart">
            <h4>Checkout with Billplz</h4>
            <? if(isset($client)): ?>
            <?=form_open($locale.'/cart/billplz');?>
                <input type="hidden" name='name' required value='<?= $client['first_name']; ?>'>
                <input type="hidden" name='email' required value='<?= $client['email']; ?>'>
                <input type="hidden" name="mobile" value="<?= $client['phone']; ?>">
                <input type="hidden" name="amount" value ="<?= str_replace(' ', '', $cart->total())*100; ?>">
                <input type="hidden" name="reference_1_label" value="">
                <input type="hidden" name="reference_1" value="">
                <input type="hidden" name="reference_2_label" value="">
                <input type="hidden" name="reference_2" value="">
                <input type="hidden" name="description" value ="<?php echo $client['id']; ?>">
                <input type="hidden" name="collection_id" value = "">
                <input type="submit" value="Proceed to checkout" class="bollplz">
            <?= form_close(); ?>
            <? endif; ?>
            <input type="submit" value="Proceed to checkout" class="bollplz">
                <hr>
            <h4>Checkout with PayPal</h4>

            <div class="panel-body">
                <!-- Display status message -->
                <div id="paymentResponse" class="hidden"></div>
                
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
            </div>  
            
            <script src="https://js.stripe.com/v3/"></script>

            <script defer>
                // This is your test publishable API key.
                const stripe = Stripe("pk_test_51NZpDUC9ewgEdVcF8kIzb8752pcFn9sOZdm66OSqTAtxQ4749H1SUAvhJaX54S39K2VpyvZNSy2BSwC8PqOXPXsl003gOnvDUt");

                // The items the customer wants to buy
                const items = [{ id: "xl-tshirt", amount: 1000 }];

                let elements;

                initialize();

                document
                .querySelector("#payment-form")
                .addEventListener("submit", handleSubmit);

                // Fetches a payment intent and captures the client secret
                async function initialize() {
                const { clientSecret, dpmCheckerLink } = await fetch("/en/stripe/start", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ items }),
                }).then((r) => r.json());

                elements = stripe.elements({ clientSecret });

                const paymentElementOptions = {
                    layout: "tabs",
                };

                const paymentElement = elements.create("payment", paymentElementOptions);
                paymentElement.mount("#payment-element");

                // [DEV] For demo purposes only
                setDpmCheckerLink(dpmCheckerLink);
                }

                async function handleSubmit(e) {
                e.preventDefault();
                setLoading(true);

                const { error } = await stripe.confirmPayment({
                    elements,
                    confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "http://localhost:4242/complete.html",
                    },
                });

                // This point will only be reached if there is an immediate error when
                // confirming the payment. Otherwise, your customer will be redirected to
                // your `return_url`. For some payment methods like iDEAL, your customer will
                // be redirected to an intermediate site first to authorize the payment, then
                // redirected to the `return_url`.
                if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                } else {
                    showMessage("An unexpected error occurred.");
                }

                setLoading(false);
                }

                // ------- UI helpers -------

                function showMessage(messageText) {
                const messageContainer = document.querySelector("#payment-message");

                messageContainer.classList.remove("hidden");
                messageContainer.textContent = messageText;

                setTimeout(function () {
                    messageContainer.classList.add("hidden");
                    messageContainer.textContent = "";
                }, 4000);
                }

                // Show a spinner on payment submission
                function setLoading(isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    document.querySelector("#submit").disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#button-text").classList.add("hidden");
                } else {
                    document.querySelector("#submit").disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#button-text").classList.remove("hidden");
                }
                }

                function setDpmCheckerLink(url) {
                document.querySelector("#dpm-integration-checker").href = url;
                }
            </script>

            <!-- Display a payment form -->
            <form id="payment-form">
            <div id="payment-element">
                <!--Stripe.js injects the Payment Element-->
            </div>
            <button id="submit">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Pay now</span>
            </button>
            <div id="payment-message" class="hidden"></div>
            </form>
            <!-- [DEV]: For demo purposes only, display dynamic payment methods annotation and integration checker -->
            <div id="dpm-annotation">
            <p>
                Payment methods are dynamically displayed based on customer location, order amount, and currency.&nbsp;
                <a href="#" target="_blank" rel="noopener noreferrer" id="dpm-integration-checker">Preview payment methods by transaction</a>
            </p>
            </div>




        </div>

    </section>
    <script>
paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [{
                custom_id: "<?php echo $itemNumber; ?>",
                description: "<?php echo $itemName; ?>",
                amount: {
                    value: <?= str_replace(' ', '', $total); ?>,
                    currency: '<?= $currency; ?>',
                    breakdown: {
                    item_total: {
                        currency_code: '<?= $currency; ?>',
                        value: <?= str_replace(' ', '', $total); ?>
                    },
                    }
                },
                items: [
                    <? foreach($cart as $id => $item): ?>
                        {
                            name: '<?php echo $item['name']; ?>',
                            unit_amount: {
                                currency_code: '<?= $currency; ?>',
                                value: <?= str_replace(' ', '', $item['price']); ?>
                            },
                            quantity: '1'
                        },
                    <? endforeach; ?>                    
                ],

        }]
        });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            setProcessing(true);

            var postData = {paypal_order_check: 1, order_id: orderData.id};
            fetch('paypal_checkout_validate.php', {
                method: 'POST',
                headers: {'Accept': 'application/json'},
                body: encodeFormData(postData)
            })
            .then((response) => response.json())
            .then((result) => {
                if(result.status == 1){
                    window.location.href = "payment-status.php?checkout_ref_id="+result.ref_id;
                }else{
                    const messageContainer = document.querySelector("#paymentResponse");
                    messageContainer.classList.remove("hidden");
                    messageContainer.textContent = result.msg;
                    
                    setTimeout(function () {
                        messageContainer.classList.add("hidden");
                        messageText.textContent = "";
                    }, 5000);
                }
                setProcessing(false);
            })
            .catch(error => console.log(error));
        });
    }
}).render('#paypal-button-container');

const encodeFormData = (data) => {
    var form_data = new FormData();

    for ( var key in data ) {
        form_data.append(key, data[key]);
    }
    return form_data;   
}

// Show a loader on payment form processing
const setProcessing = (isProcessing) => {
    if (isProcessing) {
        document.querySelector(".overlay").classList.remove("hidden");
    } else {
        document.querySelector(".overlay").classList.add("hidden");
    }
}    
</script>

<?= $this->endSection() ?>