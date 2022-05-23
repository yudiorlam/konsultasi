<html>
    <head>
        <meta charset="utf-8">
        <title>OPPOSITE-SLIDER</title>
        <meta name="description" content=""/>

        <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/landing.css" />
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>

        <section class="intro">
        <div class="left">
            <div>
                <div class="ajg">
                    <img class="logo-lutim" src="{{ asset('/') }}media/lutim.png" />
                </div>
                <h1><img src="{{ asset('/') }}media/ds.png"  alt="" style="width: 110px;margin-top:20px " />PERIKSA KI'</h1>
                <p>
                    Merupakan akronim dari peningkatan peran Inspektorat daerah Kabupaten Luwu Timur Melalui Peningkatan Layanan Konsultasi, yaitu
                    sebuah inovasi yang dirancang untuk membangun sebuah systerm layanan konsultasi yang digunakan oleh APIP Inspektorat Kabupaten Luwu Timur 
                    <a href="{{ asset ('/login') }}" class="btn third" style="width: 150px">Login</a>
                </p>
                <a href="https://unsplash.com/" target="_blank"></a>
            </div>
        </div>

        <div class="slider">
            <ul>
            <li style="background-image:url({{asset('')}}img/luwutimur.jpg)">
                <div class="center-y">
                <h3>Slider Title #1</h3>
                <a href="#">View Project</a>	
                </div>
            </li>
            <li style="background-image:url(https://images.unsplash.com/photo-1451906278231-17b8ff0a8880?crop=entropy&fit=crop&fm=jpg&h=675&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1375)">
                <div class="center-y">
                <h3>Slider Title #2</h3>
                <a href="#">View Project</a>	
                </div>
            </li>
            <li style="background-image:url(https://images.unsplash.com/photo-1456428199391-a3b1cb5e93ab?crop=entropy&fit=crop&fm=jpg&h=675&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1375)">
                <div class="center-y">
                <h3>Slider Title #3</h3>
                <a href="#">View Project</a>	
                </div>
            </li>
            </ul>

            <ul>
            <nav>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </nav>
            </ul>
        </div>
	</section>

        <script type="text/javascript" src="{{ asset('') }}js/landing.js"></script>
    </body>
</html>