<!DOCTYPE html>
<html>

<head>
    <title>Test DASS</title>
</head>

<body>

    <h2>Test DASS-21</h2>

    <form method="POST" action="{{ route('tes.submit') }}">
        @csrf

        @foreach ($questions as $q)
            <div style="margin-bottom:20px;">
                <p>{{ $loop->iteration }}. {{ $q->text }}</p>

                @for ($i = 0; $i <= 3; $i++)
                    <label>
                        <input type="radio" name="answers[{{ $q->id }}]" value="{{ $i }}" required>
                        {{ $i }}
                    </label>
                @endfor
            </div>
        @endforeach

        <button type="submit">Submit</button>
    </form>

</body>

</html>
