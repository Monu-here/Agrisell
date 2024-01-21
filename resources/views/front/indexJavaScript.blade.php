<script>
    const sliders = {!! json_encode($sliders, JSON_NUMERIC_CHECK) !!}
    const categories = {!! json_encode($categories, JSON_NUMERIC_CHECK) !!};
    const products = {!! json_encode($products, JSON_NUMERIC_CHECK) !!};
    const isMobile = window.innerWidth < 768;
    var current = 0;
    var currentCategory = categories[0];

    $(document).ready(function() {
        console.log(isMobile, 'ismobile');
        if (isMobile) {

            $('#mobilecategory-holder').html(categories.map((category, i) => {
                return rendermobilecategory(category, i)
            }));
            if (currentCategory) {
                $('#mobile-products').html(
                    products.filter(product => product.category_id == currentCategory.id)
                    .map((product, i) => renderMobileproduct(product, i)).join('')
                );
            }

            window.addEventListener('scroll', () => {
                console.log(window.scrollY);
                if (window.scrollY > 30) {
                    $('.scroll-more').addClass('hide');
                } else {
                    $('.scroll-more').removeClass('hide');
                }
            });
            if (window.scrollY > 30) {
                $('.scroll-more').addClass('hide');
            } else {
                $('.scroll-more').removeClass('hide');
            }
        } else {

            $('#desktop-categorys').html(categories.map((category, index) => {
                return renderDesktopCategory(category, index)
            }));


            if (currentCategory) {

                $('#desktop-products').html(products.filter(product => product.category_id == currentCategory
                    .id).map(product => renderDesktopProduct(product)));
            }
        }


    });
</script>
