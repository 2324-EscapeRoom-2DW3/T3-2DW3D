@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>
        <div class="min-h-screen min-w-screen bg-cover bg-no-repeat bg-center"
            style="background-image: url('../../storage/images/juego1.png');">
            <div class="fade"></div>

            <section class="star-wars">
                <div class="crawl">
                    <div class="title">
                        <span class="ml-3 text-8xl font-figtree font-bold z-50 text-white   ">
                            QUIMM<span class="text-lime-400  text-8xl font-figtree">ICA</span>
                        </span>
                    </div>

                    <p class="text-white">IA maltzurra itzali zuten azkenean, irabazi zuten."</p>
                    <br>

                    <p class="text-white">Lau lagunak beldur eta harrituta geratu ziren. Zer egin behar zuten? Nola lortu
                        zuten hau guztia laguntzarik gabe? Zer gertatuko zen orain eskolarekin?</p>
                    <br>

                    <p class="text-white">Baina azkenean, Jon-ek, Ane-k, Iker-ek, eta Nora-k lortu zuten kodea, eta ateak ireki
                        zituzten. Euren ustetan, horrek ez zuen izan behar zuen efekturik. Laborategia itzuli eta elkarri
                        begira geratu ziren, barre eginez. Ikasle guztiak elkarri besarkatu zuten, eta esan zuten: "Bai,
                        gure lana lortu genuen! Eta gauza onena da, elkarrekin ari ginen, zuekin batera."</p>
                    <br>

                    <p class="text-white">Eta honekin lagunak eskola salbatu zuten.</p>


                    <p class="text-white">Eskerrik asko jolasteagatik!
                        </b></p>
                    <p class="text-white">...
                        </b></p>
                </div>
            </section>

        </div>

    </body>

    <script>
        window.onload = function() {
            var headers = document.getElementsByTagName('header');
            for (var i = 0; i < headers.length; i++) {
                headers[i].style.display = 'none';
            }

            var footers = document.getElementsByTagName('footer');
            for (var i = 0; i < footers.length; i++) {
                footers[i].style.display = 'none';
            }

            setTimeout(function() {
                window.location.href = "{{ route('creditos.update', ['id' => $id]) }}";
            }, 20000); // 10000 milliseconds = 10 seconds
        };
        window.userId = <?php echo Auth::user()->id; ?>;
    </script>

@endsection
