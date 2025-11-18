<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} · Contact</title>

        <style>
            :root {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                background-color: #f0f4f8;
            }

            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
            }

            .card {
                background: #fff;
                border-radius: 16px;
                padding: 2.5rem;
                width: min(480px, calc(100vw - 2rem));
                box-shadow: 0 25px 50px -12px rgb(15 23 42 / 0.25);
            }

            h1 {
                font-size: clamp(1.75rem, 2vw, 2.25rem);
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                color: #475569;
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 1.25rem;
                margin-top: 1.5rem;
            }

            label {
                display: flex;
                flex-direction: column;
                gap: 0.35rem;
                font-weight: 600;
            }

            input,
            textarea {
                border: 1px solid #cbd5f5;
                border-radius: 10px;
                padding: 0.85rem 1rem;
                font-size: 1rem;
                font-family: inherit;
            }

            textarea {
                resize: vertical;
                min-height: 150px;
            }

            button {
                border: none;
                border-radius: 999px;
                padding: 0.95rem 1.5rem;
                background: #0f172a;
                color: #fff;
                font-weight: 600;
                cursor: pointer;
                transition: background 150ms ease;
            }

            button:hover {
                background: #1d253f;
            }

            .alert {
                padding: 1rem 1.25rem;
                border-radius: 12px;
                margin-bottom: 1.25rem;
                font-weight: 600;
            }

            .alert-success {
                background: #ecfdf5;
                color: #065f46;
            }

            .alert-error {
                background: #fef2f2;
                color: #991b1b;
            }

            ul {
                padding-left: 1.25rem;
                margin: 0.35rem 0 0;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>Contact</h1>
            <p>Renseignez vos informations et envoyez votre message.</p>

            @if (session('status'))
                <div class="alert alert-success" role="status">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error" role="alert">
                    <span>Merci de corriger les erreurs suivantes :</span>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" novalidate>
                <label>
                    Nom complet
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </label>

                <label>
                    Adresse e-mail
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>

                <label>
                    Message
                    <textarea name="message" required>{{ old('message') }}</textarea>
                </label>

                <button type="submit">Envoyer</button>
            </form>
        </div>
    </body>
</html>
