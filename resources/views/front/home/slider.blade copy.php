

        <div class="slide {{ $key == 0 ? 'active' : '' }}">
                        <picture>
                            <!-- Mobile image -->
                            <source media="(max-width: 767px)" srcset="{{ vasset($slider->mobile_image) }}">

                            <!-- Desktop image -->
                            <source media="(min-width: 768px)" srcset="{{ vasset($slider->image) }}">

                            <!-- Fallback image for browsers that don't support the <picture> element -->
                            <img src="{{ vasset($slider->image) }}" alt="Alternate Text">
                        </picture>
                    </div>
