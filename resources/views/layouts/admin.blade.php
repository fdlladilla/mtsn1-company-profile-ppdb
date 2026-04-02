<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
</head>
<body>

    <div class="admin-wrapper">
        @include('components.admin-sidebar')

        <main class="admin-main" id="mainContent">
            <div class="container-fluid flex-grow-1">
                @yield('content')
            </div>

            <footer class="admin-footer">
                <div class="text-center">
                    <p>© 2026 MTsN 1 Padang Lawas Utara. All Rights Reserved.</p>
                </div>
            </footer>
        </main>
    </div>

    @stack('modals')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trigger = document.getElementById('sidebarTrigger');
            const sidebar = document.querySelector('.admin-sidebar');
            const mainContent = document.querySelector('.admin-main');

            if (trigger) {
                trigger.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    if(mainContent) {
                        mainContent.classList.toggle('shifted');
                    }
                });
            }
        });
    </script>
    
</body>
</html>