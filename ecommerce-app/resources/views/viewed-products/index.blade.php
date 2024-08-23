<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navigation Bar -->
    @include('layouts.navigation')

    <-- product data -->
    <?php echo $viewedProducts ?>
</body>
</html>
