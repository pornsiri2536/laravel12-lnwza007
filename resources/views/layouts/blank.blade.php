<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เว็บไซต์ท่องเที่ยว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .tourism-image {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
        }

        /* Admin Menu Styles */
        .navbar .dropdown-menu {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            padding: 10px 0;
            margin-top: 8px;
        }

        .navbar .dropdown-item {
            padding: 8px 20px;
            transition: all 0.3s ease;
            border-radius: 5px;
            margin: 2px 10px;
        }

        .navbar .dropdown-item:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateX(5px);
        }

        .navbar .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        /* Admin Crown Icon */
        .navbar .nav-link[href="#"]:has(.fa-crown) {
            color: #ffd700 !important;
            font-weight: 600;
        }

        .navbar .nav-link[href="#"]:has(.fa-crown):hover {
            color: #ffed4e !important;
        }

        /* User Menu */
        .navbar .nav-link[href="#"]:has(.fa-user) {
            color: #28a745 !important;
            font-weight: 500;
        }

        .navbar .nav-link[href="#"]:has(.fa-user):hover {
            color: #20c997 !important;
        }

        /* Login/Register Links */
        .navbar .nav-link[href*="login"] {
            color: #17a2b8 !important;
        }

        .navbar .nav-link[href*="register"] {
            color: #6f42c1 !important;
        }

        .navbar .nav-link[href*="login"]:hover,
        .navbar .nav-link[href*="register"]:hover {
            transform: translateY(-2px);
        }

        /* Responsive Admin Menu */
        @media (max-width: 768px) {
            .navbar .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <!-- เนื้อหา -->
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
