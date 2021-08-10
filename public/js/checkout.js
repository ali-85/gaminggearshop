var stripe = Stripe('pk_test_buElZZu5A2LEJOyL4t5DKZCv00zJiQ38fu');
var elements = stripe.elements();

var $form = $('#checkout-form');
$form.submit(function(event)
    {
        $('#charge-error').addClass('hidden');
        $form.find('button').prop('disabled',true);
         Stripe.card.createToken({
            number: $('#card-number').val(),
            cvc: $('#card-cvc').val(),
            exp_month: $('#card-expiry-month').val(),
            exp_year: $('#card-expiry-year').val(),
            name: $('#card-name')
        }, stripeResponseHandler);
        return false;
    }
);

function stripeResponseHandler(status, response){
    if(response.error){
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
        //submit form
        $form.get(0).submit();
    }
}