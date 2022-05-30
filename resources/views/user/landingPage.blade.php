<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>OPPOSITE-SLIDER</title>
        <meta name="description" content=""/>

        <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/landing.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">
           <div class="container">

               <div class="slideshow">

                    <div class="slideshow-left">

                        <div class="Lslide">
                            <div class="Lslide-content">
                                <img src="{{ asset('media/ds.png') }}" alt="#" height="120">
                                <br><br>
                                <h2>PERIKSA KI'</h2>
                                <p>
                                    Merupakan akronim dari peningkatan peran Inspektorat daerah Kabupaten Luwu Timur Melalui Peningkatan Layanan Konsultasi, yaitu
                                    sebuah inovasi yang dirancang untuk membangun sebuah systerm layanan konsultasi yang digunakan oleh APIP Inspektorat Kabupaten Luwu Timur 
                                </p>

                                <div class="button">
                                    <a href="{{ url('/login') }}">
                                        <p>Login</p>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Lslide">
                            <div class="Lslide-content">
                                <h2>PERIKSA KI'</h2>
                                <p>
                                    Merupakan akronim dari peningkatan peran Inspektorat daerah Kabupaten Luwu Timur Melalui Peningkatan Layanan Konsultasi, yaitu
                                    sebuah inovasi yang dirancang untuk membangun sebuah systerm layanan konsultasi yang digunakan oleh APIP Inspektorat Kabupaten Luwu Timur 
                                </p>

                                <div class="button">
                                    <a href="{{ url('/login') }}">
                                        <p>Login</p>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="Lslide">
                            <div class="Lslide-content">
                                <h2>Probably not</h2>
                                <p>Be a part of our creation</p>

                                <div class="button">
                                    <a href="#">
                                        <p>More</p>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>     --}}

                    </div>

                    <div class="slideshow-right">

                        {{-- <div class="Rslide">
                            <img src="https://mariongrandvincent.github.io/HTML-Personal-website/img-codePen/flower-3.jpg" alt="">
                        </div> --}}

                        <div class="Rslide">
                            <img src="https://mariongrandvincent.github.io/HTML-Personal-website/img-codePen/flower-5.jpg" alt="">
                        </div>     
                        <div class="Rslide">
                            <img src="https://mariongrandvincent.github.io/HTML-Personal-website/img-codePen/flower-1.jpg" alt="">
                        </div>                                              
                    </div>    

                    
                    {{-- <div class="control">
                        <div class="oncontrol control-top">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                        </div>
                        <div class="oncontrol control-bottom">
                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                        </div>                          
                    </div> --}}

               </div>

           </div>
       </div>

        <script type="text/javascript" src="{{ asset('') }}js/landing.js"></script>
    </body>
</html>