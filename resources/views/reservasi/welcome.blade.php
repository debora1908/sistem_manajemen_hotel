<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirwana Hotel - Bali Theme</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f8f9fa; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px 8%; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .logo { font-size: 22px; font-weight: bold; color: #0e6f87; letter-spacing: 1px; text-decoration: none; }
        nav ul { display: flex; list-style: none; gap: 30px; }
        nav ul li a { text-decoration: none; color: #555; font-size: 15px; }
        .btn-book { background-color: #0e6f87; color: white; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 14px; }
        .hero { position: relative; height: calc(100vh - 80px); min-height: 500px; background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=1200&q=80') no-repeat center center/cover; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: white; padding: 20px; }
        .hero h3 { font-size: 14px; text-transform: uppercase; letter-spacing: 4px; margin-bottom: 15px; font-weight: 600; }
        .hero h1 { font-size: 56px; font-family: 'Georgia', serif; max-width: 800px; line-height: 1.2; margin-bottom: 30px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .btn-discover { background-color: white; color: #0e6f87; padding: 15px 35px; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo">≈ Nirwana Hotel</a>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Villas</a></li>
                <li><a href="#">Beach Club</a></li>
                <li><a href="#">Wellness</a></li>
            </ul>
        </nav>
        <a href="{{ route('reservasi.index') }}" class="btn-book">Book A Stay</a>
    </header>
    <section class="hero">
        <h3>5-Star Luxury Beachfront Sanctuary</h3>
        <h1>Experience Paradise In Tropical Bali</h1>
        <a href="{{ route('reservasi.index') }}" class="btn-discover">Discover Our Suites</a>
    </section>
</body>
</html>