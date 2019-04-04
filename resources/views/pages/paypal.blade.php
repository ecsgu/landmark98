<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    TEST PAYPAL
                </div>

                <div class="links">
                    <div id="paypal-button"></div>
                </div>
            </div>
        </div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      paypal.Button.render({
        env: 'sandbox', // Or 'production'
        client: {
            sandbox:'Afm6ObD0Wl0Jcnfiknnh5XsTrUru00d5BDzoQOBD7J57aFOQB19ogYGA3AN5ukdMgx4aCOixa1fk_h2I',
            production:''
        },

        style: {
          size: 'large',
          color: 'gold',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
          // 2. Make a request to your server
          return actions.payment.create({
            transactions: [{
                amount: {
                    total: '10',
                    currency: 'USD'
                }
            }]
          });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
            return actions.payment.execute().then(function(){
                //window.location="http://www.vietjack.com";
				window.location="{{asset('/')}}"
                //window.alert('vuithoima');
            });

        }
      }, '#paypal-button');
    </script>
    </body>
</html>