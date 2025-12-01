<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Galaxy</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a0933 0%, #2e1a47 50%, #3b1e66 100%);
            color: #fff;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 40px 20px;
            position: relative;
            z-index: 10;
        }

        .logo {
            max-width: 180px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 3em;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
        }

        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        .game-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .game-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('game-bg.jpg') center/cover no-repeat;
            opacity: 0.3;
            transition: opacity 0.3s ease;
        }

        .game-card:hover .game-overlay {
            opacity: 0.5;
        }

        .game-card h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2em;
            margin-bottom: 15px;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .game-card p {
            font-size: 1.1em;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }

        button {
            background: linear-gradient(45deg, #ff007a, #ff4d4d);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        /* Starfield Background */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 1;
            overflow: hidden;
        }

        .stars::before {
            content: '';
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            box-shadow:
                /* Add multiple star-like shadows */
                100px 200px #fff, 300px 400px #fff, 500px 100px #fff,
                700px 600px #fff, 900px 300px #fff, 200px 500px #fff,
                400px 700px #fff, 600px 200px #fff, 800px 400px #fff,
                1000px 600px #fff, 1200px 300px #fff;
            animation: twinkle 5s infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.2em;
            }

            .logo {
                max-width: 140px;
            }

            .game-grid {
                grid-template-columns: 1fr;
            }

            .game-card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8em;
            }

            .logo {
                max-width: 120px;
            }

            button {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <header>

        <img src="{{ asset('assets/images/resources/abclogo1.png') }}" alt="" class="logo">
        <h1>Explore Our Games</h1>
    </header>
    <main>
        <div class="game-grid">
            <div class="game-card" data-game="space-adventure">
                <div class="game-overlay"></div>
                <h2>Space Adventure</h2>
                <p>Soar through the stars in an epic interstellar journey!</p>
                <a href="{{ route('game1') }}">
                    <button>Launch Now</button></a>
            </div>
            <div class="game-card" data-game="puzzle-quest">
                <div class="game-overlay"></div>
                <h2>Puzzle Quest</h2>
                <p>Unravel mind-bending challenges in a mystical world!</p>
                <a href="{{ route('game2') }}">
                    <button>Play Now</button></a>
            </div>
        </div>
    </main>
    <div class="stars"></div>
    <script>
        function playGame(gameId) {
            // Placeholder for game navigation logic
            alert(`Launching ${gameId}! (Replace with actual game navigation logic)`);
            // Example: window.location.href = `/${gameId}/index.html`;
        }

        // Add subtle animation to cards on load
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.game-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>

</html>
