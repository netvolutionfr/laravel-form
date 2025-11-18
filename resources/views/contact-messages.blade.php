<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} · Messages reçus</title>

        <style>
            :root {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                background-color: #f1f5f9;
            }

            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
                padding: 2rem 1rem;
            }

            .card {
                background: #fff;
                border-radius: 20px;
                padding: 2.25rem;
                width: min(960px, calc(100vw - 2rem));
                box-shadow: 0 25px 50px -12px rgb(15 23 42 / 0.2);
            }

            header {
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.5rem;
            }

            h1 {
                margin: 0;
                font-size: clamp(1.75rem, 3vw, 2.5rem);
            }

            a.button {
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                padding: 0.85rem 1.5rem;
                background: #0f172a;
                color: #fff;
                font-weight: 600;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                padding: 0.85rem 1rem;
                text-align: left;
                border-bottom: 1px solid #e2e8f0;
            }

            th {
                font-size: 0.95rem;
                text-transform: uppercase;
                letter-spacing: 0.08em;
                color: #475569;
            }

            tbody tr:last-child td {
                border-bottom: none;
            }

            .empty {
                background: #f8fafc;
                border-radius: 16px;
                padding: 2rem;
                text-align: center;
                color: #475569;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <header>
                <div>
                    <h1>Messages reçus</h1>
                    <p>Retrouvez toutes les demandes envoyées via le formulaire.</p>
                </div>
                <a href="{{ route('contact.create') }}" class="button">Nouveau message</a>
            </header>

            @if ($messages->isEmpty())
                <div class="empty">Aucun message n'a encore été enregistré.</div>
            @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Reçu le</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{!! $message->message !!}</td>
                                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </body>
</html>
