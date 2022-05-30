<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        @import url('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .slider-container {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            height: 100vh;
            width: 100vw;
        }

        .slider-container h1 {
            color: #fff;
            font-size: 100px;
            letter-spacing: 5px;
            position: relative;
            z-index: 100;
            text-align: center;
        }

        .slider-container::after {
            background-color: #000;
            content: '';
            position: absolute;
            opacity: 0.3;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
        }

        .slide {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            height: 100%;
            width: 100%;
            transform: scale(1.15);
            transition: opacity .6s ease;
        }

        .slide.active {
            animation: grow 4s linear forwards;
            opacity: 1;
        }

        @keyframes grow {
            0%, 20% {
                transform: scale(1);
            }
            
            75%, 100% {
                transform: scale(1.15);
            }
        }

        .controls-container {
            position: absolute;
            top: 50%;
            right: 10px;
            display: flex;
            flex-direction: column;
            transform: translateY(-50%);
            z-index: 2;
        }

        .control {
            background-color: #fff;
            cursor: pointer;
            opacity: 0.5;
            margin: 6px;
            height: 40px;
            width: 5px;
            transition: opacity 0.3s, background-color 0.3s, transform 0.3s;
        }

        .control.active, .control:hover {
            background-color: #fff;
            opacity: 1;
            transform: scale(1.2);
        }

        .logo-lutim {
            -webkit-filter: drop-shadow(5px 5px 5px #222 );
            filter: drop-shadow(5px 5px 5px #222);
        }
    </style>

</head>
<body>
    <div class="row m-0 p-0" style="height: 100vh;width: 100vw;">

        <div class="col-lg-4 m-0 p-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="0.2" d="M0,288L24,256C48,224,96,160,144,117.3C192,75,240,53,288,53.3C336,53,384,75,432,96C480,117,528,139,576,133.3C624,128,672,96,720,74.7C768,53,816,43,864,42.7C912,43,960,53,1008,58.7C1056,64,1104,64,1152,74.7C1200,85,1248,107,1296,112C1344,117,1392,107,1416,101.3L1440,96L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>

            <div class="row p-5 justify-content-center">

                <div class="col-sm-12 text-center">
                    <img src="{{ asset('media/ds.png') }}" alt="#" height="130px">

                    <h2 class="mt-5 fw-bold">PERIKSA KI'</h2>

                    <span>
                        Merupakan akronim dari peningkatan peran Inspektorat daerah Kabupaten Luwu Timur Melalui Peningkatan Layanan Konsultasi, yaitu sebuah inovasi yang dirancang untuk membangun sebuah systerm layanan konsultasi yang digunakan oleh APIP Inspektorat Kabupaten Luwu Timur.
                    </span>
                </div>

                <div class="col-sm-4">
                     <a href="{{ url('/login') }}" class="btn btn-primary d-block mt-5">LOGIN</a>
                </div>

            </div>
        </div>

        <div class="col-lg-8 m-0 p-0">
            <!-- Images from Unsplash -->
            <div class="slider-container" style="width: 100%">
                <h1>
                    <img class="logo-lutim" src="{{ asset('media/lutim.png') }}" alt="#" width="250px">
                </h1>
                <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80')"></div>
                
                <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1453928582365-b6ad33cbcf64?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80')"></div>
                
                <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1504707748692-419802cf939d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1330&q=80')"></div>
                
                <div class="controls-container">
                    <div class="control"></div>
                    <div class="control"></div>
                    <div class="control"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script>
        const slides = document.querySelectorAll('.slide');
        const controls = document.querySelectorAll('.control');
        let activeSlide = 0;
        let prevActive = 0;

        changeSlides();
        let int = setInterval(changeSlides, 4000);

        function changeSlides() {
            slides[prevActive].classList.remove('active');
            controls[prevActive].classList.remove('active');

            slides[activeSlide].classList.add('active');
            controls[activeSlide].classList.add('active');
            
            prevActive = activeSlide++;
            
            if(activeSlide >= slides.length) {
                activeSlide = 0;
            }
            
            console.log(prevActive, activeSlide);
        }

        controls.forEach(control => {
            control.addEventListener('click', () => {
                let idx = [...controls].findIndex(c => c === control);
                activeSlide = idx;

                changeSlides();

                clearInterval(int);
                int = setInterval(changeSlides, 4000);
            });
        });
    </script>
</body>


</html>