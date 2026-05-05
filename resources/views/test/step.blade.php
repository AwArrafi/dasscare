<!DOCTYPE html>
<html>

<head>
    <title>Test DASS</title>
</head>

<body style="font-family:sans-serif; text-align:center;">

    <h4>Pertanyaan {{ $step }}/{{ $total }}</h4>

    <h2>{{ $question->text }}</h2>

    <form method="POST" action="{{ route('tes.submit', $step) }}">
        @csrf

        <input type="hidden" name="question_id" value="{{ $question->id }}">

        <div style="margin: 20px;">
            <label>
                <input type="radio" name="value" value="0" required>
                Tidak Sama Sekali
            </label>
        </div>

        <div style="margin: 20px;">
            <label>
                <input type="radio" name="value" value="1">
                Sampai di Tingkat Tertentu
            </label>
        </div>

        <div style="margin: 20px;">
            <label>
                <input type="radio" name="value" value="2">
                Lumayan Sering
            </label>
        </div>

        <div style="margin: 20px;">
            <label>
                <input type="radio" name="value" value="3">
                Sangat Sesuai
            </label>
        </div>

        <br>

        <button type="submit">Selanjutnya</button>

    </form>

</body>

</html>
