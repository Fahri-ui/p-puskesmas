@if(session('success'))
    <div class="flash-message flash-success" id="flashMessage">
        <div class="flex items-center space-x-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@elseif(session('error'))
    <div class="flash-message flash-error" id="flashMessage">
        <div class="flex items-center space-x-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

<style>
    .flash-message {
        position: fixed;
        top: 2rem;
        left: -24rem;
        width: 24rem;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        animation: slideInLeft 0.4s ease-out forwards, slideOutLeft 0.4s ease-in 4.6s forwards;
    }

    .flash-success {
        background-color: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .flash-error {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    @keyframes slideInLeft {
        from {
            left: -24rem;
            opacity: 0;
        }
        to {
            left: 2rem;
            opacity: 1;
        }
    }

    @keyframes slideOutLeft {
        from {
            left: 2rem;
            opacity: 1;
        }
        to {
            left: -24rem;
            opacity: 0;
        }
    }
</style>

<script>
    (function() {
        const flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.remove();
            }, 5000);
        }
    })();
</script>
