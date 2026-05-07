<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px 20px;
        }

        .dashboard-card {
            width: 90%;
            max-width: 400px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .add-note-section {
            margin-bottom: 20px;
        }

        .add-note-section input,
        .add-note-section textarea {
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .note-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #e9ecef;
        }

        .note-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #212529;
        }

        .note-content {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .empty-message {
            color: #6c757d;
            text-align: center;
            margin-top: 20px;
        }

        .success-alert {
            font-size: 0.85rem;
            padding: 10px 15px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
    <div class="dashboard-card">

        <!-- Header -->
        <div class="header">
            
            <h6>
                @php $user = auth()->user(); @endphp

                @if($user->role == 1)
                    Hello, {{ $user->name }}, these are all the notes and their authors
                @else
                    Hello, {{ $user->name }}
                @endif
            </h6>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
             </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success success-alert" id="successAlert" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="add-note-section">
            <form method="POST" action="/notes">
            @csrf
            <div>
                <input type="text" name="title" class="form-control"placeholder="Title" required>
            </div>

            <div>
                <textarea name="content" class="form-control" rows="3"placeholder="Content" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Add Note</button>
            </form>
        </div>

        @if(isset($notes) && count($notes) > 0)
            @foreach($notes as $note)
                <div class="note-card">
                    
                    <div class="note-title">{{ $note->title }}</div>
                    <div class="note-content">{{ $note->content }}</div>
                    @if(auth()->user()->role == 1)
                        <small class="text-dark">
                            <strong>Author:</strong> {{ $note->user->name }}
                        </small>
                    @endif

                    <form method="POST" action="/notes/{{ $note->id }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger w-100">Delete</button>
                    </form>
                </div>

            @endforeach
        @else
            <div class="empty-message">No notes yet. Add one above!</div>
        @endif  
    </div> 
</body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('successAlert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.transition = 'opacity 0.3s ease';
                    successAlert.style.opacity = '0';
                    setTimeout(function() {
                        successAlert.remove();
                    }, 300);
                }, 3000);
            }
        });
    </script>
</html>
