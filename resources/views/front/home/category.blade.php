<script>
    const renderDesktopCategory = (category, index) => {
        return `
            <div onclick="selectCaegory(${category.id})" class="category-single desktopcats category-${category.id} ${index == 0 ? 'active' : ''}">
                <div class="icon">
                    <img src="/${category.image}?v={{ config('share.version') }}" alt="">
                </div>
                <div class="text">${category.title}</div>
            </div>
        `;

    };

    const selectCaegory = (id) => {
        currentCategory = categories.find(o => o.id == id);
        $('.desktopcats').removeClass('active');
        $('.category-' + id).addClass('active');

        if (currentCategory) {

            $('#desktop-products').html(products.filter(product => product.category_id == currentCategory.id).map(
                product => renderDesktopProduct(product)));
        }
    }
    const rendermobilecategory = (category, i) => {
        return `
        <div onclick="selectCaegorys(${category.id})" class="mobileCategory-holder mobilecats category-${category.id} ${i == 0 ? 'active' : ''}">
        <img style="width:30px;height: 30px;" src="/${category.image}" alt="">
                    <div>
                        ${category.title}
                    </div>
        </div>
        `
    }
    const selectCaegorys = (id) => {
        currentCategory = categories.find(o => o.id == id);
        $('.mobilecats').removeClass('active');
        $('.category-' + id).addClass('active');
        if (currentCategory) {
            $("#mobile-products").html(products.filter(product => product.category_id == currentCategory.id).map(
                (product,i) => renderMobileproduct(product,i)));
        }
    }
</script>

{{-- {{here is filter code also }} --}}
