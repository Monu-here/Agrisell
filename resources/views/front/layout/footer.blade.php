@php
    $footer = getFooterSetting();
@endphp
<div class="{{Route::is('front.index')?'d-none d-md-block':''}}">
    @if ($footer != null)
        <footer class="text-center text-lg-start bg-light text-muted" id="footer">
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="me-5 d-none d-lg-block">
                    <span>Connect  Us Using</span>
                </div>

                <div>
                    <a href="{{ $footer->fblink }}" target="_blank" class="me-4 text-reset" style="text-decoration: none">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="{{ $footer->yotubelink }}" target="_blank" class="me-4 text-reset" style="text-decoration: none">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="{{ $footer->instalink }}" target="_blank" class="me-4 text-reset"
                        style="text-decoration: none">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>
            </section>

            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-6  mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{vasset($footer->image)}}" alt="" class="w-100">
                                </div>
                                <div class="col-md-9">
                                    {!! $footer->short_desc !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i>{!! $footer->address !!} </p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                <a href="mailto:{{ $footer->email }}" style="text-decoration: none;">
                                    {{ $footer->email }}
                                </a>
                            </p>
                            @php
                                $numbers=explode(",",$footer->number);
                            @endphp
                            <p><i class="fas fa-phone me-3"></i>
                                @foreach ($numbers as $number)
                                    <a href="tel:{{ $number }}" style="text-decoration: none;">
                                        {{ $number }}
                                    </a>
                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="text-center p-4 text-decoration-none" style="background-color: rgba(0, 0, 0, 0.05); text-decoration: none">
                {!! $footer->copyright !!}
            </div>
        </footer>
    @endif
</div>
