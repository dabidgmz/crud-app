@extends('plantilla.inicio')

@section('title')
    Aviso
@endsection

@section('content')
    <div class="container">
        <div class="alert-container mt-5">
            <div class="alert alert-danger">
                <span class="close-btn" onclick="closeAlert()">&times;</span>
                <strong>Error:</strong> Usuario no encontrado.
            </div>
        </div>
    </div>

    <style>
        .alert-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .alert {
            position: relative;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>

    <script>
        function closeAlert() {
            document.querySelector('.alert-container').style.display = 'none';
        }
    </script>
@endsection
