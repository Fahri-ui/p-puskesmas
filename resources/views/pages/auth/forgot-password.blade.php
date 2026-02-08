<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lupa Password - Profil Puskesmas Binong</title>  
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d6a4f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .forgot-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
        }

        .forgot-left {
            background: linear-gradient(135deg, #1a4d2e 0%, #2d6a4f 100%);
            padding: 60px 50px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .forgot-left h1 {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .forgot-left p {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .feature-list {
            list-style: none;
            margin-top: 20px;
        }

        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .feature-list li:before {
            content: "✓";
            display: inline-block;
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 12px;
            font-weight: bold;
        }

        .forgot-right {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .forgot-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d6a4f 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            color: white;
        }

        .forgot-header h2 {
            color: #1a4d2e;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .forgot-header p {
            color: #6c757d;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            color: #2d3748;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #2d6a4f;
            background: white;
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
        }

        .form-description {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 24px;
            line-height: 1.5;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            border: 1px solid;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-error {
            background: #fee;
            color: #c33;
            border-color: #fcc;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #fcc;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-submit {
            flex: 1;
            padding: 14px;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d6a4f 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-back {
            flex: 1;
            padding: 14px;
            background: #f0f0f0;
            color: #1a4d2e;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-back:hover {
            background: #e8e8e8;
            border-color: #2d6a4f;
        }

        @media (max-width: 768px) {
            .forgot-container {
                grid-template-columns: 1fr;
            }

            .forgot-left {
                display: none;
            }

            .forgot-right {
                padding: 40px 30px;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <div class="forgot-left">
            <h1>Profil Puskesmas Binong</h1>
            <p>Portal resmi untuk pengelolaan dan pembaruan informasi profil, layanan, dan kegiatan Puskesmas Binong.</p>
            <ul class="feature-list">
                <li>Akses eksklusif bagi admin terotorisasi</li>
                <li>Pembaruan konten profil dan layanan puskesmas</li>
                <li>Pengelolaan informasi resmi secara aman dan terenkripsi</li>
                <li>Sistem autentikasi berbasis keamanan standar instansi</li>
            </ul>
        </div>

        <div class="forgot-right">
            <div class="forgot-header">
                <div class="logo">⚕</div>
                <h2>Lupa Password</h2>
                <p>Reset password Anda dengan mudah</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form id="forgotForm">
                <p class="form-description">Masukkan email akun Anda. Kami akan mengirimkan link untuk mereset password ke alamat email tersebut.</p>

                <div class="form-group">
                    <label for="email">Email Admin</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="admin@puskesmasbinong.go.id"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <div class="alert alert-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Kirim Link Reset</button>
                    <a href="/login" class="btn-back">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('forgotForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            
            // Disable button
            const submitBtn = document.querySelector('.btn-submit');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sedang Mengirim...';
            
            try {
                const formData = new FormData();
                formData.append('email', email);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                
                const response = await fetch('{{ route("forgot-password") }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    // Show success message
                    showSuccess(data.message || 'Link reset password telah dikirim ke email Anda. Silakan cek email Anda.');
                    document.getElementById('forgotForm').reset();
                } else {
                    // Show error message
                    showError(data.message || 'Email tidak ditemukan dalam sistem');
                }
            } catch (error) {
                console.error('Forgot password error:', error);
                showError('Terjadi gangguan sistem. Silakan coba lagi.');
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim Link Reset';
            }
        });
        
        function showError(message) {
            // Remove existing error
            const existingError = document.querySelector('.error-message');
            if (existingError) existingError.remove();
            
            // Add new error
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.textContent = message;
            
            const form = document.getElementById('forgotForm');
            form.insertBefore(errorDiv, form.firstChild);
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                if (errorDiv.parentNode) {
                    errorDiv.remove();
                }
            }, 5000);
        }

        function showSuccess(message) {
            // Remove existing alert
            const existingAlert = document.querySelector('.alert');
            if (existingAlert) existingAlert.remove();
            
            // Add new success alert
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.textContent = message;
            
            const header = document.querySelector('.forgot-header');
            header.insertAdjacentElement('afterend', alertDiv);
        }
    </script>
</body>
</html>