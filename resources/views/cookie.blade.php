@extends("master") @section("title") {{ __("Cookie Policy") }} @endsection
@section("content")
<div class="cookie-policy-container">
    <h1>{{ __("Cookie Policy") }}</h1>
    <h2>{{ __("Use of Cookies") }}</h2>
    <p>
        {{
            __(
                'We use "cookies" to collect information about you (for example, to determine what language to display the site in). A cookie is a small piece of data that our site stores on your computer and accesses each time you visit so that we can understand how you use our site. This helps us to provide you with the best possible content.'
            )
        }}
    </p>
    <h2>{{ __("Changes to This Policy") }}</h2>
    <p>
        {{
            __(
                "At our discretion, we may change our privacy policy to reflect updates to our business processes, current acceptable practices, or legislative or regulatory changes. If we decide to change this privacy policy, we will post the changes here at the same link by which you are accessing this privacy policy."
            )
        }}
    </p>
    <p>
        {{
            __(
                "If required by law, we will get your permission or give you the opportunity to opt in to or opt out of, as applicable, any new uses of your personal information."
            )
        }}
    </p>
    <h2>{{ __("Contact Us") }}</h2>
    <p>
        {{
            __(
                "For any questions or concerns regarding your privacy, you may contact us using the following details:"
            )
        }}
    </p>
    <p>Maciej Gawrysiak</p>
    <p>gawrysiakmaciej@duck.com</p>
</div>
@endsection
