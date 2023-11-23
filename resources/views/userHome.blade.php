@extends('layouts.user')

<br>
<br>

@section('content')
    {{-- Welcome Start --}}


    <section class="welcome" id="welcome" style="display: flex">
        <div style="padding: 50px 8%; margin: auto;">
            <br>
            <br>
            <center>
            <H2><B>WELCOME TO SOFTWARE ENGINEERING</B></H2>
            <br>
            <br>
            <div class="container">
                @foreach ($posts as $post)
            
                    <b>
                        <h2>{{ $post->title }}</h2>
                    </b>
                    <p style="width: 65%; text-align: center">{!! $post->content !!}</p>
                @endforeach
            </center>
            </div>
        </div>
    </section>




    {{-- welcome end --}}



    {{-- Fasilitas Start --}}

    <section class="fasility" id="fasility">
        <div style="padding:  120px 8% ;">
            <center>
                <h2><b>FASILITAS</b></h2>
                <br>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit, similique. Deserunt animi
                    suscipit, quas praesentium facilis atque, quia nesciunt veritatis eum vitae pariatur. Quisquam atque
                    quidem illum asperiores, impedit perspiciatis.
                </p>
            </center>
            <div style="display: flex; justify-content: center; max-width: 900px; margin: 0 auto;">
                @foreach ($fasilitass as $fasilitas)
                    <div style="flex: 1; margin: 0 10px; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <h5 style="color: #333; margin-bottom: 10px;"><b>{{ $fasilitas->title }}</b></h5>
                        <p style="color: #666;">{!! $fasilitas->content !!}</p>
                    </div>
                @endforeach
            </div>
            
            
            
            

        </div>
    </section>

    {{-- fasilitas END --}}




    {{-- Teacher start --}}

    <section class="teachers" id="teachers">
        <div style="padding:  100  ;">
            <CEnter>
            <h4><b>DAFTAR GURU </b> </h4>
        </CEnter>
            <br>
            <div class="row">
                @foreach ($gurus as $index => $guru)
                    @if($index === 0)
                        <!-- Elemen pertama di atas -->
                        <div class="col-lg-12 mb-4">
                            <div class="text-center">
                                <img src="{{ asset('/storage/guru/' . $guru->image) }}" class="rounded-circle" alt="{{ $guru->title }}" style="width: 150px;">
                                <h5 class="mt-3">{{ $guru->title }}</h5>
                                <p>{!! $guru->content !!}</p>
                                <small class="text-muted">Terakhir diupdate: {{ $guru->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @else
                        <!-- Elemen-lemen berikutnya di bawahnya (3 per baris) -->
                        <div class="col-lg-4 mb-4">
                            <div class="text-center">
                                <img src="{{ asset('/storage/guru/' . $guru->image) }}" class="rounded-circle" alt="{{ $guru->title }}" style="width: 100px;">
                                <h5 class="mt-3">{{ $guru->title }}</h5>
                                <p>{!! $guru->content !!}</p>
                                <small class="text-muted">Terakhir diupdate: {{ $guru->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        
       
        
        
        
        
        
        
            {{-- @foreach ($gurus as $guru)
                <img src="{{ asset('/storage/guru/' . $guru->image) }}" class="rounded" style="width: 150px">
                <p><b> {{ $guru->title }} </b></p>
                <p>{!! $guru->content !!}</p>
            @endforeach --}}
        </div>
    </section>

    {{-- Teacher END  --}}



    {{-- Documentation start --}}

    <section class="documentation" id="documentation">
        <h2><b>DOKUMENTASI</b></h2>
        <br>
        @foreach ($postings as $index => $posting)
            <div id="carouselExampleRide{{ $index }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/posting/' . $posting->image) }}" class="d-block w-100" alt="...">
                    </div>
                    {{-- Add more carousel items if needed --}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide{{ $index }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide{{ $index }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endforeach
    </section>
    

    {{-- Documentation END --}}




    {{-- Project start --}}

    <section class="project" id="project">
        <div style="padding:  120px 8% ;">
            <h4><b>Project</b> </h4>
            <br>
            <div id="autoCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($postings as $index => $posting)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('/storage/posting/' . $posting->image) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const autoCarousel = new bootstrap.Carousel(document.getElementById('autoCarousel'), {
                interval: 3000 // Ganti 3000 dengan interval yang diinginkan dalam milidetik
            });
        });
    </script>
    

    {{-- Project END --}}




    {{-- Contact start --}}

    <section class="contact" id="contact">
        <div style="padding:  120px 8% ;">
            <h4><b>CONTACT</b> </h4>
            <br>
            <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                voluptatum provident odit praesentium.</p>
            <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                voluptatum provident odit praesentium.</p>
            <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                voluptatum provident odit praesentium.</p>
        </div>
    </section>

    <!-- Remove the container if you want to extend the Footer to full width. -->

    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #3e4551"
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->

            <!--Grid column-->
  
            <!--Grid column-->
            
            <!--Grid column-->
  
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
  
        <!-- Section: CTA -->
        <!-- Section: CTA -->
  
        <hr class="mb-4" />
  
        <!-- Section: Social media -->
        <section class="mb-4 text-center">
          <!-- Facebook -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-facebook-f"></i
            ></a>
  
          <!-- Twitter -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-twitter"></i
            ></a>
  
          <!-- Google -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-google"></i
            ></a>
  
          <!-- Instagram -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-instagram"></i
            ></a>
  
          <!-- Linkedin -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-linkedin-in"></i
            ></a>
  
          <!-- Github -->
          <a
             class="btn btn-outline-light btn-floating m-1"
             href="#!"
             role="button"
             ><i class="fab fa-github"></i
            ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        ©2023  SKY CODE
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  <!-- End of .container --><footer>



    {{-- Contact End --}}


    {{-- Footer Start --}}
    


     
    {{-- Contact End --}}

@endsection
