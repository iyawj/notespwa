<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Student Information</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #e8ecf1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 50px 40px;
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
            border: 1px solid #d0d8e8;
        }

        .card h1 {
            font-size: 1.8em;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 35px;
            text-align: center;
        }

        .info-container {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 35px;
        }

        .info-item {
            padding: 14px 16px;
            background: #f8f9fc;
            border-radius: 12px;
            border: 1px solid #d0d8e8;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
            background: #ffffff;
        }

        .info-item label {
            display: block;
            font-size: 0.7em;
            color: #667eea;
            font-weight: 800;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .info-item p {
            font-size: 1em;
            color: #2d3748;
            font-weight: 600;
            margin: 0;
            word-break: break-word;
        }

        .button-group {
            margin-top: 40px;
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 13px 24px;
            border: none;
            border-radius: 8px;
            font-size: 0.95em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Student Information</h1>
            
            <div class="info-container">
                <div class="info-item">
                    <label>Full Name</label>
                    <p>Rhealyn C. Enelda</p>
                </div>

                <div class="info-item">
                    <label>Section</label>
                    <p>BSIT-3A</p>
                </div>
            </div>

            <div class="button-group">
                <a href="{{route('auth.login')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>