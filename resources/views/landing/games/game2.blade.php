<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memory Matching Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a0933 0%, #2e1a47 50%, #3b1e66 100%);
            color: #fff;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }

        .stars {
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
            box-shadow: 100px 200px #fff, 300px 400px #fff, 500px 100px #fff,
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

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5em;
            text-align: center;
            padding: 0.6em;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        .tool-tip {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }

        .tool-tip button {
            background: linear-gradient(45deg, #ff007a, #ff4d4d);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.7);
            transition: transform 0.2s ease;
        }

        .tool-tip button:hover {
            transform: scale(1.1);
        }

        .tool-tip .tool-tip-text {
            visibility: hidden;
            width: 6em;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: #fff;
            text-align: center;
            padding: 5px 0;
            position: absolute;
            top: 50px;
            right: 0;
            z-index: 1;
            border-radius: 0.3em;
            font-family: 'Poppins', sans-serif;
        }

        .tool-tip:hover .tool-tip-text {
            visibility: visible;
        }

        .game-status-details {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.3s;
        }

        .rating,
        .move-counter,
        .timer,
        .restart-btn {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3em;
            margin: 10px 0;
        }

        .rating .star {
            color: #ffd700;
        }

        .restart-btn {
            background: linear-gradient(45deg, #ff007a, #ff4d4d);
            border: none;
            padding: 8px 16px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .restart-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        .game-board {
            max-width: 600px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            padding: 10px;
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.5s;
        }

        .game-grid-row {
            display: flex;
            justify-content: center;
        }

        .game-card {
            width: 80px;
            height: 80px;
            background: url('assets/images/resources/abclogo1.png') center center / cover no-repeat;
            border-radius: 10px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            position: relative;
            touch-action: none;
        }

        .game-card-img {
            visibility: hidden;
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .game-card-img.show-img {
            visibility: visible;
            animation: animateShowImage 0.4s linear alternate;
        }

        .restart-button-div {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.7s;
        }

        .restart-button {
            background: linear-gradient(45deg, #ff007a, #ff4d4d);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .restart-button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            width: 80%;
            max-width: 500px;
            margin: 5% auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            animation: fadeIn 1s ease forwards;
        }

        .modal-header {
            padding: 15px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5em;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .modal-body {
            padding: 20px;
            text-align: center;
        }

        .modal-body .message p {
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .modal-footer {
            padding: 0 20px 20px;
            text-align: center;
        }

        .modal-footer button {
            background: linear-gradient(45deg, #ff007a, #ff4d4d);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .modal-footer button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.7);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5em;
            color: #fff;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .close:hover {
            color: #ff4d4d;
        }

        .page-footer {
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.9s;
        }

        .page-footer-link {
            color: #ff4d4d;
            text-decoration: none;
        }

        .page-footer-link:hover {
            color: #ffd700;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes animateShowImage {
            0% {
                transform: rotateY(90deg);
                opacity: 0;
            }

            100% {
                transform: rotateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .game-board {
                max-width: 400px;
            }

            .game-card {
                width: 60px;
                height: 60px;
            }

            .game-status-details {
                max-width: 400px;
            }

            .modal-content {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .game-board {
                max-width: 300px;
            }

            .game-card {
                width: 50px;
                height: 50px;
            }

            .game-status-details {
                max-width: 300px;
            }

            h1 {
                font-size: 1.8em;
            }

            .modal-header {
                font-size: 1.2em;
            }

            .modal-footer button {
                padding: 8px 16px;
                font-size: 1em;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div id="timer"
        style="font-size: 30px; color: #f30f0f; margin: 10px; position: inherit; z-index: 99; text-align: center">
    </div>

    <div id="gameOverlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
       background-color: rgba(0, 0, 0, 0.7); z-index: 9999; text-align: center; padding-top: 100px;">
        <div id="message" style="font-size: 32px; color: #fff; margin-bottom: 20px;">
            ⏰ Time’s up!<br>💔 You lost the game.<br>🧩 Try again!
        </div>
        <a href="{{ route('visitors') }}" id="reloadBtn"
            style="display: inline-block; padding: 12px 24px; background: #ff4c4c; color: white;
         text-decoration: none; font-size: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            🔁 Back To Menu
        </a>
    </div>
    <div id="winOverlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
    background-color: rgba(0, 0, 0, 0.8); z-index: 9999; text-align: center; padding-top: 100px;">
        <div id="winMessage" style="font-size: 32px; color: #00ff99; margin-bottom: 20px;">
            🎉 Congratulations!<br>🎯 You solved the puzzle!<br>🚀 Redirecting...
        </div>
        <a href="{{ route('visitors') }}" id="manualRedirect"
            style="display: inline-block; padding: 12px 24px; background: #28a745; color: white;
        text-decoration: none; font-size: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            🏠 Go to Home
        </a>
    </div>

    <main>
        <section>
            
            <table class="game-board">
                <tbody class="game-grid">
                    <tr class="game-grid-row">
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/1.jpg') }}" alt="cake1">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/2.jpg') }}" alt="cake2">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/3.jpg') }}" alt="cake3">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/4.jpg') }}" alt="cake4">
                        </td>
                    </tr>
                    <tr class="game-grid-row">
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/5.jpg') }}" alt="cake5">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/6.jpg') }}" alt="cake6">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/7.jpg') }}" alt="cake7">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/8.jpg') }}" alt="cake8">
                        </td>
                    </tr>
                    <tr class="game-grid-row">
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/5.jpg') }}" alt="cake5">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/3.jpg') }}" alt="cake3">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/4.jpg') }}" alt="cake4">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/6.jpg') }}" alt="cake6">
                        </td>
                    </tr>
                    <tr class="game-grid-row">
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/1.jpg') }}" alt="cake1">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/2.jpg') }}" alt="cake2">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/7.jpg') }}" alt="cake7">
                        </td>
                        <td class="game-card">
                            <img class="game-card-img" src="{{ asset('img/8.jpg') }}" alt="cake8">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="restart-button-div">
                <button class="restart-button" id="restartButton" onclick="startGame()">Restart ↻</button>
                <a href="{{ route('games_list') }}">
                    <button class="restart-button" id="backToList">Back to Menu</button></a>
                <a href="{{ route('visitors') }}">
                    <button class="restart-button" id="backToWebsite">Back to Website</button>
                </a>


            </div>
        </section>

        <!-- Modal on game over -->
        <div class="modal" id="gameOverModal">
            <div class="modal-content">
                <span aria-label="close" role="button" class="close" id="closeModal">×</span>
                <div class="modal-header">
                    <h2>Game Over</h2>
                </div>
                <div class="modal-body">
                    <div class="message">
                        <p>Congratulations! You completed the game!</p>
                        <p>Moves: <span id="totalGameMoves"></span></p>
                        <p>Time: <span id="totalGameTime"></span></p>
                        <p>Rating: <span id="finalStarRating"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="playAgain()">Play Again 😊</button>
                    <a href="{{ route('games_list') }}">
                        <button class="restart-button" id="backToList">Back to Menu</button></a>
                </div>
            </div>
        </div>


    </main>
    <footer>
        <div class="page-footer">
            <p>Made with <span aria-label="love" style="color:#ff4d4d;">❤</span> by
                <a href="https://adamichelle.github.io" class="page-footer-link">ABC Logistic Team</a>
                <span aria-label="copyright">©</span> 2025.
            </p>
        </div>
    </footer>
    <script>
        let seconds = 90;
        let countdown;
        const timerElement = document.getElementById('timer');
        const overlay = document.getElementById('gameOverlay');

        function winGame() {
            // Stop the countdown
            clearInterval(countdown);

            // Show success overlay
            document.getElementById('winOverlay').style.display = 'block';

            // Disable interaction


            // Redirect after 5 seconds
            setTimeout(() => {
                window.location.href = "{{ route('visitors') }}";
            }, 5000);
        }
        startGamess()

        function startGamess() {
            timerElement.textContent = `Time left: ${seconds} seconds`;

            countdown = setInterval(() => {
                seconds--;
                timerElement.textContent = `Time left: ${seconds} seconds`;

                if (seconds <= 0) {
                    clearInterval(countdown);
                    timerElement.textContent = '';

                    // Show overlay
                    overlay.style.display = 'block';

                    // Disable interaction with game
                    document.getElementById('forPuzzle').style.pointerEvents = 'none';
                    document.getElementById('menu').style.pointerEvents = 'none';

                    // Refresh link
                }
            }, 1000);
        }
        const helpModal = document.getElementById('helpModal');

        function openHelpModal() {
            helpModal.classList.add('show-modal');
        }

        function closeHelpModal() {
            helpModal.classList.remove('show-modal');
        }

        let cardElements = document.getElementsByClassName('game-card');
        let cardElementsArray = [...cardElements];
        let imgElements = document.getElementsByClassName('game-card-img');
        let imgElementsArray = [...imgElements];
        let starElements = document.getElementsByClassName('star');
        let starElementsArray = [...starElements];
        //let counter = document.getElementById('moveCounter');
        // let timer = document.getElementById('timer');
        let modalElement = document.getElementById('gameOverModal');
        let totalGameMovesElement = document.getElementById('totalGameMoves');
        let totalGameTimeElement = document.getElementById('totalGameTime');
        let finalStarRatingElement = document.getElementById('finalStarRating');
        let closeModalIcon = document.getElementById('closeModal');
        let openedCards = [];
        let matchedCards = [];
        let moves = 0;
        let second = 0,
            minute = 0,
            hour = 0;
        let interval, totalGameTime, starRating;

        function shuffle(array) {
            let currentIndex = array.length,
                temporaryValue, randomIndex;
            while (currentIndex !== 0) {
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }
            return array;
        }

        function startGame() {
            let shuffledImages = shuffle(imgElementsArray);
            for (let i = 0; i < shuffledImages.length; i++) {
                cardElements[i].innerHTML = "";
                cardElements[i].appendChild(shuffledImages[i]);
                cardElements[i].type = `${shuffledImages[i].alt}`;
                cardElements[i].classList.remove("show", "open", "match", "disabled");
                cardElements[i].children[0].classList.remove("show-img");
            }

            for (let i = 0; i < cardElementsArray.length; i++) {
                cardElementsArray[i].removeEventListener("click", displayCard);
                cardElementsArray[i].addEventListener("click", displayCard);
            }

            flashCards();
            moves = 0;
            // counter.innerText = `${moves} move(s)`;
            for (let i = 0; i < starElementsArray.length; i++) {
                starElementsArray[i].style.opacity = 1;
            }
            //timer.innerHTML = '0 mins 0 secs';
            //clearInterval(interval);
            matchedCards = [];
            openedCards = [];
        }

        function flashCards() {
            for (let i = 0; i < cardElements.length; i++) {
                cardElements[i].children[0].classList.add("show-img");
            }
            setTimeout(() => {
                for (let i = 0; i < cardElements.length; i++) {
                    cardElements[i].children[0].classList.remove("show-img");
                }
            }, 1000);
        }

        function displayCard() {
            if (this.classList.contains("disabled")) return;
            this.children[0].classList.toggle('show-img');
            this.classList.toggle("open");
            this.classList.toggle("show");
            this.classList.toggle("disabled");
            cardOpen(this);
        }

        function cardOpen(card) {
            openedCards.push(card);
            if (openedCards.length === 2) {
                //moveCounter();
                if (openedCards[0].type === openedCards[1].type) {
                    matched();
                } else {
                    unmatched();
                }
            }
        }

        function matched() {
            openedCards[0].classList.add("match");
            openedCards[1].classList.add("match");
            openedCards[0].classList.remove("show", "open");
            openedCards[1].classList.remove("show", "open");
            matchedCards.push(openedCards[0], openedCards[1]);
            openedCards = [];
            if (matchedCards.length === 16) {
                endGame();
            }
        }

        function unmatched() {
            openedCards[0].classList.add("unmatched");
            openedCards[1].classList.add("unmatched");
            disable();
            setTimeout(() => {
                openedCards[0].classList.remove("show", "open", "unmatched");
                openedCards[1].classList.remove("show", "open", "unmatched");
                openedCards[0].children[0].classList.remove('show-img');
                openedCards[1].children[0].classList.remove('show-img');
                enable();
                openedCards = [];
            }, 1100);
        }

        function disable() {
            cardElementsArray.forEach(card => card.classList.add('disabled'));
        }

        function enable() {
            cardElementsArray.forEach(card => {
                card.classList.remove('disabled');
                if (matchedCards.includes(card)) {
                    card.classList.add('disabled');
                }
            });
        }

        function moveCounter() {
            moves++;
            counter.innerHTML = `${moves} move(s)`;
            if (moves === 1) {
                second = 0;
                minute = 0;
                hour = 0;
                // startTimer();
            }
            if (moves > 8 && moves <= 12) {
                starElementsArray[4].style.opacity = 0.1;
            } else if (moves > 12 && moves <= 16) {
                starElementsArray[3].style.opacity = 0.1;
            } else if (moves > 16 && moves <= 20) {
                starElementsArray[2].style.opacity = 0.1;
            } else if (moves > 20 && moves <= 24) {
                starElementsArray[1].style.opacity = 0.1;
            } else if (moves > 24) {
                starElementsArray[0].style.opacity = 0.1;
            }
        }

        function startTimer() {
            interval = setInterval(() => {
                timer.innerHTML = `${minute} mins ${second} secs`;
                second++;
                if (second === 60) {
                    minute++;
                    second = 0;
                }
                if (minute === 60) {
                    hour++;
                    minute = 0;
                }
            }, 1000);
        }

        function endGame() {
            winGame()
        }

        function closeModal() {
            closeModalIcon.addEventListener("click", () => {
                modalElement.classList.remove("show-modal");
                startGame();
            }, {
                once: true
            });
        }

        function playAgain() {
            modalElement.classList.remove("show-modal");
            startGame();
        }

        window.onload = () => {
            setTimeout(startGame, 1200);
        };
    </script>
</body>

</html>
